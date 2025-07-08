<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Laravel\Socialite\Facades\Socialite;
use App\Models\User;
use Illuminate\Support\Str;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;
use Exception;
use Illuminate\Support\Facades\Log;


class 
SocialiteController extends Controller
{

    public function facebookRedirect()
    {
        // Redirect to Facebook for authentication
        return Socialite::driver('facebook')->redirect();
    }

    
    
    public function loginWithFacebook()
    {
        try {
            // Retrieve user from Facebook
            $facebookUser = Socialite::driver('facebook')->stateless()->user();
            
            // Attempt to find an existing user by Facebook ID or email
            $existingUser = User::where('facebook_id', $facebookUser->id)
                ->orWhere('email', $facebookUser->email)
                ->first();
    
            if ($existingUser) {
                // Update Facebook ID if the user was found by email
                if ($existingUser->facebook_id !== $facebookUser->id) {
                    $existingUser->facebook_id = $facebookUser->id;
                    $existingUser->save();
                }
            } else {
                // Create a new user
                $existingUser = User::create([
                    'name' => $facebookUser->name,
                    'email' => $facebookUser->email,
                    'facebook_id' => $facebookUser->id,
                    'facebook_token' => $facebookUser->token,
                    'facebook_refresh_token' => $facebookUser->refreshToken ?? null,
                    'password' => Hash::make(uniqid()), // Generate a random password
                    'type' => 'customer', // Set the user type
                ]);
            }
    
            // Store user details in session
            session()->put('id', $existingUser->id);
            session()->put('type', $existingUser->type);
            
            // Redirect based on user type
            return ($existingUser->type == 'customer') ? redirect('/') : redirect('/admin');
    
        } catch (\Throwable $th) {
           return redirect()->route('login')->with('error', 'Something went wrong. Please try again.');
        }
    }
    







    public function googleLogin()
{
    return Socialite::driver('google')->redirect();
}

// Handle Google callback

// public function handleGoogle()
// {
//     try {
//         $googleUser = Socialite::driver('google')->stateless()->user(); 

//         // Log Google API response
//         Log::info('Google User Retrieved:', [
//             'id' => $googleUser->id ?? 'null',
//             'email' => $googleUser->email ?? 'null',
//             'name' => $googleUser->name ?? 'null',
//         ]);

//         if (!$googleUser->id || !$googleUser->email) {
//            return redirect()->route('login')->with('error', 'Google did not return user details. Please try again.');
//         }

//         $user = User::where('email', $googleUser->email)->first();

//         if (!$user) {
//             $user = User::create([
//                 'name' => $googleUser->name,
//                 'email' => $googleUser->email,
//                 'google_id' => $googleUser->id,
//                 'password' => Hash::make(Str::random(32)), 
//                 'type' => 'customer'
//             ]);

//             session()->flash('success', 'Registration successful! You are now logged in.');
//         } else {
//             if (!$user->google_id) {
//                 $user->update(['google_id' => $googleUser->id]);
//             }

//             session()->flash('success', 'Login successful!');
//         }

//         Session::put('id', $user->id);
//         Session::put('type', $user->type);
//         Session::save();

//         return ($user->type === 'customer') ? redirect('/') : redirect('/admin');

//     } catch (\Exception $e) {
//         Log::error('Google Login Error:', ['message' => $e->getMessage()]);

//        return redirect()->route('login')->with('error', 'Authentication failed. Please try again.');
//     }
// }


public function handleGoogle()
{
    try {
        $googleUser = Socialite::driver('google')->stateless()->user();

        // Log the retrieved Google user details
        Log::info('Google User Retrieved:', [
            'id' => $googleUser->id ?? 'null',
            'email' => $googleUser->email ?? 'null',
            'name' => $googleUser->name ?? 'null',
            'avatar' => $googleUser->avatar ?? 'null',
        ]);

        if (!$googleUser->id || !$googleUser->email) {
           return redirect()->route('login')->with('error', 'Google did not return user details. Please try again.');
        }

        $user = User::where('email', $googleUser->email)->first();

        if (!$user) {
            // Store Google user details in session for role selection
            Session::put('google_user', [
                'name' => $googleUser->name,
                'email' => $googleUser->email,
                'google_id' => $googleUser->id,
                'profile_picture' => $googleUser->avatar
            ]);

            return redirect('/select-role'); // Redirect to role selection page
            
        }

        // If user exists, log them in based on their role (type)
        Session::put('id', $user->id);
        Session::put('type', $user->type);
        Session::save();

        return $this->redirectBasedOnRole($user->type);

    } catch (\Exception $e) {
        Log::error('Google Login Error:', ['message' => $e->getMessage()]);

       return redirect()->route('login')->with('error', 'Authentication failed. Please try again.');
    }
}

public function saveRole(Request $request)
{
    $request->validate([
        'role' => 'required|in:customer,seller,admin',
    ]);

    $googleUser = Session::get('google_user');

    if (!$googleUser) {
       return redirect()->route('login')->with('error', 'Session expired. Please try again.');
    }

    // Log the role selection to debug
    Log::info('Selected Role:', ['role' => $request->role]);

    // Create user with selected role in `type` column
    $user = User::create([
        'name' => $googleUser['name'],
        'email' => $googleUser['email'],
        'google_id' => $googleUser['google_id'],
        'profile_picture' => $googleUser['profile_picture'],
        'password' => Hash::make(Str::random(32)), 
        'type' => $request->role // ✅ Ensure this is set correctly
    ]);

    // Save session data
    Session::put('id', $user->id);
    Session::put('type', $user->type);
    Session::forget('google_user'); // Remove temporary session data
    Session::save();

    return $this->redirectBasedOnRole($user->type);
}

private function redirectBasedOnRole($role)
{
    return match ($role) {
        'admin' => redirect('/admin'),
         'seller' => redirect()->route('dashboard'),
        default => redirect('/')
    };
}





}
