<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Consultation;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class ConsultationController extends Controller
{
    public function index(Request $request)
    {
        $query = Consultation::query();

        // Search functionality
        if ($request->filled('search')) {
            $search = $request->search;
            $query->where(function($q) use ($search) {
                $q->where('full_name', 'like', "%{$search}%")
                  ->orWhere('email', 'like', "%{$search}%")
                  ->orWhere('phone', 'like', "%{$search}%")
                  ->orWhere('preferred_country', 'like', "%{$search}%")
                  ->orWhere('study_level', 'like', "%{$search}%")
                  ->orWhere('preferred_subject', 'like', "%{$search}%");
            });
        }

        // Status filter
        if ($request->filled('status') && $request->status !== '') {
            $query->where('status', $request->status);
        }

        // Date range filter
        if ($request->filled('date_from')) {
            $query->whereDate('created_at', '>=', $request->date_from);
        }
        if ($request->filled('date_to')) {
            $query->whereDate('created_at', '<=', $request->date_to);
        }

        // Per page filter
        $perPage = $request->get('per_page', 15);
        $perPage = in_array($perPage, [10, 25, 50]) ? $perPage : 15;

        $consultations = $query->orderBy('created_at', 'desc')->paginate($perPage);

        // Get counts for statistics
        $totalCount = Consultation::count();
        $pendingCount = Consultation::where('status', 'pending')->count();
        $contactedCount = Consultation::where('status', 'contacted')->count();
        $completedCount = Consultation::where('status', 'completed')->count();

        // For AJAX requests, return JSON
        if ($request->ajax()) {
            return response()->json([
                'html' => view('admin.consultations.partials.table', compact('consultations'))->render(),
                'pagination' => view('admin.consultations.partials.pagination', compact('consultations'))->render(),
                'stats' => [
                    'total' => $totalCount,
                    'pending' => $pendingCount,
                    'contacted' => $contactedCount,
                    'completed' => $completedCount,
                ]
            ]);
        }

        return view('admin.consultations.index', compact('consultations', 'totalCount', 'pendingCount', 'contactedCount', 'completedCount'));
    }

    public function show(Consultation $consultation)
    {
        return view('admin.consultations.show', compact('consultation'));
    }

    public function updateStatus(Request $request, Consultation $consultation)
    {
        try {
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
        } catch (\Illuminate\Validation\ValidationException $e) {
            if ($request->ajax()) {
                return response()->json([
                    'success' => false,
                    'message' => 'Validation failed',
                    'errors' => $e->errors()
                ], 422);
            }
            throw $e;
        } catch (\Exception $e) {
            if ($request->ajax()) {
                return response()->json([
                    'success' => false,
                    'message' => 'An error occurred while updating the status.'
                ], 500);
            }
            throw $e;
        }
    }

    public function destroy(Consultation $consultation)
    {
        try {
            $consultation->delete();
            
            if (request()->ajax()) {
                return response()->json([
                    'success' => true,
                    'message' => 'Consultation deleted successfully.'
                ]);
            }

            return redirect()->route('admin.consultations.index')->with('success', 'Consultation deleted successfully.');
        } catch (\Exception $e) {
            if (request()->ajax()) {
                return response()->json([
                    'success' => false,
                    'message' => 'An error occurred while deleting the consultation.'
                ], 500);
            }
            throw $e;
        }
    }

    public function exportCsv(Request $request)
    {
        $query = Consultation::query();

        // Apply filters if provided
        if ($request->filled('search')) {
            $search = $request->search;
            $query->where(function($q) use ($search) {
                $q->where('first_name', 'like', "%{$search}%")
                  ->orWhere('last_name', 'like', "%{$search}%")
                  ->orWhere('email', 'like', "%{$search}%")
                  ->orWhere('phone', 'like', "%{$search}%")
                  ->orWhere('preferred_country', 'like', "%{$search}%")
                  ->orWhere('study_level', 'like', "%{$search}%")
                  ->orWhere('preferred_subject', 'like', "%{$search}%");
            });
        }

        if ($request->filled('status') && $request->status !== '') {
            $query->where('status', $request->status);
        }

        if ($request->filled('date_from')) {
            $query->whereDate('created_at', '>=', $request->date_from);
        }
        if ($request->filled('date_to')) {
            $query->whereDate('created_at', '<=', $request->date_to);
        }

        $consultations = $query->orderBy('created_at', 'desc')->get();

        $filename = 'consultations_export_' . now()->format('Y-m-d_H-i-s') . '.csv';

        $headers = [
            'Content-Type' => 'text/csv',
            'Content-Disposition' => 'attachment; filename="' . $filename . '"',
        ];

        $callback = function() use ($consultations) {
            $file = fopen('php://output', 'w');
            
            // Add CSV headers
            fputcsv($file, [
                'ID',
                'First Name',
                'Last Name',
                'Full Name',
                'Email',
                'Phone',
                'Preferred Country',
                'Study Level',
                'Preferred Subject',
                'Preferred Intake',
                'Message',
                'Status',
                'Admin Notes',
                'Contacted At',
                'Created At',
                'Updated At'
            ]);

            // Add data rows
            foreach ($consultations as $consultation) {
                fputcsv($file, [
                    $consultation->id,
                    $consultation->first_name,
                    $consultation->last_name,
                    $consultation->full_name,
                    $consultation->email,
                    $consultation->phone,
                    $consultation->preferred_country,
                    $consultation->study_level,
                    $consultation->preferred_subject,
                    $consultation->preferred_intake,
                    $consultation->message,
                    $consultation->status,
                    $consultation->admin_notes,
                    $consultation->contacted_at ? $consultation->contacted_at->format('Y-m-d H:i:s') : '',
                    $consultation->created_at->format('Y-m-d H:i:s'),
                    $consultation->updated_at->format('Y-m-d H:i:s')
                ]);
            }

            fclose($file);
        };

        return response()->stream($callback, 200, $headers);
    }
}
