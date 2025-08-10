@extends('layouts.admin')

@section('content')
<div class="space-y-6">
    <!-- Page Header -->
    <div class="flex items-center justify-between">
        <div>
            <h1 class="text-2xl font-bold text-gray-900">Slider Details</h1>
            <p class="text-gray-600">View slider information and content.</p>
        </div>
        <div class="flex space-x-3">
            <a href="{{ route('admin.sliders.edit', $slider->id) }}" 
               class="bg-blue-600 text-white px-4 py-2 rounded-lg hover:bg-blue-700 transition-colors duration-200">
                <i class="fas fa-edit mr-2"></i>Edit Slider
            </a>
            <a href="{{ route('admin.sliders.index') }}" 
               class="bg-gray-600 text-white px-4 py-2 rounded-lg hover:bg-gray-700 transition-colors duration-200">
                <i class="fas fa-arrow-left mr-2"></i>Back to Sliders
            </a>
        </div>
    </div>

    <!-- Slider Details -->
    <div class="grid grid-cols-1 lg:grid-cols-2 gap-6">
        <!-- Left Column - Image -->
        <div class="bg-white rounded-lg shadow-sm border border-gray-200 p-6">
            <h2 class="text-lg font-semibold text-gray-900 mb-4">Slider Image</h2>
            @if($slider->image)
                <div class="relative">
                    <img src="{{ $slider->image_url }}" alt="{{ $slider->title }}" 
                         class="w-full h-64 object-cover rounded-lg">
                    <div class="absolute top-4 right-4">
                        @if($slider->is_active)
                            <span class="bg-green-100 text-green-800 text-xs font-medium px-2.5 py-0.5 rounded">
                                Active
                            </span>
                        @else
                            <span class="bg-red-100 text-red-800 text-xs font-medium px-2.5 py-0.5 rounded">
                                Inactive
                            </span>
                        @endif
                    </div>
                </div>
                <div class="mt-4 text-sm text-gray-600">
                    <p><strong>Image Path:</strong> {{ $slider->image }}</p>
                </div>
            @else
                <div class="w-full h-64 bg-gray-200 rounded-lg flex items-center justify-center">
                    <div class="text-center">
                        <i class="fas fa-image text-4xl text-gray-400 mb-2"></i>
                        <p class="text-gray-500">No image uploaded</p>
                    </div>
                </div>
            @endif
        </div>

        <!-- Right Column - Details -->
        <div class="space-y-6">
            <!-- Basic Information -->
            <div class="bg-white rounded-lg shadow-sm border border-gray-200 p-6">
                <h2 class="text-lg font-semibold text-gray-900 mb-4">Basic Information</h2>
                <div class="space-y-4">
                    <div>
                        <label class="block text-sm font-medium text-gray-700">Title</label>
                        <p class="mt-1 text-sm text-gray-900">{{ $slider->title ?: 'No title set' }}</p>
                    </div>
                    
                    <div>
                        <label class="block text-sm font-medium text-gray-700">Subtitle</label>
                        <p class="mt-1 text-sm text-gray-900">{{ $slider->subtitle ?: 'No subtitle set' }}</p>
                    </div>
                    
                    <div>
                        <label class="block text-sm font-medium text-gray-700">Description</label>
                        <p class="mt-1 text-sm text-gray-900">{{ $slider->description ?: 'No description set' }}</p>
                    </div>
                    
                    <div>
                        <label class="block text-sm font-medium text-gray-700">Display Order</label>
                        <p class="mt-1 text-sm text-gray-900">{{ $slider->order }}</p>
                    </div>
                    
                    <div>
                        <label class="block text-sm font-medium text-gray-700">Status</label>
                        <p class="mt-1">
                            @if($slider->is_active)
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

            <!-- Button Information -->
            <div class="bg-white rounded-lg shadow-sm border border-gray-200 p-6">
                <h2 class="text-lg font-semibold text-gray-900 mb-4">Button Information</h2>
                <div class="space-y-4">
                    <div>
                        <label class="block text-sm font-medium text-gray-700">Button Text</label>
                        <p class="mt-1 text-sm text-gray-900">{{ $slider->button_text ?: 'No button text set' }}</p>
                    </div>
                    
                    <div>
                        <label class="block text-sm font-medium text-gray-700">Button URL</label>
                        @if($slider->button_url)
                            <p class="mt-1 text-sm text-gray-900">
                                <a href="{{ $slider->button_url }}" target="_blank" class="text-blue-600 hover:text-blue-800">
                                    {{ $slider->button_url }}
                                </a>
                            </p>
                        @else
                            <p class="mt-1 text-sm text-gray-900">No button URL set</p>
                        @endif
                    </div>
                    
                    @if($slider->button_text && $slider->button_url)
                        <div>
                            <label class="block text-sm font-medium text-gray-700">Button Preview</label>
                            <div class="mt-2">
                                <a href="{{ $slider->button_url }}" target="_blank" 
                                   class="inline-flex items-center px-4 py-2 border border-transparent text-sm font-medium rounded-md text-white bg-blue-600 hover:bg-blue-700">
                                    {{ $slider->button_text }}
                                </a>
                            </div>
                        </div>
                    @endif
                </div>
            </div>

            <!-- Metadata -->
            <div class="bg-white rounded-lg shadow-sm border border-gray-200 p-6">
                <h2 class="text-lg font-semibold text-gray-900 mb-4">Metadata</h2>
                <div class="space-y-4">
                    <div>
                        <label class="block text-sm font-medium text-gray-700">Created At</label>
                        <p class="mt-1 text-sm text-gray-900">{{ $slider->created_at->format('F j, Y \a\t g:i A') }}</p>
                    </div>
                    
                    <div>
                        <label class="block text-sm font-medium text-gray-700">Last Updated</label>
                        <p class="mt-1 text-sm text-gray-900">{{ $slider->updated_at->format('F j, Y \a\t g:i A') }}</p>
                    </div>
                    
                    <div>
                        <label class="block text-sm font-medium text-gray-700">Slider ID</label>
                        <p class="mt-1 text-sm text-gray-900">{{ $slider->id }}</p>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Actions -->
    <div class="bg-white rounded-lg shadow-sm border border-gray-200 p-6">
        <h2 class="text-lg font-semibold text-gray-900 mb-4">Actions</h2>
        <div class="flex space-x-3">
            <a href="{{ route('admin.sliders.edit', $slider->id) }}" 
               class="bg-blue-600 text-white px-4 py-2 rounded-lg hover:bg-blue-700 transition-colors duration-200">
                <i class="fas fa-edit mr-2"></i>Edit Slider
            </a>
            
            <form action="{{ route('admin.sliders.destroy', $slider->id) }}" 
                  method="POST" class="inline" 
                  onsubmit="return confirm('Are you sure you want to delete this slider? This action cannot be undone.')">
                @csrf
                @method('DELETE')
                <button type="submit" class="bg-red-600 text-white px-4 py-2 rounded-lg hover:bg-red-700 transition-colors duration-200">
                    <i class="fas fa-trash mr-2"></i>Delete Slider
                </button>
            </form>
            
            <a href="{{ route('admin.sliders.index') }}" 
               class="bg-gray-300 text-gray-700 px-4 py-2 rounded-lg hover:bg-gray-400 transition-colors duration-200">
                <i class="fas fa-list mr-2"></i>View All Sliders
            </a>
        </div>
    </div>
</div>
@endsection
