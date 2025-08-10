<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Consultation;
use Illuminate\Http\Request;

class ConsultationController extends Controller
{
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

        if ($request->ajax()) {
            return response()->json([
                'success' => true,
                'message' => 'Consultation status updated successfully.'
            ]);
        }

        return redirect()->back()->with('success', 'Consultation status updated successfully.');
    }

    public function destroy(Consultation $consultation)
    {
        $consultation->delete();
        
        if (request()->ajax()) {
            return response()->json([
                'success' => true,
                'message' => 'Consultation deleted successfully.'
            ]);
        }

        return redirect()->route('admin.consultations.index')->with('success', 'Consultation deleted successfully.');
    }
}
