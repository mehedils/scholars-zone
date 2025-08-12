@extends('layouts.admin')

@section('content')
<div class="space-y-6">
    <!-- Page Header -->
    <div class="flex items-center justify-between">
        <div>
            <h1 class="text-2xl font-bold text-gray-900">Student Essential Details</h1>
            <p class="text-gray-600">View the complete information for this student essential service.</p>
        </div>
        <div class="flex space-x-3">
            <a href="{{ route('admin.student-essentials.edit', $studentEssential->id) }}" 
               class="bg-blue-600 text-white px-4 py-2 rounded-lg hover:bg-blue-700 transition-colors duration-200">
                <i class="fas fa-edit mr-2"></i>Edit
            </a>
            <a href="{{ route('admin.student-essentials.index') }}" 
               class="bg-gray-600 text-white px-4 py-2 rounded-lg hover:bg-gray-700 transition-colors duration-200">
                <i class="fas fa-arrow-left mr-2"></i>Back to List
            </a>
        </div>
    </div>

    <!-- Student Essential Details -->
    <div class="bg-white rounded-lg shadow-sm border border-gray-200 p-6">
        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
            <!-- Icon Preview -->
            <div class="md:col-span-2">
                <h3 class="text-lg font-medium text-gray-900 mb-4">Icon Preview</h3>
                <div class="w-20 h-20 bg-purple-100 rounded-full flex items-center justify-center">
                    <i class="{{ $studentEssential->icon }} text-purple-600 text-3xl"></i>
                </div>
            </div>

            <!-- Title -->
            <div class="md:col-span-2">
                <h3 class="text-lg font-medium text-gray-900 mb-2">Title</h3>
                <p class="text-gray-700 text-lg">{{ $studentEssential->title }}</p>
            </div>

            <!-- Description -->
            <div class="md:col-span-2">
                <h3 class="text-lg font-medium text-gray-900 mb-2">Description</h3>
                <p class="text-gray-700">{{ $studentEssential->description }}</p>
            </div>

            <!-- Icon Class -->
            <div>
                <h3 class="text-lg font-medium text-gray-900 mb-2">Icon Class</h3>
                <p class="text-gray-700 font-mono bg-gray-100 px-2 py-1 rounded">{{ $studentEssential->icon }}</p>
            </div>

            <!-- Order -->
            <div>
                <h3 class="text-lg font-medium text-gray-900 mb-2">Display Order</h3>
                <p class="text-gray-700">{{ $studentEssential->order }}</p>
            </div>

            <!-- Status -->
            <div>
                <h3 class="text-lg font-medium text-gray-900 mb-2">Status</h3>
                @if($studentEssential->is_active)
                    <span class="bg-green-100 text-green-800 px-3 py-1 rounded-full text-sm font-medium">Active</span>
                @else
                    <span class="bg-red-100 text-red-800 px-3 py-1 rounded-full text-sm font-medium">Inactive</span>
                @endif
            </div>

            <!-- Learn More -->
            <div>
                <h3 class="text-lg font-medium text-gray-900 mb-2">Learn More Link</h3>
                @if($studentEssential->show_learn_more)
                    <span class="bg-green-100 text-green-800 px-3 py-1 rounded-full text-sm font-medium">Enabled</span>
                    @if($studentEssential->learn_more_url)
                        <div class="mt-2">
                            <p class="text-sm text-gray-600">URL:</p>
                            <a href="{{ $studentEssential->learn_more_url }}" 
                               target="_blank"
                               class="text-blue-600 hover:text-blue-800 text-sm break-all">
                                {{ $studentEssential->learn_more_url }}
                            </a>
                        </div>
                    @else
                        <p class="text-sm text-gray-500 mt-1">No URL provided</p>
                    @endif
                @else
                    <span class="bg-gray-100 text-gray-800 px-3 py-1 rounded-full text-sm font-medium">Disabled</span>
                @endif
            </div>

            <!-- Created/Updated -->
            <div class="md:col-span-2">
                <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                    <div>
                        <h3 class="text-lg font-medium text-gray-900 mb-2">Created</h3>
                        <p class="text-gray-700">{{ $studentEssential->created_at->format('F j, Y \a\t g:i A') }}</p>
                    </div>
                    <div>
                        <h3 class="text-lg font-medium text-gray-900 mb-2">Last Updated</h3>
                        <p class="text-gray-700">{{ $studentEssential->updated_at->format('F j, Y \a\t g:i A') }}</p>
                    </div>
                </div>
            </div>
        </div>

        <!-- Actions -->
        <div class="border-t border-gray-200 pt-6 mt-6">
            <div class="flex justify-between items-center">
                <form action="{{ route('admin.student-essentials.destroy', $studentEssential->id) }}" 
                      method="POST" 
                      onsubmit="return confirm('Are you sure you want to delete this student essential? This action cannot be undone.')">
                    @csrf
                    @method('DELETE')
                    <button type="submit" 
                            class="bg-red-600 text-white px-4 py-2 rounded-lg hover:bg-red-700 transition-colors duration-200">
                        <i class="fas fa-trash mr-2"></i>Delete Student Essential
                    </button>
                </form>
                
                <div class="flex space-x-3">
                    <a href="{{ route('admin.student-essentials.edit', $studentEssential->id) }}" 
                       class="bg-blue-600 text-white px-4 py-2 rounded-lg hover:bg-blue-700 transition-colors duration-200">
                        <i class="fas fa-edit mr-2"></i>Edit
                    </a>
                    <a href="{{ route('admin.student-essentials.index') }}" 
                       class="bg-gray-600 text-white px-4 py-2 rounded-lg hover:bg-gray-700 transition-colors duration-200">
                        <i class="fas fa-list mr-2"></i>Back to List
                    </a>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
