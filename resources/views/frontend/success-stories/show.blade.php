@extends('layouts.app')

@section('content')
<section class="relative bg-gradient-to-r from-blue-600 to-primary text-white py-16">
    <div class="container mx-auto px-4">
        <h1 class="text-4xl md:text-5xl font-bold mb-2">{{ $story->title }}</h1>
        @if($story->student_name || $story->destination)
        <p class="text-primary-light text-lg">{{ $story->student_name }} @if($story->destination) · {{ $story->destination }} @endif</p>
        @endif
    </div>
</section>

<section class="py-16">
    <div class="container mx-auto px-4">
        <article class="max-w-4xl mx-auto bg-white rounded-lg shadow-sm p-6 md:p-10">
            @if($story->image_path)
            <img src="{{ Storage::url($story->image_path) }}" alt="{{ $story->title }}" class="w-full rounded-lg mb-6">
            @endif
            <div class="prose max-w-none">
                {!! $story->content !!}
            </div>
        </article>
    </div>
</section>
@endsection


