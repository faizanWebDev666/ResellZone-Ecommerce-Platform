<?php
// app/Http/Controllers/Admin/FeedbackController.php
namespace App\Http\Controllers\Admin;

use App\Models\Feedback;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class FeedbackController extends Controller
{
    // Handle all feedback management in one page
    public function index(Request $request)
    {
        if ($request->isMethod('post')) {
            // Handle feedback creation (when submitting the form)
            $request->validate([
                'title' => 'required|string|max:255',
                'name' => 'required|string|max:255',
                'email' => 'required|email|max:255',
                'review' => 'required|string',
            ]);

            Feedback::create($request->all());

            return redirect()->route('admin.feedback.management')->with('success', 'Feedback added successfully!');
        }

        // Handle viewing, editing, and deleting feedback
        $feedbacks = Feedback::all();

        return view('Feedback_management', compact('feedbacks')); // Correct path to 'Feedback_management.blade.php'
    }

    // Edit existing feedback
    public function edit($id)
    {
        $feedback = Feedback::findOrFail($id);
        return view('Feedback_management', compact('feedback'));
    }

    // Update feedback in the database
    public function update(Request $request, $id)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'name' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'review' => 'required|string',
        ]);

        $feedback = Feedback::findOrFail($id);
        $feedback->update($request->all());

        return redirect()->route('admin.feedback.management')->with('success', 'Feedback updated successfully!');
    }

    // Delete feedback from the database
    public function destroy($id)
    {
        $feedback = Feedback::findOrFail($id);
        $feedback->delete();

        return redirect()->route('admin.feedback.management')->with('success', 'Feedback deleted successfully!');
    }
}
