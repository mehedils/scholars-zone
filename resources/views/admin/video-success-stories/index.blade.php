@extends('layouts.admin')

@section('content')
<div class="px-4 sm:px-6 lg:px-8">
    <div class="flex items-center justify-between mb-6">
        <h1 class="text-2xl font-bold text-gray-900">Video Success Stories</h1>
        <a href="{{ route('admin.video-success-stories.create') }}" class="bg-primary text-white px-4 py-2 rounded-lg hover:bg-primary-dark">Add Video</a>
    </div>

    @if(session('success'))
        <div class="mb-4 bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded">{{ session('success') }}</div>
    @endif

    <div class="bg-white rounded-lg shadow overflow-hidden">
        <table class="min-w-full divide-y divide-gray-200">
            <thead class="bg-gray-50">
                <tr>
                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Video</th>
                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Title</th>
                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Student</th>
                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">University</th>
                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Country</th>
                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Order</th>
                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Status</th>
                    <th class="px-6 py-3 text-right text-xs font-medium text-gray-500 uppercase tracking-wider">Actions</th>
                </tr>
            </thead>
            <tbody class="bg-white divide-y divide-gray-200">
                @forelse($videos as $video)
                <tr>
                    <td class="px-6 py-4 whitespace-nowrap">
                        <div class="w-20 h-12 bg-gray-200 rounded overflow-hidden">
                            <img src="{{ $video->youtube_thumbnail_url }}" alt="{{ $video->title }}" class="w-full h-full object-cover" />
                        </div>
                    </td>
                    <td class="px-6 py-4">
                        <div class="font-medium text-gray-900">{{ $video->title }}</div>
                        <div class="text-sm text-gray-500">{{ Str::limit($video->description, 50) }}</div>
                    </td>
                    <td class="px-6 py-4 whitespace-nowrap">{{ $video->student_name }}</td>
                    <td class="px-6 py-4 whitespace-nowrap">{{ $video->university }}</td>
                    <td class="px-6 py-4 whitespace-nowrap">{{ $video->country }}</td>
                    <td class="px-6 py-4 whitespace-nowrap">{{ $video->order }}</td>
                    <td class="px-6 py-4 whitespace-nowrap">
                        <form action="{{ route('admin.video-success-stories.toggle', $video) }}" method="POST" class="inline">
                            @csrf
                            <button type="submit" class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium {{ $video->is_active ? 'bg-green-100 text-green-800' : 'bg-red-100 text-red-800' }}">
                                {{ $video->is_active ? 'Active' : 'Inactive' }}
                            </button>
                        </form>
                    </td>
                    <td class="px-6 py-4 whitespace-nowrap text-right text-sm font-medium">
                        <a href="{{ route('admin.video-success-stories.edit', $video) }}" class="text-primary hover:underline mr-3">Edit</a>
                        <form action="{{ route('admin.video-success-stories.destroy', $video) }}" method="POST" class="inline" onsubmit="return confirm('Delete this video?')">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="text-red-600 hover:underline">Delete</button>
                        </form>
                    </td>
                </tr>
                @empty
                <tr>
                    <td colspan="8" class="px-6 py-6 text-center text-gray-500">No videos found.</td>
                </tr>
                @endforelse
            </tbody>
        </table>
    </div>

    <div class="mt-6">{{ $videos->links() }}</div>
</div>
@endsection
