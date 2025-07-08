<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\PrivacyPolicy;
use Illuminate\Http\Request;

class PrivacyPolicyController extends Controller
{
   
     public function edit()
    {
        $policy = PrivacyPolicy::first();
        return view('backend.adminManagePolicy', compact('policy'));
    }

    public function update(Request $request)
    {
        $request->validate([
            'content' => 'required|string',
        ]);

        $policy = PrivacyPolicy::first();
        if (!$policy) $policy = new PrivacyPolicy();

        $policy->content = $request->input('content');
        $policy->save();

        return redirect()->back()->with('success', 'Privacy Policy updated successfully.');
    }
}
