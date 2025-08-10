<?php

namespace App\Http\Controllers;

use App\Models\Consultation;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class ConsultationController extends Controller
{
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'first_name' => 'required|string|max:255',
            'last_name' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'phone' => 'required|string|max:20',
            'preferred_country' => 'nullable|string|max:255',
            'study_level' => 'nullable|string|max:255',
            'preferred_subject' => 'nullable|string|max:255',
            'preferred_intake' => 'nullable|string|max:255',
            'message' => 'nullable|string',
        ]);

        if ($validator->fails()) {
            return response()->json([
                'success' => false,
                'message' => 'Please check your input and try again.',
                'errors' => $validator->errors()
            ], 422);
        }

        try {
            $consultation = Consultation::create($request->all());

            return response()->json([
                'success' => true,
                'message' => 'Thank you for your consultation request! We will contact you soon.',
                'consultation_id' => $consultation->id
            ]);
        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'message' => 'Something went wrong. Please try again later.'
            ], 500);
        }
    }

    public function index()
    {
        $consultations = Consultation::orderBy('created_at', 'desc')->paginate(15);
        return view('admin.consultations.index', compact('consultations'));
    }

    public function show(Consultation $consultation)
    {
        return view('admin.consultations.show', compact('consultation'));
    }

    public function updateStatus(Request $request, Consultation $consultation)
    {
        $request->validate([
            'status' => 'required|in:pending,contacted,completed,cancelled',
            'admin_notes' => 'nullable|string'
        ]);

        $consultation->update([
            'status' => $request->status,
            'admin_notes' => $request->admin_notes,
            'contacted_at' => $request->status === 'contacted' ? now() : null
        ]);

        return response()->json([
            'success' => true,
            'message' => 'Consultation status updated successfully.'
        ]);
    }
}
