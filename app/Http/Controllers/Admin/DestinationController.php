<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Destination;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class DestinationController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $destinations = Destination::orderBy('order')->orderBy('name')->paginate(12);
        $totalDestinations = Destination::count();
        $activeDestinations = Destination::where('is_active', true)->count();
        $draftDestinations = Destination::where('is_active', false)->count();
        $featuredDestinations = Destination::where('is_featured', true)->count();

        return view('admin.destinations.index', compact(
            'destinations',
            'totalDestinations',
            'activeDestinations',
            'draftDestinations',
            'featuredDestinations'
        ));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $regions = [
            'North America' => 'North America',
            'Europe' => 'Europe',
            'Asia' => 'Asia',
            'Australia' => 'Australia',
            'Africa' => 'Africa',
            'South America' => 'South America'
        ];

        return view('admin.destinations.create', compact('regions'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'short_description' => 'required|string|max:500',
            'content' => 'required|string',
            'region' => 'required|string|max:255',
            'capital' => 'nullable|string|max:255',
            'currency' => 'nullable|string|max:50',
            'language' => 'nullable|string|max:255',
            'average_tuition_fee' => 'nullable|numeric|min:0',
            'average_living_cost' => 'nullable|numeric|min:0',
            'universities_count' => 'nullable|integer|min:0',
            'programs_count' => 'nullable|integer|min:0',
            'featured_image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'flag_image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'highlights' => 'nullable|array',
            'highlights.*' => 'string|max:255',
            'requirements' => 'nullable|array',
            'requirements.*' => 'string|max:255',
            'benefits' => 'nullable|array',
            'benefits.*' => 'string|max:255',
            'is_featured' => 'boolean',
            'is_active' => 'boolean',
            'order' => 'nullable|integer|min:0',
            'meta_title' => 'nullable|string|max:255',
            'meta_description' => 'nullable|string|max:500',
        ]);

        $data = $request->all();
        
        // Handle file uploads
        if ($request->hasFile('featured_image')) {
            $data['featured_image'] = $this->uploadImage($request->file('featured_image'), 'destinations/featured');
        }
        
        if ($request->hasFile('flag_image')) {
            $data['flag_image'] = $this->uploadImage($request->file('flag_image'), 'destinations/flags');
        }

        // Generate slug if not provided
        if (empty($data['slug'])) {
            $data['slug'] = Str::slug($data['name']);
        }

        // Handle boolean fields
        $data['is_featured'] = $request->has('is_featured');
        $data['is_active'] = $request->has('is_active');

        // Filter out empty array values
        $data['highlights'] = array_filter($data['highlights'] ?? []);
        $data['requirements'] = array_filter($data['requirements'] ?? []);
        $data['benefits'] = array_filter($data['benefits'] ?? []);

        Destination::create($data);

        return redirect()->route('admin.destinations.index')
            ->with('success', 'Destination created successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show(Destination $destination)
    {
        return view('admin.destinations.show', compact('destination'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Destination $destination)
    {
        $regions = [
            'North America' => 'North America',
            'Europe' => 'Europe',
            'Asia' => 'Asia',
            'Australia' => 'Australia',
            'Africa' => 'Africa',
            'South America' => 'South America'
        ];

        return view('admin.destinations.edit', compact('destination', 'regions'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Destination $destination)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'short_description' => 'required|string|max:500',
            'content' => 'required|string',
            'region' => 'required|string|max:255',
            'capital' => 'nullable|string|max:255',
            'currency' => 'nullable|string|max:50',
            'language' => 'nullable|string|max:255',
            'average_tuition_fee' => 'nullable|numeric|min:0',
            'average_living_cost' => 'nullable|numeric|min:0',
            'universities_count' => 'nullable|integer|min:0',
            'programs_count' => 'nullable|integer|min:0',
            'featured_image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'flag_image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'highlights' => 'nullable|array',
            'highlights.*' => 'string|max:255',
            'requirements' => 'nullable|array',
            'requirements.*' => 'string|max:255',
            'benefits' => 'nullable|array',
            'benefits.*' => 'string|max:255',
            'is_featured' => 'boolean',
            'is_active' => 'boolean',
            'order' => 'nullable|integer|min:0',
            'meta_title' => 'nullable|string|max:255',
            'meta_description' => 'nullable|string|max:500',
        ]);

        $data = $request->all();
        
        // Handle file uploads
        if ($request->hasFile('featured_image')) {
            // Delete old image
            if ($destination->featured_image) {
                Storage::disk('public')->delete($destination->featured_image);
            }
            $data['featured_image'] = $this->uploadImage($request->file('featured_image'), 'destinations/featured');
        }
        
        if ($request->hasFile('flag_image')) {
            // Delete old image
            if ($destination->flag_image) {
                Storage::disk('public')->delete($destination->flag_image);
            }
            $data['flag_image'] = $this->uploadImage($request->file('flag_image'), 'destinations/flags');
        }

        // Generate slug if name changed
        if ($destination->name !== $data['name']) {
            $data['slug'] = Str::slug($data['name']);
        }

        // Handle boolean fields
        $data['is_featured'] = $request->has('is_featured');
        $data['is_active'] = $request->has('is_active');

        // Filter out empty array values
        $data['highlights'] = array_filter($data['highlights'] ?? []);
        $data['requirements'] = array_filter($data['requirements'] ?? []);
        $data['benefits'] = array_filter($data['benefits'] ?? []);

        $destination->update($data);

        return redirect()->route('admin.destinations.index')
            ->with('success', 'Destination updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Destination $destination)
    {
        // Delete associated images
        if ($destination->featured_image) {
            Storage::disk('public')->delete($destination->featured_image);
        }
        
        if ($destination->flag_image) {
            Storage::disk('public')->delete($destination->flag_image);
        }

        $destination->delete();

        return redirect()->route('admin.destinations.index')
            ->with('success', 'Destination deleted successfully.');
    }

    /**
     * Upload image to storage
     */
    private function uploadImage($file, $path)
    {
        $filename = time() . '_' . Str::random(10) . '.' . $file->getClientOriginalExtension();
        $file->storeAs($path, $filename, 'public');
        return $path . '/' . $filename;
    }

    /**
     * Toggle destination status
     */
    public function toggleStatus(Destination $destination)
    {
        $destination->update(['is_active' => !$destination->is_active]);
        
        return response()->json([
            'success' => true,
            'is_active' => $destination->is_active,
            'message' => 'Destination status updated successfully.'
        ]);
    }

    /**
     * Toggle featured status
     */
    public function toggleFeatured(Destination $destination)
    {
        $destination->update(['is_featured' => !$destination->is_featured]);
        
        return response()->json([
            'success' => true,
            'is_featured' => $destination->is_featured,
            'message' => 'Destination featured status updated successfully.'
        ]);
    }

    /**
     * Handle file uploads for TinyMCE
     */
    public function uploadFile(Request $request)
    {
        $request->validate([
            'file' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048'
        ]);

        if ($request->hasFile('file')) {
            $file = $request->file('file');
            $path = $this->uploadImage($file, 'destinations/content');
            
            return response()->json([
                'location' => asset('storage/' . $path)
            ]);
        }

        return response()->json(['error' => 'No file uploaded'], 400);
    }
}
