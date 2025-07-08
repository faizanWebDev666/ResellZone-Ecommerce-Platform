<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;

class ChatifyAuthMiddleware
{
    public function handle(Request $request, Closure $next)
    {
        if (!Auth::check() && session()->has('id')) {
            $user = User::find(session('id'));

            if ($user) {
                Auth::login($user); // Manually authenticate for Chatify
            }
        }

        if (!Auth::check()) {
            return redirect('/login')->with('error', 'Please log in first.');
        }

        return $next($request);
    }
}
