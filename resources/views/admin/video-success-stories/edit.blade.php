@extends('layouts.admin')

@section('content')
<div class="px-4 sm:px-6 lg:px-8">
    <div class="flex items-center justify-between mb-6">
        <h1 class="text-2xl font-bold text-gray-900">Edit Video Success Story</h1>
        <a href="{{ route('admin.video-success-stories.index') }}" class="text-gray-600 hover:underline">Back</a>
    </div>

    <form action="{{ route('admin.video-success-stories.update', $video) }}" method="POST" class="bg-white rounded-lg shadow p-6 space-y-6">
        @csrf
        @method('PUT')
        <div>
            <label class="block text-sm font-medium text-gray-700 mb-1">Title *</label>
            <input type="text" name="title" value="{{ old('title', $video->title) }}" class="w-full px-4 py-2 border rounded-lg" required>
            @error('title')
                <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
            @enderror
        </div>
        
        <div class="grid md:grid-cols-2 gap-4">
            <div>
                <label class="block text-sm font-medium text-gray-700 mb-1">Student Name *</label>
                <input type="text" name="student_name" value="{{ old('student_name', $video->student_name) }}" class="w-full px-4 py-2 border rounded-lg" required>
                @error('student_name')
                    <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                @enderror
            </div>
            <div>
                <label class="block text-sm font-medium text-gray-700 mb-1">University *</label>
                <input type="text" name="university" value="{{ old('university', $video->university) }}" class="w-full px-4 py-2 border rounded-lg" required>
                @error('university')
                    <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                @enderror
            </div>
        </div>
        
        <div class="grid md:grid-cols-2 gap-4">
            <div>
                <label class="block text-sm font-medium text-gray-700 mb-1">Country *</label>
                <input type="text" name="country" value="{{ old('country', $video->country) }}" class="w-full px-4 py-2 border rounded-lg" required>
                @error('country')
                    <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                @enderror
            </div>
            <div>
                <label class="block text-sm font-medium text-gray-700 mb-1">Order</label>
                <input type="number" min="0" name="order" value="{{ old('order', $video->order) }}" class="w-full px-4 py-2 border rounded-lg">
                @error('order')
                    <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                @enderror
            </div>
        </div>
        
        <div>
            <label class="block text-sm font-medium text-gray-700 mb-1">Description *</label>
            <textarea name="description" class="w-full px-4 py-2 border rounded-lg" rows="3" required>{{ old('description', $video->description) }}</textarea>
            @error('description')
                <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
            @enderror
        </div>
        
        <div class="grid md:grid-cols-2 gap-4">
            <div>
                <label class="block text-sm font-medium text-gray-700 mb-1">YouTube Video ID *</label>
                <input type="text" name="youtube_video_id" value="{{ old('youtube_video_id', $video->youtube_video_id) }}" class="w-full px-4 py-2 border rounded-lg" placeholder="e.g., dQw4w9WgXcQ" required>
                <p class="text-sm text-gray-500 mt-1">Enter only the video ID from YouTube URL (e.g., from https://www.youtube.com/watch?v=dQw4w9WgXcQ)</p>
                @error('youtube_video_id')
                    <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                @enderror
            </div>
            <div>
                <label class="block text-sm font-medium text-gray-700 mb-1">Custom Thumbnail URL</label>
                <input type="url" name="thumbnail_url" value="{{ old('thumbnail_url', $video->thumbnail_url) }}" class="w-full px-4 py-2 border rounded-lg" placeholder="https://example.com/thumbnail.jpg">
                <p class="text-sm text-gray-500 mt-1">Optional: Custom thumbnail URL (defaults to YouTube thumbnail)</p>
                @error('thumbnail_url')
                    <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                @enderror
            </div>
        </div>
        
        <div class="flex items-center space-x-2">
            <input type="checkbox" name="is_active" value="1" id="is_active" {{ old('is_active', $video->is_active) ? 'checked' : '' }}>
            <label for="is_active" class="text-sm text-gray-700">Active</label>
        </div>
        
        <div>
            <button type="submit" class="bg-primary text-white px-6 py-2 rounded-lg hover:bg-primary-dark">Update Video</button>
        </div>
    </form>
</div>
@endsection
