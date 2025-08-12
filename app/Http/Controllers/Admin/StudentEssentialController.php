<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\StudentEssential;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class StudentEssentialController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $studentEssentials = StudentEssential::ordered()->get();
        return view('admin.student-essentials.index', compact('studentEssentials'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.student-essentials.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'title' => 'required|string|max:255',
            'description' => 'required|string',
            'icon' => 'required|string|max:255',
            'learn_more_url' => 'nullable|url|max:255',
            'show_learn_more' => 'boolean',
            'order' => 'nullable|integer|min:0',
            'is_active' => 'boolean'
        ]);

        if ($validator->fails()) {
            return redirect()->back()
                ->withErrors($validator)
                ->withInput();
        }

        $data = $validator->validated();
        $data['show_learn_more'] = $request->has('show_learn_more');
        $data['is_active'] = $request->has('is_active');

        StudentEssential::create($data);

        return redirect()->route('admin.student-essentials.index')
            ->with('success', 'Student Essential created successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show(StudentEssential $studentEssential)
    {
        return view('admin.student-essentials.show', compact('studentEssential'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(StudentEssential $studentEssential)
    {
        return view('admin.student-essentials.edit', compact('studentEssential'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, StudentEssential $studentEssential)
    {
        $validator = Validator::make($request->all(), [
            'title' => 'required|string|max:255',
            'description' => 'required|string',
            'icon' => 'required|string|max:255',
            'learn_more_url' => 'nullable|url|max:255',
            'show_learn_more' => 'boolean',
            'order' => 'nullable|integer|min:0',
            'is_active' => 'boolean'
        ]);

        if ($validator->fails()) {
            return redirect()->back()
                ->withErrors($validator)
                ->withInput();
        }

        $data = $validator->validated();
        $data['show_learn_more'] = $request->has('show_learn_more');
        $data['is_active'] = $request->has('is_active');

        $studentEssential->update($data);

        return redirect()->route('admin.student-essentials.index')
            ->with('success', 'Student Essential updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(StudentEssential $studentEssential)
    {
        $studentEssential->delete();

        return redirect()->route('admin.student-essentials.index')
            ->with('success', 'Student Essential deleted successfully.');
    }

    /**
     * Toggle the active status of a student essential
     */
    public function toggle(StudentEssential $studentEssential)
    {
        $studentEssential->update([
            'is_active' => !$studentEssential->is_active
        ]);

        return response()->json([
            'success' => true,
            'is_active' => $studentEssential->is_active,
            'message' => 'Status updated successfully'
        ]);
    }

    /**
     * Update the order of student essentials
     */
    public function updateOrder(Request $request)
    {
        $request->validate([
            'orders' => 'required|array',
            'orders.*.id' => 'required|exists:student_essentials,id',
            'orders.*.order' => 'required|integer|min:0'
        ]);

        foreach ($request->orders as $item) {
            StudentEssential::where('id', $item['id'])->update(['order' => $item['order']]);
        }

        return response()->json([
            'success' => true,
            'message' => 'Order updated successfully'
        ]);
    }
}
