<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class AuthMiddleware
{
    /**
     * Handle an incoming request.
     */
    public function handle(Request $request, Closure $next)
    {
        // Check if the user is not authenticated
        if (!Session::has('id')) {
            // Redirect to the Sign In page if not authenticated
            return redirect()->route('login')->with('error', 'Please sign in first.');
        }

        return $next($request);
    }
}