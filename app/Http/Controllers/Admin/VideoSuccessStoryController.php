<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\VideoSuccessStory;
use Illuminate\Http\Request;

class VideoSuccessStoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $videos = VideoSuccessStory::ordered()->paginate(20);
        return view('admin.video-success-stories.index', compact('videos'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.video-success-stories.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'student_name' => 'required|string|max:255',
            'university' => 'required|string|max:255',
            'country' => 'required|string|max:255',
            'description' => 'required|string',
            'youtube_video_id' => 'required|string|max:255',
            'thumbnail_url' => 'nullable|url',
            'order' => 'nullable|integer|min:0',
            'is_active' => 'sometimes|boolean',
        ]);

        $validated['is_active'] = $request->boolean('is_active');

        VideoSuccessStory::create($validated);
        return redirect()->route('admin.video-success-stories.index')->with('success', 'Video success story created.');
    }

    /**
     * Display the specified resource.
     */
    public function show(VideoSuccessStory $videoSuccessStory)
    {
        return view('admin.video-success-stories.show', ['video' => $videoSuccessStory]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(VideoSuccessStory $videoSuccessStory)
    {
        return view('admin.video-success-stories.edit', ['video' => $videoSuccessStory]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, VideoSuccessStory $videoSuccessStory)
    {
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'student_name' => 'required|string|max:255',
            'university' => 'required|string|max:255',
            'country' => 'required|string|max:255',
            'description' => 'required|string',
            'youtube_video_id' => 'required|string|max:255',
            'thumbnail_url' => 'nullable|url',
            'order' => 'nullable|integer|min:0',
            'is_active' => 'sometimes|boolean',
        ]);

        $validated['is_active'] = $request->boolean('is_active');

        $videoSuccessStory->update($validated);
        return redirect()->route('admin.video-success-stories.index')->with('success', 'Video success story updated.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(VideoSuccessStory $videoSuccessStory)
    {
        $videoSuccessStory->delete();
        return back()->with('success', 'Video success story deleted.');
    }

    /**
     * Toggle the active status of a video success story.
     */
    public function toggle(Request $request, VideoSuccessStory $videoSuccessStory)
    {
        $videoSuccessStory->update(['is_active' => !$videoSuccessStory->is_active]);
        return back()->with('success', 'Video status updated.');
    }
}
