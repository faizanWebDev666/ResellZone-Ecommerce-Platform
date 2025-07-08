<?php

namespace App\Http\Controllers;

use App\Models\Contact;
use Illuminate\Http\Request;

class ContatsController extends Controller
{
    public function contactform(Request $data)
    {

        $data->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'subject' => 'required|string|max:255',
            'msg' => 'required|string',
        ]);
        $newContact = new Contact();
        $newContact->name = $data->input('name');
        $newContact->email = $data->input('email');
        $newContact->subject = $data->input('subject');
        $newContact->msg = $data->input('msg');
        if ($newContact->save()) {
            // Redirect with a success message
            return redirect()->back()->with('success', ' The post has been added!');
        } else {
            // Redirect with an error message
            return redirect()->back()->with('error', ['type' => 'error', 'text' => 'An error occurred while submitting the form.']);
        }

    }
    public function markRead($id)
    {
        $contact = Contact::findOrFail($id);
        $contact->status = 'read';
        $contact->save();
        return back()->with('success', 'Marked as Read');
    }

    // Mark as Unread
    public function markUnread($id)
    {
        $contact = Contact::findOrFail($id);
        $contact->status = 'unread';
        $contact->save();
        return back()->with('success', 'Marked as Unread');
    }

    // Delete Contact
    public function destroy($id)
{
    $contact = Contact::find($id);

    if (!$contact) {
        return redirect()->back()->with('error', 'Contact not found.');
    }

    $contact->delete();

    return redirect()->back()->with('success', 'Contact deleted successfully.');
}


}
