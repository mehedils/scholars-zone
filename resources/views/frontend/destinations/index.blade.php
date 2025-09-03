@extends('layouts.app')

@section('content')
<!-- Hero Section -->
<section class="bg-gradient-to-r from-blue-600 to-primary text-white py-16">
    <div class="container mx-auto px-4">
        <div class="text-center">
            <h1 class="text-4xl md:text-5xl font-bold mb-4">Study Destinations</h1>
            <p class="text-xl mb-8">Explore the best study destinations around the world</p>
            
            <!-- Search and Filter Form -->
            <form action="{{ route('destinations.index') }}" method="GET" class="max-w-4xl mx-auto">
                <div class="flex flex-col md:flex-row gap-4">
                    <div class="flex-1">
                        <input type="text" name="search" value="{{ request('search') }}" 
                               placeholder="Search destinations..." 
                               class="w-full px-4 py-3 rounded-lg text-gray-900 focus:ring-2 focus:ring-white">
                    </div>
                    <div class="md:w-48">
                        <select name="region" class="w-full px-4 py-3 rounded-lg text-gray-900 focus:ring-2 focus:ring-white">
                            <option value="">All Regions</option>
                            @foreach($regions as $region)
                                <option value="{{ $region }}" {{ request('region') == $region ? 'selected' : '' }}>
                                    {{ $region }}
                                </option>
                            @endforeach
                        </select>
                    </div>
                    <button type="submit" class="bg-white text-blue-600 px-6 py-3 rounded-lg font-semibold hover:bg-gray-100 transition-colors duration-200">
                        <i class="fas fa-search mr-2"></i>Search
                    </button>
                </div>
            </form>
        </div>
    </div>
</section>

<!-- Featured Destinations -->
@if($featuredDestinations->count() > 0)
<section class="py-16 bg-gray-50">
    <div class="container mx-auto px-4">
        <div class="text-center mb-12">
            <h2 class="text-3xl font-bold text-gray-900 mb-4">Featured Destinations</h2>
            <p class="text-gray-600">Discover our top recommended study destinations</p>
        </div>
        
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
            @foreach($featuredDestinations as $destination)
            <div class="bg-white rounded-lg shadow-lg overflow-hidden hover:shadow-xl transition-shadow duration-300">
                <div class="h-48 bg-gradient-to-br from-blue-400 to-blue-600 relative">
                    @if($destination->featured_image)
                        <img src="{{ $destination->featured_image_url }}" alt="{{ $destination->name }}" class="w-full h-full object-cover">
                    @else
                        <div class="flex items-center justify-center h-full">
                            <i class="fas fa-flag text-white text-4xl"></i>
                        </div>
                    @endif
                    <div class="absolute top-4 right-4">
                        <span class="bg-yellow-400 text-yellow-900 px-3 py-1 rounded-full text-sm font-semibold">
                            <i class="fas fa-star mr-1"></i>Featured
                        </span>
                    </div>
                </div>
                <div class="p-6">
                    <div class="flex items-center justify-between mb-3">
                        <h3 class="text-xl font-bold text-gray-900">{{ $destination->name }}</h3>
                        @if($destination->flag_image)
                            <img src="{{ $destination->flag_image_url }}" alt="{{ $destination->name }} flag" class="w-8 h-6 object-cover rounded">
                        @endif
                    </div>
                    <p class="text-gray-600 mb-4">{{ Str::limit($destination->short_description, 120) }}</p>
                    
                    <div class="grid grid-cols-2 gap-4 mb-4 text-sm">
                        <div>
                            <span class="text-gray-500">Tuition:</span>
                            <span class="font-semibold">{{ $destination->formatted_tuition_fee }}</span>
                        </div>
                        <div>
                            <span class="text-gray-500">Living Cost:</span>
                            <span class="font-semibold">{{ $destination->formatted_living_cost }}</span>
                        </div>
                    </div>
                    
                    <div class="flex items-center justify-between">
                        <span class="text-sm text-gray-500">{{ $destination->region }}</span>
                        <a href="{{ route('destination.show', $destination) }}" 
                           class="bg-primary text-white px-4 py-2 rounded-lg hover:bg-primary-dark transition-colors duration-200">
                            Learn More
                        </a>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
    </div>
</section>
@endif

<!-- All Destinations -->
<section class="py-16">
    <div class="container mx-auto px-4">
        <div class="flex items-center justify-between mb-8">
            <div>
                <h2 class="text-3xl font-bold text-gray-900">All Destinations</h2>
                <p class="text-gray-600">Browse all available study destinations</p>
            </div>
            <div class="text-sm text-gray-500">
                Showing {{ $destinations->firstItem() ?? 0 }} - {{ $destinations->lastItem() ?? 0 }} of {{ $destinations->total() }} destinations
            </div>
        </div>
        
        @if($destinations->count() > 0)
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
            @foreach($destinations as $destination)
            <div class="bg-white rounded-lg shadow-lg overflow-hidden hover:shadow-xl transition-shadow duration-300">
                <div class="h-48 bg-gradient-to-br from-blue-400 to-blue-600 relative">
                    @if($destination->featured_image)
                        <img src="{{ $destination->featured_image_url }}" alt="{{ $destination->name }}" class="w-full h-full object-cover">
                    @else
                        <div class="flex items-center justify-center h-full">
                            <i class="fas fa-flag text-white text-4xl"></i>
                        </div>
                    @endif
                    @if($destination->is_featured)
                        <div class="absolute top-4 right-4">
                            <span class="bg-yellow-400 text-yellow-900 px-3 py-1 rounded-full text-sm font-semibold">
                                <i class="fas fa-star mr-1"></i>Featured
                            </span>
                        </div>
                    @endif
                </div>
                <div class="p-6">
                    <div class="flex items-center justify-between mb-3">
                        <h3 class="text-xl font-bold text-gray-900">{{ $destination->name }}</h3>
                        @if($destination->flag_image)
                            <img src="{{ $destination->flag_image_url }}" alt="{{ $destination->name }} flag" class="w-8 h-6 object-cover rounded">
                        @endif
                    </div>
                    <p class="text-gray-600 mb-4">{{ Str::limit($destination->short_description, 120) }}</p>
                    
                    <div class="grid grid-cols-2 gap-4 mb-4 text-sm">
                        <div>
                            <span class="text-gray-500">Tuition:</span>
                            <span class="font-semibold">{{ $destination->formatted_tuition_fee }}</span>
                        </div>
                        <div>
                            <span class="text-gray-500">Living Cost:</span>
                            <span class="font-semibold">{{ $destination->formatted_living_cost }}</span>
                        </div>
                    </div>
                    
                    <div class="flex items-center justify-between">
                        <span class="text-sm text-gray-500">{{ $destination->region }}</span>
                        <a href="{{ route('destination.show', $destination) }}" 
                           class="bg-primary text-white px-4 py-2 rounded-lg hover:bg-primary-dark transition-colors duration-200">
                            Learn More
                        </a>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
        
        <!-- Pagination -->
        @if($destinations->hasPages())
        <div class="mt-12">
            {{ $destinations->appends(request()->query())->links() }}
        </div>
        @endif
        @else
        <div class="text-center py-12">
            <i class="fas fa-search text-gray-400 text-6xl mb-4"></i>
            <h3 class="text-xl font-medium text-gray-900 mb-2">No destinations found</h3>
            <p class="text-gray-600 mb-6">Try adjusting your search criteria or browse all destinations.</p>
            <a href="{{ route('destinations.index') }}" class="bg-primary text-white px-6 py-3 rounded-lg hover:bg-primary-dark transition-colors duration-200">
                View All Destinations
            </a>
        </div>
        @endif
    </div>
</section>

<!-- Call to Action -->
<section class="bg-gray-900 text-white py-16">
    <div class="container mx-auto px-4 text-center">
        <h2 class="text-3xl font-bold mb-4">Ready to Start Your Study Abroad Journey?</h2>
        <p class="text-xl mb-8">Get expert guidance and support for your international education</p>
        <div class="flex flex-col sm:flex-row gap-4 justify-center">
            <a href="#" class="bg-primary text-white px-6 py-3 rounded-lg hover:bg-primary-dark transition-colors duration-200">
                <i class="fas fa-phone mr-2"></i>Contact Us
            </a>
            <a href="#" class="bg-transparent border-2 border-white text-white px-6 py-3 rounded-lg hover:bg-white hover:text-gray-900 transition-colors duration-200">
                <i class="fas fa-calendar mr-2"></i>Book Consultation
            </a>
        </div>
    </div>
</section>
@endsection
