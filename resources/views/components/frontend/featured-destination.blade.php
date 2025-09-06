
@props(['featuredDestinations'])

<!-- Featured Destinations -->
<section class="py-16 bg-gray-100" id="destinations">
    <div class="container mx-auto px-4">
        <div class="text-center mb-12" data-aos="fade-up">
            <h2 class="text-4xl font-bold text-gray-800 mb-4">
                Featured Destinations
            </h2>
            <p class="text-gray-600 text-lg">
                Explore top study destinations around the world
            </p>
        </div>

        @if($featuredDestinations->count() > 0)
            <div class="grid md:grid-cols-2 lg:grid-cols-3 gap-8">
                @foreach($featuredDestinations as $destination)
                    <div class="bg-white rounded-lg shadow-lg overflow-hidden" data-aos="fade-up" data-aos-delay="{{ $loop->index * 100 }}">
                        <!-- Destination Image -->
                        <div class="h-48 bg-gradient-to-br from-blue-500 to-purple-600 relative overflow-hidden">
                            @if($destination->featured_image_url)
                                <img src="{{ $destination->featured_image_url }}" alt="{{ $destination->name }}" class="w-full h-full object-cover">
                            @else
                                <div class="flex items-center justify-center h-full">
                                    <i class="fas fa-flag text-white text-6xl"></i>
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
                            <h3 class="text-2xl font-bold text-gray-800 mb-3">{{ $destination->name }}</h3>
                            
                            <p class="text-gray-600 mb-6">{{ Str::limit($destination->short_description, 120) }}</p>
                            
                            <!-- Key Statistics - Centered boxes -->
                            <div class="grid grid-cols-2 gap-4 mb-6">
                                <div class="text-center p-2 bg-gray-50 rounded">
                                    <div class="font-semibold text-gray-800">{{ $destination->formatted_tuition_fee }}</div>
                                    <div class="text-gray-600">Avg. Tuition</div>
                                </div>
                                <div class="text-center p-2 bg-gray-50 rounded">
                                    <div class="font-semibold text-gray-800">{{ $destination->formatted_living_cost }}</div>
                                    <div class="text-gray-600">Living Cost</div>
                                </div>
                            </div>
                            
                            <!-- Highlights/Benefits List -->
                            @if($destination->highlights && count($destination->highlights) > 0)
                                <div class="space-y-2 mb-6">
                                    @foreach(array_slice($destination->highlights, 0, 2) as $highlight)
                                        <div class="flex items-center text-sm">
                                            <i class="fas fa-check text-green-500 mr-2"></i>
                                            <span class="text-gray-700">{{ $highlight }}</span>
                                        </div>
                                    @endforeach
                                </div>
                            @else
                                <!-- Fallback benefits for destinations without highlights -->
                                <div class="space-y-2 mb-6">
                                    <div class="flex items-center text-sm">
                                        <i class="fas fa-check text-green-500 mr-2"></i>
                                        <span class="text-gray-700">Post-graduation work permit up to 3 years</span>
                                    </div>
                                    <div class="flex items-center text-sm">
                                        <i class="fas fa-check text-green-500 mr-2"></i>
                                        <span class="text-gray-700">Pathway to permanent residence</span>
                                    </div>
                                </div>
                            @endif
                            
                            <!-- Call to Action Button -->
                            @if($destination->url)
                                <a href="{{ $destination->url }}" 
                                   class="w-full bg-primary text-white px-4 py-2 rounded-lg hover:bg-primary-dark transition text-center block">
                                    Learn More About {{ $destination->name }}
                                </a>
                            @endif
                        </div>
                    </div>
                @endforeach
            </div>

            <!-- View All Destinations Button -->
            <div class="text-center mt-12">
                <a href="{{ route('destinations.index') }}" 
                   class="bg-primary text-white px-8 py-3 rounded-lg hover:bg-primary transition inline-block">
                    View All Destinations
                </a>
            </div>
        @else
            <!-- Fallback when no featured destinations -->
            <div class="bg-white rounded-lg shadow-lg overflow-hidden max-w-4xl mx-auto" data-aos="fade-up">
                <div class="md:flex">
                    <div class="md:w-1/2">
                        <div class="h-64 md:h-full bg-gradient-to-br from-blue-500 to-purple-600 flex items-center justify-center">
                            <i class="fas fa-globe text-white text-8xl"></i>
                        </div>
                    </div>
                    <div class="md:w-1/2 p-8">
                        <h3 class="text-3xl font-bold text-gray-800 mb-4">
                            Explore Study Destinations
                        </h3>
                        <p class="text-gray-600 mb-6">
                            Discover amazing study opportunities around the world. From top universities to affordable education, find your perfect study destination.
                        </p>

                        <div class="space-y-3 mb-6">
                            <div class="flex items-center">
                                <i class="fas fa-check text-green-500 mr-3"></i>
                                <span>World-class education</span>
                            </div>
                            <div class="flex items-center">
                                <i class="fas fa-check text-green-500 mr-3"></i>
                                <span>Affordable tuition fees</span>
                            </div>
                            <div class="flex items-center">
                                <i class="fas fa-check text-green-500 mr-3"></i>
                                <span>Post-graduation opportunities</span>
                            </div>
                            <div class="flex items-center">
                                <i class="fas fa-check text-green-500 mr-3"></i>
                                <span>Multicultural environment</span>
                            </div>
                        </div>

                        <a href="{{ route('destinations.index') }}"
                           class="bg-primary text-white px-6 py-3 rounded-lg hover:bg-primary-dark transition inline-block">
                            Explore Destinations
                        </a>
                    </div>
                </div>
            </div>
        @endif
    </div>
</section>

