@extends('layouts.app')

@section('content')
<x-frontend.hero />
<x-frontend.features />
<x-frontend.featured-destination :featuredDestinations="$featuredDestinations" />
<x-frontend.country-preview/>
<x-frontend.consultation-form />
<x-frontend.student-essentials />

@php
    $homeStories = \App\Models\SuccessStory::active()->published()->ordered()->limit(3)->get();
@endphp

@if($homeStories->count())
<section class="py-16 bg-gray-50">
    <div class="container mx-auto px-4">
        <div class="text-center mb-12">
            <h2 class="text-3xl font-bold text-gray-900 mb-4">Success Stories</h2>
            <p class="text-gray-600">Real achievements from our students</p>
        </div>
        <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
            @foreach($homeStories as $story)
            <article class="bg-white rounded-lg shadow-lg overflow-hidden hover:shadow-xl transition-shadow duration-300">
                <a href="{{ route('success-stories.show', $story) }}">
                    <div class="h-44 bg-gray-200">
                        @if($story->image_path)
                        <img src="{{ Storage::url($story->image_path) }}" alt="{{ $story->title }}" class="w-full h-full object-cover" />
                        @endif
                    </div>
                </a>
                <div class="p-6">
                    <h3 class="text-xl font-bold text-gray-900 mb-2">
                        <a href="{{ route('success-stories.show', $story) }}" class="hover:text-primary">{{ $story->title }}</a>
                    </h3>
                    <p class="text-gray-600 mb-4">{{ $story->excerpt ?? Str::limit(strip_tags($story->content), 100) }}</p>
                    <a href="{{ route('success-stories.index') }}" class="inline-block bg-primary text-white px-4 py-2 rounded-lg hover:bg-primary-dark">All Stories</a>
                </div>
            </article>
            @endforeach
        </div>
    </div>
</section>
@endif
@endsection
