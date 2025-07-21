@props(['hero' => 'hero1'   ])

@php
    $sliders = [
        ['title' => 'Your Gateway to Global Education', 'description' => 'Discover world-class universities and transform your future with expert guidance from Bangladesh\'s leading study abroad consultancy.', 'image' => asset('images/hero/hero1.jpg')],
        ['title' => 'Study in Top Universities Worldwide', 'description' => 'From USA to Australia, UK to Canada - we help you find the perfect destination for your academic journey.', 'image' => asset('images/hero/hero2.jpg')],
        ['title' => 'Expert Visa & Application Support', 'description' => '100% success rate with visa applications. Our experienced team handles everything from applications to interviews.', 'image' => asset('images/hero/hero3.jpg')],
    ];

@endphp

@push('styles')
    <style>
    .hero-slider {
        position: relative;
        overflow: hidden;
    }
    .slide {
        display: none;
        opacity: 0;
        transition: opacity 0.6s ease-in-out;
    }
    .slide.active {
        display: block;
        opacity: 1;
    }
    </style>
@endpush

@push('scripts')
<script>
let currentSlideIndex = 0;
const slides = document.querySelectorAll(".slide");
const dots = document.querySelectorAll(".slider-dot");

function showSlide(index) {
    slides.forEach((slide, i) => {
        slide.classList.toggle("active", i === index);
    });
    dots.forEach((dot, i) => {
        dot.style.opacity = i === index ? "1" : "0.5";
    });
}

function nextSlide() {
    currentSlideIndex = (currentSlideIndex + 1) % slides.length;
    showSlide(currentSlideIndex);
}

function currentSlide(index) {
    currentSlideIndex = index - 1;
    showSlide(currentSlideIndex);
}

// Auto-advance slides
setInterval(nextSlide, 5000);

// Initialize first slide
showSlide(0);
</script>
@endpush


<section class="hero-slider h-[50vh] relative" id="home">
    @foreach($sliders as $index => $slider)
        <div class="slide h-full {{ $index === 0 ? 'active' : '' }}">
            <div class="h-full relative">
                <div
                    class="absolute inset-0 bg-gradient-to-r from-purple-900/80 to-blue-900/60"
                ></div>
                <div
                    class="h-full bg-cover bg-center bg-no-repeat flex items-center"
                    style="background-image: url('{{ $slider['image'] }}');"
                >
                    <div
                        class="container mx-auto px-4 text-white relative z-10"
                    >
                        <div class="max-w-3xl" data-aos="fade-up">
                            <h2 class="text-5xl font-bold mb-6">
                                {{ $slider['title'] }}
                            </h2>
                            <p class="text-xl mb-8">
                                {{ $slider['description'] }}
                            </p>
                            <div class="flex space-x-4">
                                <button
                                    class="bg-white text-purple-600 px-8 py-3 rounded-lg font-semibold hover:bg-gray-100 transition"
                                >
                                    Get Started
                                </button>
                                <button
                                    class="border-2 border-white text-white px-8 py-3 rounded-lg font-semibold hover:bg-white hover:text-purple-600 transition"
                                >
                                    Learn More
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    @endforeach

    <!-- Slider Controls -->
    <div
        class="absolute bottom-8 left-1/2 transform -translate-x-1/2 flex space-x-2"
    >
        @foreach($sliders as $index => $slider)
            <button
                class="slider-dot w-3 h-3 bg-white rounded-full opacity-50 hover:opacity-100 transition"
                onclick="currentSlide({{ $index + 1 }})"
            ></button>
        @endforeach
    </div>
</section>
