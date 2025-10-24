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
    public function showForgotPasswordForm()
    {
        return view('auth.forgot-password');
    }
  
    public function sendResetLink(Request $request)
    {
        $request->validate([
            'email' => 'required|email|exists:users,email',
        ]);

        $user = User::where('email', $request->email)->first();
        $token = Str::random(60);
        $hashedToken = Hash::make($token); 
        $expiresAt = Carbon::now()->addMinute();
        PasswordReset::updateOrCreate(
            ['email' => $user->email],
            [
                'token' => $hashedToken,
                'created_at' => Carbon::now(),
                'expires_at' => $expiresAt,
            ]
        );

        $resetLink = url("/reset-password/{$token}?expires=" . urlencode($expiresAt->timestamp));
        Mail::to($user->email)->send(new \App\Mail\PasswordReset($resetLink));
        return back()->with('success', 'Password reset link has been sent to your email.');
    }

    public function showResetPasswordForm($token, Request $request)
    {
        if (!$request->has('expires') || Carbon::now()->timestamp > $request->expires) {
            return redirect('/forgot-password')->withErrors(['error' => 'Password reset link has expired.']);
        }

        return view('auth.reset-password', ['token' => $token]);
    }

    public function resetPassword(Request $request)
    {
        $request->validate([
            'email' => 'required|email|exists:users,email',
            'password' => 'required|min:8|confirmed',
        ]);

        $passwordReset = PasswordReset::where('email', $request->email)->first();

        if (!$passwordReset || !Hash::check($request->token, $passwordReset->token) || Carbon::now()->greaterThan($passwordReset->expires_at)) {
            return back()->withErrors(['email' => 'Invalid or expired token.']);
        }

        $user = User::where('email', $request->email)->first();
        $user->password = Hash::make($request->password);
        $user->save();
        $passwordReset->delete();

        return redirect()->route('login')->with('success', 'Your password has been reset successfully.');
    }}

