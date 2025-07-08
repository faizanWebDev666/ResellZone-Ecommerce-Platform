<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Session;
use App\Models\User;

class ProfileController extends Controller
{
    public function update(Request $request)
{
    if (!session()->has('id')) {
        return response()->json(['success' => false, 'message' => 'Please login to update your profile.']);
    }

    $user = User::find(session()->get('id'));

    if (!$user) {
        return response()->json(['success' => false, 'message' => 'User not found.']);
    }

    $request->validate([
        'name' => 'required|string|max:255',
        'email' => 'required|email|unique:users,email,' . $user->id,
        'phone' => 'nullable|string|max:15',
        'address' => 'nullable|string|max:500',
    ]);

    // Update fields if new values are provided
    $user->name = $request->input('name');
    $user->email = $request->input('email');

    if ($request->filled('phone')) {
        $user->phone = $request->input('phone');
    }

    if ($request->filled('address')) {
        $user->address = $request->input('address');
    }

    $user->save();

    return response()->json([
        'success' => true,
        'message' => 'Profile updated successfully.',
        'user' => $user
    ]);
}



    // User Profile 
    public function profile()
    {
        if (session()->has('id')) {
            $user = User::find(session()->get('id')); // Fetch the user using session ID
            return view('profile', compact('user')); // Pass user to the view
        } else {
            return redirect('signin')->with('error', 'Info! Please Login to System.');
        }
    }
    // User Profile
    public function updatePassword(Request $request)
    {
        if (!session()->has('id')) {
            return redirect('signin')->with('error', 'Info! Please Login to System.');
        }

        $request->validate([
            'current_password' => 'required',
            'new_password' => 'required|min:8',
            'confirm_password' => 'required|same:new_password',
        ]);

        $user = User::find(session('id')); // Fetch user from session

        // Check if current password matches
        if (!Hash::check($request->current_password, $user->password)) {
            return back()->with('error', 'Current password is incorrect.');
        }

        // Update password
        $user->password = Hash::make($request->new_password);
        $user->save();

        return back()->with('success', 'Password updated successfully.');
    }

    // User Profile
    // User Profile
public function uploadProfilePic(Request $request)
{
    if (!session()->has('id')) {
        return response()->json(['success' => false, 'message' => 'Please login to upload a profile picture.']);
    }

    $request->validate([
        'image' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
    ]);

    $user = User::find(session()->get('id'));

    if (!$user) {
        return response()->json(['success' => false, 'message' => 'User not found.']);
    }

    if ($request->hasFile('image')) {
        // Delete the old profile picture if it exists
        if ($user->profile_picture) {
            Storage::disk('public')->delete($user->profile_picture);
        }

        // Store the new file in 'public/profile_pics'
        $imagePath = $request->file('image')->store('profile_pics', 'public');

        // Update the user's profile picture in the database
        $user->profile_picture = $imagePath;
        $user->save();

        // ✅ **Update session immediately**
        session()->put('profile_picture', $imagePath);

        // Return the new image URL as part of the response
        return response()->json([
            'success' => true,
            'profilePicUrl' => asset('storage/' . $imagePath)
        ]);
    }

    return response()->json(['success' => false, 'message' => 'Failed to upload image.']);
}


}
