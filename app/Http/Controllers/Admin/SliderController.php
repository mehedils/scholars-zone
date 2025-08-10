<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Slider;
use App\Helpers\SliderHelper;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;

class SliderController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $sliders = Slider::ordered()->get();
        return view('admin.sliders.index', compact('sliders'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.sliders.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'title' => 'nullable|string|max:255',
            'subtitle' => 'nullable|string|max:255',
            'description' => 'nullable|string|max:1000',
            'button_text' => 'nullable|string|max:100',
            'button_url' => 'nullable|url|max:500',
            'image' => 'required|image|mimes:jpeg,png,jpg,gif,webp|max:2048',
            'order' => 'nullable|integer|min:0',
            'is_active' => 'boolean'
        ]);

        if ($validator->fails()) {
            return back()->withErrors($validator)->withInput();
        }

        try {
            $data = $request->except('image');
            $data['is_active'] = $request->boolean('is_active');

            // Handle image upload
            if ($request->hasFile('image')) {
                $imagePath = $request->file('image')->store('sliders', 'public');
                $data['image'] = $imagePath;
            }

            Slider::create($data);
            
            // Clear cache
            SliderHelper::clearCache();

            return redirect()->route('admin.sliders.index')
                ->with('success', 'Slider created successfully!');
        } catch (\Exception $e) {
            return back()->with('error', 'Failed to create slider. Please try again.')
                ->withInput();
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $slider = Slider::findOrFail($id);
        return view('admin.sliders.show', compact('slider'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $slider = Slider::findOrFail($id);
        return view('admin.sliders.edit', compact('slider'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $slider = Slider::findOrFail($id);

        $validator = Validator::make($request->all(), [
            'title' => 'nullable|string|max:255',
            'subtitle' => 'nullable|string|max:255',
            'description' => 'nullable|string|max:1000',
            'button_text' => 'nullable|string|max:100',
            'button_url' => 'nullable|url|max:500',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif,webp|max:2048',
            'order' => 'nullable|integer|min:0',
            'is_active' => 'boolean'
        ]);

        if ($validator->fails()) {
            return back()->withErrors($validator)->withInput();
        }

        try {
            $data = $request->except('image');
            $data['is_active'] = $request->boolean('is_active');

            // Handle image upload
            if ($request->hasFile('image')) {
                // Delete old image if exists
                if ($slider->image) {
                    Storage::disk('public')->delete($slider->image);
                }
                
                $imagePath = $request->file('image')->store('sliders', 'public');
                $data['image'] = $imagePath;
            }

            $slider->update($data);
            
            // Clear cache
            SliderHelper::clearCache();

            return redirect()->route('admin.sliders.index')
                ->with('success', 'Slider updated successfully!');
        } catch (\Exception $e) {
            return back()->with('error', 'Failed to update slider. Please try again.')
                ->withInput();
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        try {
            $slider = Slider::findOrFail($id);
            
            // Delete image if exists
            if ($slider->image) {
                Storage::disk('public')->delete($slider->image);
            }
            
            $slider->delete();
            
            // Clear cache
            SliderHelper::clearCache();

            return redirect()->route('admin.sliders.index')
                ->with('success', 'Slider deleted successfully!');
        } catch (\Exception $e) {
            return back()->with('error', 'Failed to delete slider. Please try again.');
        }
    }

    /**
     * Toggle slider status
     */
    public function toggle($id)
    {
        try {
            $slider = Slider::findOrFail($id);
            $slider->update(['is_active' => !$slider->is_active]);
            
            // Clear cache
            SliderHelper::clearCache();

            return response()->json([
                'success' => true,
                'message' => 'Slider status updated successfully!',
                'is_active' => $slider->is_active
            ]);
        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'message' => 'Failed to update slider status.'
            ], 500);
        }
    }

    /**
     * Update slider order
     */
    public function updateOrder(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'sliders' => 'required|array',
            'sliders.*.id' => 'required|exists:sliders,id',
            'sliders.*.order' => 'required|integer|min:0'
        ]);

        if ($validator->fails()) {
            return response()->json([
                'success' => false,
                'message' => 'Invalid data provided.'
            ], 422);
        }

        try {
            foreach ($request->sliders as $sliderData) {
                Slider::where('id', $sliderData['id'])
                    ->update(['order' => $sliderData['order']]);
            }
            
            // Clear cache
            SliderHelper::clearCache();

            return response()->json([
                'success' => true,
                'message' => 'Slider order updated successfully!'
            ]);
        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'message' => 'Failed to update slider order.'
            ], 500);
        }
    }
}
