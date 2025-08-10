@extends('layouts.admin')

@section('content')
<div class="space-y-6">
    <!-- Page Header -->
    <div class="flex items-center justify-between">
        <div>
            <h1 class="text-2xl font-bold text-gray-900">{{ $destination->name }}</h1>
            <p class="text-gray-600">Destination Details</p>
        </div>
        <div class="flex space-x-3">
            <a href="{{ route('admin.destinations.edit', $destination) }}" 
               class="bg-blue-600 text-white px-4 py-2 rounded-lg hover:bg-blue-700 transition-colors duration-200">
                <i class="fas fa-edit mr-2"></i>Edit Destination
            </a>
            <a href="{{ route('admin.destinations.index') }}" 
               class="bg-gray-600 text-white px-4 py-2 rounded-lg hover:bg-gray-700 transition-colors duration-200">
                <i class="fas fa-arrow-left mr-2"></i>Back to Destinations
            </a>
        </div>
    </div>

    <!-- Status Badges -->
    <div class="flex space-x-4">
        <span class="inline-flex px-3 py-1 text-sm font-semibold rounded-full {{ $destination->is_active ? 'bg-green-100 text-green-800' : 'bg-yellow-100 text-yellow-800' }}">
            {{ $destination->is_active ? 'Active' : 'Draft' }}
        </span>
        @if($destination->is_featured)
            <span class="inline-flex px-3 py-1 text-sm font-semibold rounded-full bg-purple-100 text-purple-800">
                <i class="fas fa-star mr-1"></i>Featured
            </span>
        @endif
        <span class="inline-flex px-3 py-1 text-sm font-semibold rounded-full bg-blue-100 text-blue-800">
            {{ $destination->region }}
        </span>
    </div>

    <div class="grid grid-cols-1 lg:grid-cols-3 gap-6">
        <!-- Main Content -->
        <div class="lg:col-span-2 space-y-6">
            <!-- Featured Image -->
            @if($destination->featured_image)
            <div class="bg-white rounded-lg shadow-sm border border-gray-200 overflow-hidden">
                <img src="{{ $destination->featured_image_url }}" alt="{{ $destination->name }}" class="w-full h-64 object-cover">
            </div>
            @endif

            <!-- Basic Information -->
            <div class="bg-white rounded-lg shadow-sm border border-gray-200 p-6">
                <h2 class="text-xl font-semibold text-gray-900 mb-4">Basic Information</h2>
                <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                    <div>
                        <label class="block text-sm font-medium text-gray-600">Name</label>
                        <p class="text-gray-900">{{ $destination->name }}</p>
                    </div>
                    <div>
                        <label class="block text-sm font-medium text-gray-600">Region</label>
                        <p class="text-gray-900">{{ $destination->region }}</p>
                    </div>
                    <div>
                        <label class="block text-sm font-medium text-gray-600">Capital</label>
                        <p class="text-gray-900">{{ $destination->capital ?: 'N/A' }}</p>
                    </div>
                    <div>
                        <label class="block text-sm font-medium text-gray-600">Currency</label>
                        <p class="text-gray-900">{{ $destination->currency ?: 'N/A' }}</p>
                    </div>
                    <div>
                        <label class="block text-sm font-medium text-gray-600">Language</label>
                        <p class="text-gray-900">{{ $destination->language ?: 'N/A' }}</p>
                    </div>
                    <div>
                        <label class="block text-sm font-medium text-gray-600">Display Order</label>
                        <p class="text-gray-900">{{ $destination->order }}</p>
                    </div>
                </div>
            </div>

            <!-- Financial Information -->
            <div class="bg-white rounded-lg shadow-sm border border-gray-200 p-6">
                <h2 class="text-xl font-semibold text-gray-900 mb-4">Financial Information</h2>
                <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                    <div>
                        <label class="block text-sm font-medium text-gray-600">Average Tuition Fee</label>
                        <p class="text-gray-900">{{ $destination->formatted_tuition_fee }}</p>
                    </div>
                    <div>
                        <label class="block text-sm font-medium text-gray-600">Average Living Cost</label>
                        <p class="text-gray-900">{{ $destination->formatted_living_cost }}</p>
                    </div>
                    <div>
                        <label class="block text-sm font-medium text-gray-600">Universities Count</label>
                        <p class="text-gray-900">{{ $destination->universities_count }}</p>
                    </div>
                    <div>
                        <label class="block text-sm font-medium text-gray-600">Programs Count</label>
                        <p class="text-gray-900">{{ $destination->programs_count }}</p>
                    </div>
                </div>
            </div>

            <!-- Content -->
            <div class="bg-white rounded-lg shadow-sm border border-gray-200 p-6">
                <h2 class="text-xl font-semibold text-gray-900 mb-4">Content</h2>
                <div class="prose max-w-none">
                    {!! $destination->content !!}
                </div>
            </div>

            <!-- Arrays Information -->
            @if($destination->highlights || $destination->requirements || $destination->benefits)
            <div class="bg-white rounded-lg shadow-sm border border-gray-200 p-6">
                <h2 class="text-xl font-semibold text-gray-900 mb-4">Additional Information</h2>
                <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
                    @if($destination->highlights && count($destination->highlights) > 0)
                    <div>
                        <h3 class="text-lg font-medium text-gray-900 mb-3">Highlights</h3>
                        <ul class="space-y-2">
                            @foreach($destination->highlights as $highlight)
                                <li class="flex items-start">
                                    <i class="fas fa-check text-green-500 mr-2 mt-1"></i>
                                    <span class="text-gray-700">{{ $highlight }}</span>
                                </li>
                            @endforeach
                        </ul>
                    </div>
                    @endif

                    @if($destination->requirements && count($destination->requirements) > 0)
                    <div>
                        <h3 class="text-lg font-medium text-gray-900 mb-3">Requirements</h3>
                        <ul class="space-y-2">
                            @foreach($destination->requirements as $requirement)
                                <li class="flex items-start">
                                    <i class="fas fa-list text-blue-500 mr-2 mt-1"></i>
                                    <span class="text-gray-700">{{ $requirement }}</span>
                                </li>
                            @endforeach
                        </ul>
                    </div>
                    @endif

                    @if($destination->benefits && count($destination->benefits) > 0)
                    <div>
                        <h3 class="text-lg font-medium text-gray-900 mb-3">Benefits</h3>
                        <ul class="space-y-2">
                            @foreach($destination->benefits as $benefit)
                                <li class="flex items-start">
                                    <i class="fas fa-star text-yellow-500 mr-2 mt-1"></i>
                                    <span class="text-gray-700">{{ $benefit }}</span>
                                </li>
                            @endforeach
                        </ul>
                    </div>
                    @endif
                </div>
            </div>
            @endif
        </div>

        <!-- Sidebar -->
        <div class="space-y-6">
            <!-- Flag Image -->
            @if($destination->flag_image)
            <div class="bg-white rounded-lg shadow-sm border border-gray-200 p-6">
                <h3 class="text-lg font-medium text-gray-900 mb-4">Flag</h3>
                <img src="{{ $destination->flag_image_url }}" alt="{{ $destination->name }} flag" class="w-full rounded">
            </div>
            @endif

            <!-- SEO Information -->
            <div class="bg-white rounded-lg shadow-sm border border-gray-200 p-6">
                <h3 class="text-lg font-medium text-gray-900 mb-4">SEO Information</h3>
                <div class="space-y-4">
                    <div>
                        <label class="block text-sm font-medium text-gray-600">Meta Title</label>
                        <p class="text-gray-900 text-sm">{{ $destination->meta_title ?: 'Not set' }}</p>
                    </div>
                    <div>
                        <label class="block text-sm font-medium text-gray-600">Meta Description</label>
                        <p class="text-gray-900 text-sm">{{ $destination->meta_description ?: 'Not set' }}</p>
                    </div>
                    <div>
                        <label class="block text-sm font-medium text-gray-600">Slug</label>
                        <p class="text-gray-900 text-sm">{{ $destination->slug }}</p>
                    </div>
                </div>
            </div>

            <!-- Timestamps -->
            <div class="bg-white rounded-lg shadow-sm border border-gray-200 p-6">
                <h3 class="text-lg font-medium text-gray-900 mb-4">Timestamps</h3>
                <div class="space-y-2">
                    <div>
                        <label class="block text-sm font-medium text-gray-600">Created</label>
                        <p class="text-gray-900 text-sm">{{ $destination->created_at->format('M d, Y H:i') }}</p>
                    </div>
                    <div>
                        <label class="block text-sm font-medium text-gray-600">Last Updated</label>
                        <p class="text-gray-900 text-sm">{{ $destination->updated_at->format('M d, Y H:i') }}</p>
                    </div>
                </div>
            </div>

            <!-- Actions -->
            <div class="bg-white rounded-lg shadow-sm border border-gray-200 p-6">
                <h3 class="text-lg font-medium text-gray-900 mb-4">Actions</h3>
                <div class="space-y-3">
                    <a href="{{ route('destination.show', $destination) }}" target="_blank"
                       class="w-full bg-green-600 text-white px-4 py-2 rounded-lg hover:bg-green-700 transition-colors duration-200 text-center block">
                        <i class="fas fa-external-link-alt mr-2"></i>View on Frontend
                    </a>
                    <a href="{{ route('admin.destinations.edit', $destination) }}"
                       class="w-full bg-blue-600 text-white px-4 py-2 rounded-lg hover:bg-blue-700 transition-colors duration-200 text-center block">
                        <i class="fas fa-edit mr-2"></i>Edit Destination
                    </a>
                    <form action="{{ route('admin.destinations.destroy', $destination) }}" method="POST" class="w-full">
                        @csrf
                        @method('DELETE')
                        <button type="submit" onclick="return confirm('Are you sure you want to delete this destination?')"
                                class="w-full bg-red-600 text-white px-4 py-2 rounded-lg hover:bg-red-700 transition-colors duration-200">
                            <i class="fas fa-trash mr-2"></i>Delete Destination
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
