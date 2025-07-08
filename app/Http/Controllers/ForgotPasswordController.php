<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
use App\Models\User;
use App\Models\PasswordReset;
use Carbon\Carbon;

class ForgotPasswordController extends Controller
{
    // Show Forgot Password Form
    public function showForgotPasswordForm()
    {
        return view('auth.forgot-password');
    }

    // Send Reset Link
  
    public function sendResetLink(Request $request)
    {
        $request->validate([
            'email' => 'required|email|exists:users,email',
        ]);

        $user = User::where('email', $request->email)->first();

        // Generate a secure token
        $token = Str::random(60);
        $hashedToken = Hash::make($token); 

        // Set token expiration (1 minute)
        $expiresAt = Carbon::now()->addMinute();

        // Store token securely in the database
        PasswordReset::updateOrCreate(
            ['email' => $user->email],
            [
                'token' => $hashedToken,
                'created_at' => Carbon::now(),
                'expires_at' => $expiresAt,
            ]
        );

        // Generate password reset link with token and expiry timestamp
        $resetLink = url("/reset-password/{$token}?expires=" . urlencode($expiresAt->timestamp));

        // Send password reset email
        Mail::to($user->email)->send(new \App\Mail\PasswordReset($resetLink));

        return back()->with('success', 'Password reset link has been sent to your email.');
    }

    /**
     * Show Reset Password Form
     */
    public function showResetPasswordForm($token, Request $request)
    {
        // Validate expiration time from the query string
        if (!$request->has('expires') || Carbon::now()->timestamp > $request->expires) {
            return redirect('/forgot-password')->withErrors(['error' => 'Password reset link has expired.']);
        }

        return view('auth.reset-password', ['token' => $token]);
    }

    /**
     * Handle Password Reset Request
     */
    public function resetPassword(Request $request)
    {
        $request->validate([
            'email' => 'required|email|exists:users,email',
            'password' => 'required|min:8|confirmed',
        ]);

        $passwordReset = PasswordReset::where('email', $request->email)->first();

        // Check if token is valid and not expired
        if (!$passwordReset || !Hash::check($request->token, $passwordReset->token) || Carbon::now()->greaterThan($passwordReset->expires_at)) {
            return back()->withErrors(['email' => 'Invalid or expired token.']);
        }

        // Reset the user's password
        $user = User::where('email', $request->email)->first();
        $user->password = Hash::make($request->password);
        $user->save();

        // Delete the token after successful password reset
        $passwordReset->delete();

        return redirect()->route('login')->with('success', 'Your password has been reset successfully.');
    }}

