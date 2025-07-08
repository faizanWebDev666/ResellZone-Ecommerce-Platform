<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Auth;
use App\Models\User;

class EmailVerificationController extends Controller
{
    public function verifyEmail($token)
{
    $user = User::where('verification_token', $token)->first();

    if (!$user) {
        return redirect()->route('login')->with('error', 'Invalid or expired verification link.');
    }

    if (!is_null($user->email_verified_at)) {
        return redirect()->route('login')->with('info', 'Your email is already verified. You can log in.');
    }
    $user->email_verified_at = now(); 
    $user->verification_token = null; 
    $user->save();
    Auth::login($user);
    session()->put('id', $user->id);
    session()->put('type', $user->type);
    session()->put('profile_picture', $user->profile_picture);
    session()->put('name', $user->name);
    session()->flash('success', 'Your email has been verified and you are now logged in!');
    return match ($user->type) {
        'seller' => redirect('/sellerRegistrations'),
        'admin' => redirect('/admin'),
        default => redirect('/'), 
    };
}

}
