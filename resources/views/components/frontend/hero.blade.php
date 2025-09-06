@props(['hero' => 'hero1'])

@php
    use App\Helpers\SliderHelper;
    $sliders = SliderHelper::getSlidersForFrontend();
    
    // Fallback to default sliders if no database sliders exist
    if ($sliders->isEmpty()) {
        $sliders = collect([
            [
                'title' => 'Your Gateway to Global Education', 
                'subtitle' => 'Expert Study Abroad Guidance',
                'description' => 'Discover world-class universities and transform your future with expert guidance from Bangladesh\'s leading study abroad consultancy.', 
                'image_url' => asset('images/hero/hero1.jpg'),
                'button_text' => 'Get Started',
                'button_url' => '#services'
            ],
            [
                'title' => 'Study in Top Universities Worldwide', 
                'subtitle' => 'Global Education Opportunities',
                'description' => 'From USA to Australia, UK to Canada - we help you find the perfect destination for your academic journey.', 
                'image_url' => asset('images/hero/hero2.jpg'),
                'button_text' => 'Learn More',
                'button_url' => '#destinations'
            ],
            [
                'title' => 'Expert Visa & Application Support', 
                'subtitle' => '100% Success Rate',
                'description' => '100% success rate with visa applications. Our experienced team handles everything from applications to interviews.', 
                'image_url' => asset('images/hero/hero3.jpg'),
                'button_text' => 'Book Consultation',
                'button_url' => '#consultation'
            ],
        ]);
    }
@endphp

<section class="relative" id="home">
    <div class="hero-swiper swiper h-[60vh] md:h-[80vh]">
        <div class="swiper-wrapper">
            @foreach($sliders as $index => $slider)
                <div class="swiper-slide">
                    <div class="h-full relative">
                        <div
                            class="h-full bg-cover bg-center bg-no-repeat flex items-center"
                            style="background-image: url('{{ $slider['image_url'] ?? asset('images/hero/hero1.jpg') }}');"
                        >
                            <div class="container mx-auto px-4 text-white relative z-10">
                                <div class="max-w-3xl bg-black/40 backdrop-blur-sm rounded-lg p-6 md:p-8" data-aos="fade-up">
                                    @if(isset($slider['subtitle']) && $slider['subtitle'])
                                        <p class="text-lg sm:text-xl md:text-2xl font-medium mb-2 md:mb-3 text-blue-200">
                                            {{ $slider['subtitle'] }}
                                        </p>
                                    @endif
                                    <h2 class="text-3xl sm:text-4xl md:text-5xl font-bold mb-4 md:mb-6">
                                        {{ $slider['title'] }}
                                    </h2>
                                    <p class="text-base sm:text-lg md:text-xl mb-6 md:mb-8">
                                        {{ $slider['description'] }}
                                    </p>
                                    <div class="flex flex-wrap gap-3 md:gap-4">
                                        @if(isset($slider['button_text']) && isset($slider['button_url']))
                                            <a href="{{ $slider['button_url'] }}" 
                                               class="bg-white text-primary px-6 md:px-8 py-2.5 md:py-3 rounded-lg font-semibold hover:bg-gray-100 transition">
                                                {{ $slider['button_text'] }}
                                            </a>
                                        @else
                                            <button class="bg-white text-primary px-6 md:px-8 py-2.5 md:py-3 rounded-lg font-semibold hover:bg-gray-100 transition">
                                                Get Started
                                            </button>
                                        @endif
                                        <a href="{{ route('contact') }}" class="border-2 border-white text-white px-6 md:px-8 py-2.5 md:py-3 rounded-lg font-semibold hover:bg-white hover:text-primary transition">
                                            Learn More
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
        <div class="swiper-pagination !bottom-5"></div>
    </div>
</section>
