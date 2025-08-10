@extends('layouts.app')

@section('content')
<!-- Hero Section -->
<section class="relative h-96 bg-gradient-to-r from-blue-600 to-purple-600">
    @if($destination->featured_image)
        <div class="absolute inset-0">
            <img src="{{ $destination->featured_image_url }}" alt="{{ $destination->name }}" class="w-full h-full object-cover opacity-20">
        </div>
    @endif
    <div class="relative z-10 flex items-center h-full">
        <div class="container mx-auto px-4">
            <div class="flex items-center space-x-6">
                @if($destination->flag_image)
                    <img src="{{ $destination->flag_image_url }}" alt="{{ $destination->name }} flag" class="w-24 h-16 object-cover rounded shadow-lg">
                @endif
                <div class="text-white">
                    <h1 class="text-4xl md:text-5xl font-bold mb-2">{{ $destination->name }}</h1>
                    <p class="text-xl mb-4">{{ $destination->region }}</p>
                    <p class="text-lg opacity-90">{{ $destination->short_description }}</p>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Quick Stats -->
<section class="py-8 bg-white border-b">
    <div class="container mx-auto px-4">
        <div class="grid grid-cols-2 md:grid-cols-4 gap-6">
            <div class="text-center">
                <div class="text-2xl font-bold text-blue-600">{{ $destination->universities_count }}</div>
                <div class="text-sm text-gray-600">Universities</div>
            </div>
            <div class="text-center">
                <div class="text-2xl font-bold text-blue-600">{{ $destination->programs_count }}</div>
                <div class="text-sm text-gray-600">Programs</div>
            </div>
            <div class="text-center">
                <div class="text-2xl font-bold text-blue-600">{{ $destination->formatted_tuition_fee }}</div>
                <div class="text-sm text-gray-600">Avg. Tuition</div>
            </div>
            <div class="text-center">
                <div class="text-2xl font-bold text-blue-600">{{ $destination->formatted_living_cost }}</div>
                <div class="text-sm text-gray-600">Living Cost</div>
            </div>
        </div>
    </div>
</section>

<div class="container mx-auto px-4 py-12">
    <div class="grid grid-cols-1 lg:grid-cols-3 gap-8">
        <!-- Main Content -->
        <div class="lg:col-span-2 space-y-8">
            <!-- About Section -->
            <section class="bg-white rounded-lg shadow-sm border border-gray-200 p-8">
                <h2 class="text-2xl font-bold text-gray-900 mb-6">About {{ $destination->name }}</h2>
                <div class="prose max-w-none">
                    {!! $destination->content !!}
                </div>
            </section>

            <!-- Highlights -->
            @if($destination->highlights && count($destination->highlights) > 0)
            <section class="bg-white rounded-lg shadow-sm border border-gray-200 p-8">
                <h2 class="text-2xl font-bold text-gray-900 mb-6">Highlights</h2>
                <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                    @foreach($destination->highlights as $highlight)
                    <div class="flex items-start">
                        <i class="fas fa-check-circle text-green-500 mr-3 mt-1"></i>
                        <span class="text-gray-700">{{ $highlight }}</span>
                    </div>
                    @endforeach
                </div>
            </section>
            @endif

            <!-- Requirements -->
            @if($destination->requirements && count($destination->requirements) > 0)
            <section class="bg-white rounded-lg shadow-sm border border-gray-200 p-8">
                <h2 class="text-2xl font-bold text-gray-900 mb-6">Requirements</h2>
                <div class="space-y-4">
                    @foreach($destination->requirements as $requirement)
                    <div class="flex items-start">
                        <i class="fas fa-list-ul text-blue-500 mr-3 mt-1"></i>
                        <span class="text-gray-700">{{ $requirement }}</span>
                    </div>
                    @endforeach
                </div>
            </section>
            @endif

            <!-- Benefits -->
            @if($destination->benefits && count($destination->benefits) > 0)
            <section class="bg-white rounded-lg shadow-sm border border-gray-200 p-8">
                <h2 class="text-2xl font-bold text-gray-900 mb-6">Benefits</h2>
                <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                    @foreach($destination->benefits as $benefit)
                    <div class="flex items-start">
                        <i class="fas fa-star text-yellow-500 mr-3 mt-1"></i>
                        <span class="text-gray-700">{{ $benefit }}</span>
                    </div>
                    @endforeach
                </div>
            </section>
            @endif
        </div>

        <!-- Sidebar -->
        <div class="space-y-6">
            <!-- Quick Info Card -->
            <div class="bg-white rounded-lg shadow-sm border border-gray-200 p-6">
                <h3 class="text-lg font-semibold text-gray-900 mb-4">Quick Information</h3>
                <div class="space-y-3">
                    @if($destination->capital)
                    <div class="flex justify-between">
                        <span class="text-gray-600">Capital:</span>
                        <span class="font-medium">{{ $destination->capital }}</span>
                    </div>
                    @endif
                    @if($destination->currency)
                    <div class="flex justify-between">
                        <span class="text-gray-600">Currency:</span>
                        <span class="font-medium">{{ $destination->currency }}</span>
                    </div>
                    @endif
                    @if($destination->language)
                    <div class="flex justify-between">
                        <span class="text-gray-600">Language:</span>
                        <span class="font-medium">{{ $destination->language }}</span>
                    </div>
                    @endif
                    <div class="flex justify-between">
                        <span class="text-gray-600">Region:</span>
                        <span class="font-medium">{{ $destination->region }}</span>
                    </div>
                </div>
            </div>

            <!-- Financial Information -->
            <div class="bg-white rounded-lg shadow-sm border border-gray-200 p-6">
                <h3 class="text-lg font-semibold text-gray-900 mb-4">Financial Information</h3>
                <div class="space-y-3">
                    <div class="flex justify-between">
                        <span class="text-gray-600">Tuition Fee:</span>
                        <span class="font-medium">{{ $destination->formatted_tuition_fee }}</span>
                    </div>
                    <div class="flex justify-between">
                        <span class="text-gray-600">Living Cost:</span>
                        <span class="font-medium">{{ $destination->formatted_living_cost }}</span>
                    </div>
                </div>
            </div>

            <!-- Call to Action -->
            <div class="bg-gradient-to-r from-blue-600 to-purple-600 text-white rounded-lg p-6">
                <h3 class="text-lg font-semibold mb-4">Ready to Study in {{ $destination->name }}?</h3>
                <p class="text-sm mb-6">Get expert guidance and support for your study abroad journey.</p>
                <div class="space-y-3">
                    <a href="#" class="w-full bg-white text-blue-600 px-4 py-2 rounded-lg hover:bg-gray-100 transition-colors duration-200 text-center block font-semibold">
                        <i class="fas fa-phone mr-2"></i>Contact Us
                    </a>
                    <a href="#" class="w-full bg-transparent border-2 border-white text-white px-4 py-2 rounded-lg hover:bg-white hover:text-blue-600 transition-colors duration-200 text-center block font-semibold">
                        <i class="fas fa-calendar mr-2"></i>Book Consultation
                    </a>
                </div>
            </div>

            <!-- Related Destinations -->
            @if($relatedDestinations->count() > 0)
            <div class="bg-white rounded-lg shadow-sm border border-gray-200 p-6">
                <h3 class="text-lg font-semibold text-gray-900 mb-4">Related Destinations</h3>
                <div class="space-y-4">
                    @foreach($relatedDestinations as $related)
                    <a href="{{ route('destination.show', $related) }}" class="block hover:bg-gray-50 rounded-lg p-3 transition-colors duration-200">
                        <div class="flex items-center space-x-3">
                            @if($related->flag_image)
                                <img src="{{ $related->flag_image_url }}" alt="{{ $related->name }} flag" class="w-8 h-6 object-cover rounded">
                            @endif
                            <div>
                                <h4 class="font-medium text-gray-900">{{ $related->name }}</h4>
                                <p class="text-sm text-gray-600">{{ $related->region }}</p>
                            </div>
                        </div>
                    </a>
                    @endforeach
                </div>
            </div>
            @endif
        </div>
    </div>
</div>

<!-- Related Destinations Section -->
@if($relatedDestinations->count() > 0)
<section class="bg-gray-50 py-16">
    <div class="container mx-auto px-4">
        <div class="text-center mb-12">
            <h2 class="text-3xl font-bold text-gray-900 mb-4">Explore Other Destinations</h2>
            <p class="text-gray-600">Discover more study opportunities around the world</p>
        </div>
        
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
            @foreach($relatedDestinations as $related)
            <div class="bg-white rounded-lg shadow-lg overflow-hidden hover:shadow-xl transition-shadow duration-300">
                <div class="h-48 bg-gradient-to-br from-blue-400 to-blue-600 relative">
                    @if($related->featured_image)
                        <img src="{{ $related->featured_image_url }}" alt="{{ $related->name }}" class="w-full h-full object-cover">
                    @else
                        <div class="flex items-center justify-center h-full">
                            <i class="fas fa-flag text-white text-4xl"></i>
                        </div>
                    @endif
                    @if($related->is_featured)
                        <div class="absolute top-4 right-4">
                            <span class="bg-yellow-400 text-yellow-900 px-3 py-1 rounded-full text-sm font-semibold">
                                <i class="fas fa-star mr-1"></i>Featured
                            </span>
                        </div>
                    @endif
                </div>
                <div class="p-6">
                    <div class="flex items-center justify-between mb-3">
                        <h3 class="text-xl font-bold text-gray-900">{{ $related->name }}</h3>
                        @if($related->flag_image)
                            <img src="{{ $related->flag_image_url }}" alt="{{ $related->name }} flag" class="w-8 h-6 object-cover rounded">
                        @endif
                    </div>
                    <p class="text-gray-600 mb-4">{{ Str::limit($related->short_description, 100) }}</p>
                    
                    <div class="flex items-center justify-between">
                        <span class="text-sm text-gray-500">{{ $related->region }}</span>
                        <a href="{{ route('destination.show', $related) }}" 
                           class="bg-blue-600 text-white px-4 py-2 rounded-lg hover:bg-blue-700 transition-colors duration-200">
                            Learn More
                        </a>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
        
        <div class="text-center mt-8">
            <a href="{{ route('destinations.index') }}" class="bg-blue-600 text-white px-8 py-3 rounded-lg hover:bg-blue-700 transition-colors duration-200">
                View All Destinations
            </a>
        </div>
    </div>
</section>
@endif

<!-- Call to Action -->
<section class="bg-gray-900 text-white py-16">
    <div class="container mx-auto px-4 text-center">
        <h2 class="text-3xl font-bold mb-4">Start Your Study Abroad Journey Today</h2>
        <p class="text-xl mb-8">Get expert guidance and support for your international education</p>
        <div class="flex flex-col sm:flex-row gap-4 justify-center">
            <a href="#" class="bg-blue-600 text-white px-8 py-3 rounded-lg hover:bg-blue-700 transition-colors duration-200">
                <i class="fas fa-phone mr-2"></i>Contact Us
            </a>
            <a href="#" class="bg-transparent border-2 border-white text-white px-8 py-3 rounded-lg hover:bg-white hover:text-gray-900 transition-colors duration-200">
                <i class="fas fa-calendar mr-2"></i>Book Consultation
            </a>
        </div>
    </div>
</section>
@endsection
