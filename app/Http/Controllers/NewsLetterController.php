<?php

namespace App\Http\Controllers;

use App\Models\Newsletter;
use Illuminate\Http\Request;

class NewsLetterController extends Controller
{
    public function newsLetter(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
        ]);
    
        // Check if the email already exists in the database
        $existingSubscriber = Newsletter::where('email', $request->email)->first();
    
        if ($existingSubscriber) {
            // If email already exists, return back with an error message
            return redirect()->back()->withErrors(['email' => 'This email is already subscribed to our newsletter.']);
        }
    
        // If email does not exist, create a new subscription
        Newsletter::create([
            'email' => $request->email,
        ]);
    
        // Success message after successful subscription
        return redirect()->back()->with('success', 'Thank you for joining our newsletter!');
    }
    public function destroy($id)
{
    $Newsletter = Newsletter::find($id);

    if (!$Newsletter) {
        return redirect()->back()->with('error', 'Contact not found.');
    }

    $Newsletter->delete();

    return redirect()->back()->with('success', 'Subscription deleted successfully.');
}
}
