<?php

namespace App\Http\Controllers;

use App\Models\Feedback;  // Make sure to import your Feedback model
use Illuminate\Http\Request;

class ReviewController extends Controller
{
    public function submitReview(Request $request)
    {
        // Validate the request data
        $request->validate([
            'title' => 'required|string|max:255',
            'name' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'review' => 'required|string',
        ]);

        // Create a new review record
        Feedback::create([
            'title' => $request->title,
            'name' => $request->name,
            'email' => $request->email,
            'review' => $request->review,
        ]);

        // Redirect back with a success message
        return redirect()->back()->with('success', 'Review submitted successfully!');
    }
}
