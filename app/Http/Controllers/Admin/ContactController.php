<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Contact;
use Illuminate\Http\Request;

class ContactController extends Controller
{
    public function index()
    {
        $contacts = Contact::orderBy('created_at', 'desc')->paginate(15);
        return view('admin.contacts.index', compact('contacts'));
    }

    public function show(Contact $contact)
    {
        // Mark as read if unread
        if ($contact->status === 'unread') {
            $contact->update(['status' => 'read']);
        }
        
        return view('admin.contacts.show', compact('contact'));
    }

    public function updateStatus(Request $request, Contact $contact)
    {
        $request->validate([
            'status' => 'required|in:unread,read,replied,archived',
            'admin_notes' => 'nullable|string'
        ]);

        $contact->update([
            'status' => $request->status,
            'admin_notes' => $request->admin_notes,
            'replied_at' => $request->status === 'replied' ? now() : null
        ]);

        if ($request->ajax()) {
            return response()->json([
                'success' => true,
                'message' => 'Contact status updated successfully.'
            ]);
        }

        return redirect()->back()->with('success', 'Contact status updated successfully.');
    }

    public function destroy(Contact $contact)
    {
        $contact->delete();
        
        if (request()->ajax()) {
            return response()->json([
                'success' => true,
                'message' => 'Contact message deleted successfully.'
            ]);
        }

        return redirect()->route('admin.contacts.index')->with('success', 'Contact message deleted successfully.');
    }
}
