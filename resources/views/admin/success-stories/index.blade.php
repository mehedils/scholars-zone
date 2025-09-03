@extends('layouts.admin')

@section('content')
<div class="px-4 sm:px-6 lg:px-8">
    <div class="flex items-center justify-between mb-6">
        <h1 class="text-2xl font-bold text-gray-900">Success Stories</h1>
        <a href="{{ route('admin.success-stories.create') }}" class="bg-primary text-white px-4 py-2 rounded-lg hover:bg-primary-dark">Add Story</a>
    </div>

    @if(session('success'))
        <div class="mb-4 bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded">{{ session('success') }}</div>
    @endif

    <div class="bg-white rounded-lg shadow overflow-hidden">
        <table class="min-w-full divide-y divide-gray-200">
            <thead class="bg-gray-50">
                <tr>
                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Title</th>
                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Student</th>
                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Destination</th>
                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Published</th>
                    <th class="px-6 py-3 text-right text-xs font-medium text-gray-500 uppercase tracking-wider">Actions</th>
                </tr>
            </thead>
            <tbody class="bg-white divide-y divide-gray-200">
                @forelse($stories as $story)
                <tr>
                    <td class="px-6 py-4 whitespace-nowrap">
                        <div class="font-medium text-gray-900">{{ $story->title }}</div>
                        <div class="text-sm text-gray-500">/{{ $story->slug }}</div>
                    </td>
                    <td class="px-6 py-4 whitespace-nowrap">{{ $story->student_name }}</td>
                    <td class="px-6 py-4 whitespace-nowrap">{{ $story->destination }}</td>
                    <td class="px-6 py-4 whitespace-nowrap">{{ optional($story->published_at)->format('Y-m-d') }}</td>
                    <td class="px-6 py-4 whitespace-nowrap text-right text-sm font-medium">
                        <a href="{{ route('admin.success-stories.edit', $story) }}" class="text-primary hover:underline mr-3">Edit</a>
                        <form action="{{ route('admin.success-stories.destroy', $story) }}" method="POST" class="inline" onsubmit="return confirm('Delete this story?')">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="text-red-600 hover:underline">Delete</button>
                        </form>
                    </td>
                </tr>
                @empty
                <tr>
                    <td colspan="5" class="px-6 py-6 text-center text-gray-500">No stories found.</td>
                </tr>
                @endforelse
            </tbody>
        </table>
    </div>

    <div class="mt-6">{{ $stories->links() }}</div>
</div>
@endsection


