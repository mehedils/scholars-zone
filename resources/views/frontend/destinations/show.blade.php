@extends('layouts.app')

@section('content')
<!-- Hero Section -->
<section class="relative h-96 bg-gradient-to-r from-blue-600 to-primary">
    @if($destination->featured_image)
        <div class="absolute inset-0 bg-cover bg-center bg-no-repeat" style="background-image: url('{{ $destination->featured_image_url }}');"></div>
        <div class="absolute inset-0 bg-black opacity-50"></div>
    @else
        <div class="absolute inset-0 bg-black opacity-30"></div>
    @endif
    <div class="relative h-full flex items-center">
        <div class="container mx-auto px-4 text-white">
            <div class="max-w-4xl">
                <h1 class="text-4xl md:text-5xl font-bold mb-4">{{ $destination->name }}</h1>
                <p class="text-xl md:text-2xl mb-6">{{ $destination->short_description }}</p>
                
                <!-- Quick Stats -->
                <div class="grid grid-cols-2 md:grid-cols-4 gap-4">
                    <div class="text-center">
                        <div class="text-2xl font-bold">{{ $destination->universities_count }}</div>
                        <div class="text-sm opacity-90">Universities</div>
                    </div>
                    <div class="text-center">
                        <div class="text-2xl font-bold">{{ $destination->programs_count }}</div>
                        <div class="text-sm opacity-90">Programs</div>
                    </div>
                    <div class="text-center">
                        <div class="text-2xl font-bold">{{ $destination->formatted_tuition_fee }}</div>
                        <div class="text-sm opacity-90">Avg. Tuition</div>
                    </div>
                    <div class="text-center">
                        <div class="text-2xl font-bold">{{ $destination->formatted_living_cost }}</div>
                        <div class="text-sm opacity-90">Living Cost</div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Main Content -->
<section class="py-16">
    <div class="container mx-auto px-4">
        <div class="grid lg:grid-cols-3 gap-8">
            <!-- Main Content -->
            <div class="lg:col-span-2">
                <!-- Featured Image Section -->
                @if($destination->featured_image)
                <div class="bg-white rounded-lg shadow-sm border border-gray-200 overflow-hidden mb-8">
                    <img src="{{ $destination->featured_image_url }}" alt="{{ $destination->name }}" class="w-full h-64 md:h-80 object-cover">
                </div>
                @endif

                <!-- About Section -->
                <div class="bg-white rounded-lg shadow-sm border border-gray-200 p-6 mb-8">
                    <h2 class="text-2xl font-bold text-gray-900 mb-4">About {{ $destination->name }}</h2>
                    <div class="prose max-w-none">
                        {!! $destination->content !!}
                    </div>
                </div>

                <!-- Highlights Section -->
                @if($destination->highlights && count($destination->highlights) > 0)
                <div class="bg-white rounded-lg shadow-sm border border-gray-200 p-6 mb-8">
                    <h3 class="text-xl font-bold text-gray-900 mb-4">Key Highlights</h3>
                    <div class="grid md:grid-cols-2 gap-4">
                        @foreach($destination->highlights as $highlight)
                        <div class="flex items-start">
                            <i class="fas fa-check text-green-500 mr-3 mt-1"></i>
                            <span class="text-gray-700">{{ $highlight }}</span>
                        </div>
                        @endforeach
                    </div>
                </div>
                @endif

                <!-- Requirements Section -->
                @if($destination->requirements && count($destination->requirements) > 0)
                <div class="bg-white rounded-lg shadow-sm border border-gray-200 p-6 mb-8">
                    <h3 class="text-xl font-bold text-gray-900 mb-4">Requirements</h3>
                    <div class="space-y-3">
                        @foreach($destination->requirements as $requirement)
                        <div class="flex items-start">
                            <i class="fas fa-info-circle text-blue-500 mr-3 mt-1"></i>
                            <span class="text-gray-700">{{ $requirement }}</span>
                        </div>
                        @endforeach
                    </div>
                </div>
                @endif

                <!-- Benefits Section -->
                @if($destination->benefits && count($destination->benefits) > 0)
                <div class="bg-white rounded-lg shadow-sm border border-gray-200 p-6 mb-8">
                    <h3 class="text-xl font-bold text-gray-900 mb-4">Benefits</h3>
                    <div class="grid md:grid-cols-2 gap-4">
                        @foreach($destination->benefits as $benefit)
                        <div class="flex items-start">
                            <i class="fas fa-star text-yellow-500 mr-3 mt-1"></i>
                            <span class="text-gray-700">{{ $benefit }}</span>
                        </div>
                        @endforeach
                    </div>
                </div>
                @endif
            </div>

            <!-- Sidebar -->
            <div class="lg:col-span-1">
                <!-- Quick Info -->
                <div class="bg-white rounded-lg shadow-sm border border-gray-200 p-6 mb-6">
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
                <div class="bg-white rounded-lg shadow-sm border border-gray-200 p-6 mb-6">
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
                <div class="bg-gradient-to-r from-blue-600 to-primary text-white rounded-lg p-6">
                    <h3 class="text-lg font-semibold mb-4">Ready to Study in {{ $destination->name }}?</h3>
                    <p class="text-sm mb-6">Get expert guidance and support for your study abroad journey.</p>
                    <div class="space-y-3">
                        <a href="{{ route('contact') }}" class="w-full bg-white text-blue-600 px-4 py-2 rounded-lg hover:bg-gray-100 transition-colors duration-200 text-center block font-semibold">
                            <i class="fas fa-phone mr-2"></i>Contact Us
                        </a>
                        <a href="{{ route('contact') }}" class="w-full bg-transparent border-2 border-white text-white px-4 py-2 rounded-lg hover:bg-white hover:text-blue-600 transition-colors duration-200 text-center block font-semibold">
                            <i class="fas fa-calendar mr-2"></i>Book Consultation
                        </a>
                    </div>
                </div>

                <!-- Related Destinations -->
                @if($relatedDestinations->count() > 0)
                <div class="bg-white rounded-lg shadow-sm border border-gray-200 p-6">
                    <h3 class="text-lg font-semibold text-gray-900 mb-4">Explore Other Destinations</h3>
                    <div class="space-y-3">
                        @foreach($relatedDestinations as $related)
                        <a href="{{ route('destination.show', $related) }}" class="block p-3 rounded-lg hover:bg-gray-50 transition-colors">
                            <div class="flex items-center">
                                @if($related->flag_image)
                                <img src="{{ $related->flag_image_url }}" alt="{{ $related->name }} flag" class="w-8 h-6 object-cover rounded mr-3">
                                @endif
                                <div>
                                    <div class="font-medium text-gray-900">{{ $related->name }}</div>
                                    <div class="text-sm text-gray-600">{{ $related->region }}</div>
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
</section>

<!-- Call to Action -->
<section class="bg-gray-900 text-white py-16">
    <div class="container mx-auto px-4 text-center">
        <h2 class="text-3xl font-bold mb-4">Start Your Study Abroad Journey Today</h2>
        <p class="text-xl mb-8">Get expert guidance and support for your international education</p>
        <div class="flex flex-col sm:flex-row gap-4 justify-center">
            <a href="{{ route('contact') }}" class="bg-primary text-white px-6 py-3 rounded-lg hover:bg-primary-dark transition-colors duration-200">
                <i class="fas fa-phone mr-2"></i>Contact Us
            </a>
            <a href="{{ route('contact') }}" class="bg-transparent border-2 border-white text-white px-6 py-3 rounded-lg hover:bg-white hover:text-gray-900 transition-colors duration-200">
                <i class="fas fa-calendar mr-2"></i>Book Consultation
            </a>
        </div>
    </div>
</section>
@endsection
