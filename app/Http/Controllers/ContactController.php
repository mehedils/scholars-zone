<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Mail;
use App\Models\Contact;

class ContactController extends Controller
{
    public function index()
    {
        return view('frontend.contact');
    }

    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'phone' => 'nullable|string|max:20',
            'subject' => 'required|string|max:255',
            'message' => 'required|string|max:2000',
        ]);

        if ($validator->fails()) {
            return response()->json([
                'success' => false,
                'message' => 'Please check your input and try again.',
                'errors' => $validator->errors()
            ], 422);
        }

        try {
            // Store contact message in database
            Contact::create($request->all());
            
            // Send email notification (optional)
            // Mail::to('admin@scholarszone.com')->send(new ContactFormMail($request->all()));
            
            return response()->json([
                'success' => true,
                'message' => 'Thank you for your message! We will get back to you soon.'
            ]);
        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'message' => 'Something went wrong. Please try again later.'
            ], 500);
        }
    }
}
