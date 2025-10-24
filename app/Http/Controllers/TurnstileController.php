<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class TurnstileController extends Controller
{
    public function showForm()
    {
        return view('verify-turnstile');
    }

    public function verify(Request $request)
    {
        // 🔥 This logic moved here — the middleware won’t run on /verify-turnstile
        $response = Http::asForm()->post('https://challenges.cloudflare.com/turnstile/v0/siteverify', [
            'secret' => env('CLOUDFLARE_SECRET_KEY'),
            'response' => $request->input('cf-turnstile-response'),
            'remoteip' => $request->ip(),
        ]);

        $data = $response->json();

        if (!empty($data['success']) && $data['success'] === true) {
            session(['turnstile_verified' => true]);
            return redirect(session('intended_url', '/'));
        } else {
            return back()->withErrors(['captcha' => 'Verification failed. Please try again.']);
        }
    }
}
