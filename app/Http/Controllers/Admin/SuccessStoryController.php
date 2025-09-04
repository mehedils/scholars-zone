<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\SuccessStory;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class SuccessStoryController extends Controller
{
    public function index()
    {
        $stories = SuccessStory::ordered()->paginate(20);
        return view('admin.success-stories.index', compact('stories'));
    }

    public function create()
    {
        return view('admin.success-stories.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'excerpt' => 'nullable|string|max:500',
            'content' => 'nullable|string',
            'student_name' => 'nullable|string|max:255',
            'destination' => 'nullable|string|max:255',
            'published_at' => 'nullable|date',
            'order' => 'nullable|integer|min:0',
            'is_active' => 'sometimes|boolean',
            'image' => 'nullable|image|max:3072',
        ]);

        $validated['slug'] = Str::slug($request->input('title'));
        if ($request->hasFile('image')) {
            $validated['image_path'] = $request->file('image')->store('success-stories', 'public');
        }
        $validated['is_active'] = $request->boolean('is_active');

        SuccessStory::create($validated);
        return redirect()->route('admin.success-stories.index')->with('success', 'Success story created.');
    }

    public function edit(SuccessStory $success_story)
    {
        return view('admin.success-stories.edit', ['story' => $success_story]);
    }

    public function update(Request $request, SuccessStory $success_story)
    {
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'excerpt' => 'nullable|string|max:500',
            'content' => 'nullable|string',
            'student_name' => 'nullable|string|max:255',
            'destination' => 'nullable|string|max:255',
            'published_at' => 'nullable|date',
            'order' => 'nullable|integer|min:0',
            'is_active' => 'sometimes|boolean',
            'image' => 'nullable|image|max:3072',
        ]);

        $validated['slug'] = Str::slug($request->input('title'));
        if ($request->hasFile('image')) {
            if ($success_story->image_path) {
                Storage::disk('public')->delete($success_story->image_path);
            }
            $validated['image_path'] = $request->file('image')->store('success-stories', 'public');
        }
        $validated['is_active'] = $request->boolean('is_active');

        $success_story->update($validated);
        return redirect()->route('admin.success-stories.index')->with('success', 'Success story updated.');
    }

    public function destroy(SuccessStory $success_story)
    {
        if ($success_story->image_path) {
            Storage::disk('public')->delete($success_story->image_path);
        }
        $success_story->delete();
        return back()->with('success', 'Success story deleted.');
    }

    public function uploadImage(Request $request)
    {
        $request->validate([
            'file' => 'required|image|max:3072',
        ]);

        $path = $request->file('file')->store('success-stories', 'public');
        return response()->json(['location' => Storage::url($path)]);
    }
}


