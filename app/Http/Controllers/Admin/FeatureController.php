<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Feature;
use App\Helpers\FeatureHelper;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class FeatureController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $features = Feature::ordered()->get();
        return view('admin.features.index', compact('features'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.features.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'title' => 'required|string|max:255',
            'description' => 'required|string|max:500',
            'icon' => 'required|string|max:100',
            'order' => 'nullable|integer|min:0',
            'is_active' => 'boolean'
        ]);

        if ($validator->fails()) {
            return back()->withErrors($validator)->withInput();
        }

        try {
            $data = $request->all();
            $data['is_active'] = $request->boolean('is_active');

            Feature::create($data);
            
            // Clear cache
            FeatureHelper::clearCache();

            return redirect()->route('admin.features.index')
                ->with('success', 'Feature created successfully!');
        } catch (\Exception $e) {
            return back()->with('error', 'Failed to create feature. Please try again.')
                ->withInput();
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $feature = Feature::findOrFail($id);
        return view('admin.features.show', compact('feature'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $feature = Feature::findOrFail($id);
        return view('admin.features.edit', compact('feature'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $feature = Feature::findOrFail($id);

        $validator = Validator::make($request->all(), [
            'title' => 'required|string|max:255',
            'description' => 'required|string|max:500',
            'icon' => 'required|string|max:100',
            'order' => 'nullable|integer|min:0',
            'is_active' => 'boolean'
        ]);

        if ($validator->fails()) {
            return back()->withErrors($validator)->withInput();
        }

        try {
            $data = $request->all();
            $data['is_active'] = $request->boolean('is_active');

            $feature->update($data);
            
            // Clear cache
            FeatureHelper::clearCache();

            return redirect()->route('admin.features.index')
                ->with('success', 'Feature updated successfully!');
        } catch (\Exception $e) {
            return back()->with('error', 'Failed to update feature. Please try again.')
                ->withInput();
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        try {
            $feature = Feature::findOrFail($id);
            $feature->delete();
            
            // Clear cache
            FeatureHelper::clearCache();

            return redirect()->route('admin.features.index')
                ->with('success', 'Feature deleted successfully!');
        } catch (\Exception $e) {
            return back()->with('error', 'Failed to delete feature. Please try again.');
        }
    }

    /**
     * Toggle feature status
     */
    public function toggle($id)
    {
        try {
            $feature = Feature::findOrFail($id);
            $feature->update(['is_active' => !$feature->is_active]);
            
            // Clear cache
            FeatureHelper::clearCache();

            return response()->json([
                'success' => true,
                'message' => 'Feature status updated successfully!',
                'is_active' => $feature->is_active
            ]);
        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'message' => 'Failed to update feature status.'
            ], 500);
        }
    }

    /**
     * Update feature order
     */
    public function updateOrder(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'features' => 'required|array',
            'features.*.id' => 'required|exists:features,id',
            'features.*.order' => 'required|integer|min:0'
        ]);

        if ($validator->fails()) {
            return response()->json([
                'success' => false,
                'message' => 'Invalid data provided.'
            ], 422);
        }

        try {
            foreach ($request->features as $featureData) {
                Feature::where('id', $featureData['id'])
                    ->update(['order' => $featureData['order']]);
            }
            
            // Clear cache
            FeatureHelper::clearCache();

            return response()->json([
                'success' => true,
                'message' => 'Feature order updated successfully!'
            ]);
        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'message' => 'Failed to update feature order.'
            ], 500);
        }
    }
}
