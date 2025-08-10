@extends('layouts.admin')

@section('content')
<div class="space-y-6">
    <!-- Page Header -->
    <div class="flex items-center justify-between">
        <div>
            <h1 class="text-2xl font-bold text-gray-900">Feature Details</h1>
            <p class="text-gray-600">View feature information and content.</p>
        </div>
        <div class="flex space-x-3">
            <a href="{{ route('admin.features.edit', $feature->id) }}" 
               class="bg-blue-600 text-white px-4 py-2 rounded-lg hover:bg-blue-700 transition-colors duration-200">
                <i class="fas fa-edit mr-2"></i>Edit Feature
            </a>
            <a href="{{ route('admin.features.index') }}" 
               class="bg-gray-600 text-white px-4 py-2 rounded-lg hover:bg-gray-700 transition-colors duration-200">
                <i class="fas fa-arrow-left mr-2"></i>Back to Features
            </a>
        </div>
    </div>

    <!-- Feature Details -->
    <div class="grid grid-cols-1 lg:grid-cols-2 gap-6">
        <!-- Left Column - Icon Preview -->
        <div class="bg-white rounded-lg shadow-sm border border-gray-200 p-6">
            <h2 class="text-lg font-semibold text-gray-900 mb-4">Feature Preview</h2>
            <div class="text-center p-6 bg-white rounded-lg shadow-lg border border-gray-200">
                <div class="w-16 h-16 bg-purple-100 rounded-full flex items-center justify-center mx-auto mb-4">
                    <i class="{{ $feature->icon }} text-purple-600 text-2xl"></i>
                </div>
                <h3 class="text-xl font-semibold mb-3">{{ $feature->title }}</h3>
                <p class="text-gray-600">{{ $feature->description }}</p>
                <div class="mt-4">
                    @if($feature->is_active)
                        <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium bg-green-100 text-green-800">
                            Active
                        </span>
                    @else
                        <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium bg-red-100 text-red-800">
                            Inactive
                        </span>
                    @endif
                </div>
            </div>
        </div>

        <!-- Right Column - Details -->
        <div class="space-y-6">
            <!-- Basic Information -->
            <div class="bg-white rounded-lg shadow-sm border border-gray-200 p-6">
                <h2 class="text-lg font-semibold text-gray-900 mb-4">Basic Information</h2>
                <div class="space-y-4">
                    <div>
                        <label class="block text-sm font-medium text-gray-700">Title</label>
                        <p class="mt-1 text-sm text-gray-900">{{ $feature->title }}</p>
                    </div>
                    
                    <div>
                        <label class="block text-sm font-medium text-gray-700">Description</label>
                        <p class="mt-1 text-sm text-gray-900">{{ $feature->description }}</p>
                    </div>
                    
                    <div>
                        <label class="block text-sm font-medium text-gray-700">Icon Class</label>
                        <p class="mt-1 text-sm text-gray-900">
                            <code class="bg-gray-100 px-2 py-1 rounded">{{ $feature->icon }}</code>
                        </p>
                    </div>
                    
                    <div>
                        <label class="block text-sm font-medium text-gray-700">Display Order</label>
                        <p class="mt-1 text-sm text-gray-900">{{ $feature->order }}</p>
                    </div>
                    
                    <div>
                        <label class="block text-sm font-medium text-gray-700">Status</label>
                        <p class="mt-1">
                            @if($feature->is_active)
                                <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium bg-green-100 text-green-800">
                                    Active
                                </span>
                            @else
                                <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium bg-red-100 text-red-800">
                                    Inactive
                                </span>
                            @endif
                        </p>
                    </div>
                </div>
            </div>

            <!-- Metadata -->
            <div class="bg-white rounded-lg shadow-sm border border-gray-200 p-6">
                <h2 class="text-lg font-semibold text-gray-900 mb-4">Metadata</h2>
                <div class="space-y-4">
                    <div>
                        <label class="block text-sm font-medium text-gray-700">Created At</label>
                        <p class="mt-1 text-sm text-gray-900">{{ $feature->created_at->format('F j, Y \a\t g:i A') }}</p>
                    </div>
                    
                    <div>
                        <label class="block text-sm font-medium text-gray-700">Last Updated</label>
                        <p class="mt-1 text-sm text-gray-900">{{ $feature->updated_at->format('F j, Y \a\t g:i A') }}</p>
                    </div>
                    
                    <div>
                        <label class="block text-sm font-medium text-gray-700">Feature ID</label>
                        <p class="mt-1 text-sm text-gray-900">{{ $feature->id }}</p>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Actions -->
    <div class="bg-white rounded-lg shadow-sm border border-gray-200 p-6">
        <h2 class="text-lg font-semibold text-gray-900 mb-4">Actions</h2>
        <div class="flex space-x-3">
            <a href="{{ route('admin.features.edit', $feature->id) }}" 
               class="bg-blue-600 text-white px-4 py-2 rounded-lg hover:bg-blue-700 transition-colors duration-200">
                <i class="fas fa-edit mr-2"></i>Edit Feature
            </a>
            
            <form action="{{ route('admin.features.destroy', $feature->id) }}" 
                  method="POST" class="inline" 
                  onsubmit="return confirm('Are you sure you want to delete this feature? This action cannot be undone.')">
                @csrf
                @method('DELETE')
                <button type="submit" class="bg-red-600 text-white px-4 py-2 rounded-lg hover:bg-red-700 transition-colors duration-200">
                    <i class="fas fa-trash mr-2"></i>Delete Feature
                </button>
            </form>
            
            <a href="{{ route('admin.features.index') }}" 
               class="bg-gray-300 text-gray-700 px-4 py-2 rounded-lg hover:bg-gray-400 transition-colors duration-200">
                <i class="fas fa-list mr-2"></i>View All Features
            </a>
        </div>
    </div>
</div>
@endsection
