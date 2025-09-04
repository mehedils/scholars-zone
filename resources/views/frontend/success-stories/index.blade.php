@extends('layouts.app')

@section('content')
<section class="bg-gradient-to-r from-blue-600 to-primary text-white py-16">
    <div class="container mx-auto px-4 text-center">
        <h1 class="text-4xl md:text-5xl font-bold mb-4">Success Stories</h1>
        <p class="text-primary-light text-lg max-w-2xl mx-auto">Real journeys from our students around the world.</p>
    </div>
</section>

<!-- Video Gallery Section -->
<section class="py-16 bg-white">
    <div class="container mx-auto px-4">
        <div class="text-center mb-12">
            <h2 class="text-3xl md:text-4xl font-bold text-gray-900 mb-4">Video Success Stories</h2>
            <p class="text-gray-600 text-lg max-w-2xl mx-auto">Watch our students share their inspiring journeys in their own words.</p>
        </div>
        
        @if($videos->count())
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
            @foreach($videos as $video)
            <div class="bg-white rounded-lg shadow-lg overflow-hidden hover:shadow-xl transition-shadow duration-300">
                <div class="relative aspect-video bg-gray-200">
                    <iframe 
                        class="absolute inset-0 w-full h-full" 
                        src="{{ $video->youtube_embed_url }}" 
                        title="{{ $video->title }}"
                        frameborder="0" 
                        allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" 
                        allowfullscreen>
                    </iframe>
                </div>
                <div class="p-6">
                    <h3 class="text-xl font-bold text-gray-900 mb-2">{{ $video->title }}</h3>
                    <p class="text-sm text-gray-500 mb-2">{{ $video->student_name }} · {{ $video->university }}</p>
                    <p class="text-gray-600 mb-4">{{ $video->description }}</p>
                </div>
            </div>
            @endforeach
        </div>
        @else
        <div class="text-center py-12 bg-white rounded-lg">
            <p class="text-gray-600">No video success stories yet. Please check back soon.</p>
        </div>
        @endif
    </div>
</section>

<!-- Written Success Stories Section -->
<section class="py-16 bg-gray-50">
    <div class="container mx-auto px-4">
        <div class="text-center mb-12">
            <h2 class="text-3xl md:text-4xl font-bold text-gray-900 mb-4">Written Success Stories</h2>
            <p class="text-gray-600 text-lg max-w-2xl mx-auto">Read detailed accounts of our students' academic and career achievements.</p>
        </div>
        @if($stories->count())
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
            @foreach($stories as $story)
            <article class="bg-white rounded-lg shadow-lg overflow-hidden hover:shadow-xl transition-shadow duration-300">
                <a href="{{ route('success-stories.show', $story) }}">
                    <div class="h-48 bg-gray-200">
                        @if($story->image_path)
                            <img src="{{ Storage::url($story->image_path) }}" alt="{{ $story->title }}" class="w-full h-full object-cover" />
                        @endif
                    </div>
                </a>
                <div class="p-6">
                    <h2 class="text-xl font-bold text-gray-900 mb-2">
                        <a href="{{ route('success-stories.show', $story) }}" class="hover:text-primary">{{ $story->title }}</a>
                    </h2>
                    @if($story->student_name || $story->destination)
                    <p class="text-sm text-gray-500 mb-2">
                        {{ $story->student_name }} @if($story->destination) · {{ $story->destination }} @endif
                    </p>
                    @endif
                    <p class="text-gray-600 mb-4">{{ $story->excerpt ?? Str::limit(strip_tags($story->content), 100) }}</p>
                    <a href="{{ route('success-stories.show', $story) }}" class="inline-block bg-primary text-white px-4 py-2 rounded-lg hover:bg-primary-dark">Read Story</a>
                </div>
            </article>
            @endforeach
        </div>

        <div class="mt-10">{{ $stories->links() }}</div>
        @else
        <div class="text-center py-12 bg-white rounded-lg">
            <p class="text-gray-600">No stories yet. Please check back soon.</p>
        </div>
        @endif
    </div>
</section>
@endsection


