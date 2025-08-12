@extends('layouts.app')

@section('content')
<!-- Hero Section -->
<section class="bg-gradient-to-r from-purple-600 to-blue-600 text-white py-20">
    <div class="container mx-auto px-4 text-center">
        <h1 class="text-4xl md:text-6xl font-bold mb-6" data-aos="fade-up">Our Services</h1>
        <p class="text-xl md:text-2xl mb-8 max-w-3xl mx-auto" data-aos="fade-up" data-aos-delay="100">
            Comprehensive student services to support your study-abroad journey
        </p>
        <div class="flex justify-center space-x-4" data-aos="fade-up" data-aos-delay="200">
            <a href="#services" class="bg-white text-purple-600 px-6 py-3 rounded-lg font-semibold hover:bg-gray-100 transition-colors duration-200">
                Explore Services
            </a>
            <a href="{{ route('contact') }}" class="border-2 border-white text-white px-6 py-3 rounded-lg font-semibold hover:bg-white hover:text-purple-600 transition-colors duration-200">
                Get in Touch
            </a>
        </div>
    </div>
</section>

<!-- Student Essentials Section -->
<section id="services" class="py-16 bg-gray-50">
    <div class="container mx-auto px-4">
        <div class="text-center mb-12" data-aos="fade-up">
            <h2 class="text-4xl font-bold text-gray-800 mb-4">Student Essentials</h2>
            <p class="text-lg text-gray-600 max-w-2xl mx-auto">
                Everything you need to start your study-abroad journey with confidence.
            </p>
        </div>

        @if(count($studentEssentials) > 0)
            <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-8">
                @foreach($studentEssentials as $index => $essential)
                    <div class="bg-white rounded-xl shadow-lg p-6 hover:shadow-xl transition-shadow" 
                         data-aos="fade-up" 
                         data-aos-delay="{{ ($index + 1) * 100 }}">
                        <div class="w-16 h-16 bg-purple-100 text-purple-600 flex items-center justify-center rounded-full mb-4">
                            <i class="{{ $essential->icon }} text-2xl"></i>
                        </div>
                        <h3 class="text-xl font-bold text-gray-800 mb-2">{{ $essential->title }}</h3>
                        <p class="text-gray-600 mb-4">
                            {{ $essential->description }}
                        </p>
                        @if($essential->show_learn_more)
                            <a href="{{ $essential->learn_more_url ?? '#' }}" 
                               class="inline-flex items-center text-purple-600 font-semibold hover:text-purple-700"
                               @if($essential->learn_more_url) target="_blank" @endif>
                                Learn more <i class="fas fa-arrow-right ml-2"></i>
                            </a>
                        @endif
                    </div>
                @endforeach
            </div>
        @else
            <!-- Default Student Essentials (fallback) -->
            <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-8">
                <!-- Education Loan Card -->
                <div class="bg-white rounded-xl shadow-lg p-6 hover:shadow-xl transition-shadow" data-aos="fade-up" data-aos-delay="100">
                    <div class="w-16 h-16 bg-purple-100 text-purple-600 flex items-center justify-center rounded-full mb-4">
                        <i class="fas fa-university text-2xl"></i>
                    </div>
                    <h3 class="text-xl font-bold text-gray-800 mb-2">Education Loan</h3>
                    <p class="text-gray-600 mb-4">
                        Easy access to finances so you don't delay your dreams.
                    </p>
                    <a href="#" class="inline-flex items-center text-purple-600 font-semibold hover:text-purple-700">
                        Learn more <i class="fas fa-arrow-right ml-2"></i>
                    </a>
                </div>

                <!-- Money Transfer Card -->
                <div class="bg-white rounded-xl shadow-lg p-6 hover:shadow-xl transition-shadow" data-aos="fade-up" data-aos-delay="200">
                    <div class="w-16 h-16 bg-purple-100 text-purple-600 flex items-center justify-center rounded-full mb-4">
                        <i class="fas fa-exchange-alt text-2xl"></i>
                    </div>
                    <h3 class="text-xl font-bold text-gray-800 mb-2">Money Transfer</h3>
                    <p class="text-gray-600 mb-4">
                        Safe, secure and fast payments to your institution and other key services.
                    </p>
                    <a href="#" class="inline-flex items-center text-purple-600 font-semibold hover:text-purple-700">
                        Learn more <i class="fas fa-arrow-right ml-2"></i>
                    </a>
                </div>

                <!-- Student Health Cover Card -->
                <div class="bg-white rounded-xl shadow-lg p-6 hover:shadow-xl transition-shadow" data-aos="fade-up" data-aos-delay="300">
                    <div class="w-16 h-16 bg-purple-100 text-purple-600 flex items-center justify-center rounded-full mb-4">
                        <i class="fas fa-shield-alt text-2xl"></i>
                    </div>
                    <h3 class="text-xl font-bold text-gray-800 mb-2">Student Health Cover</h3>
                    <p class="text-gray-600 mb-4">
                        Your choice, your health cover, your peace of mind abroad.
                    </p>
                    <a href="#" class="inline-flex items-center text-purple-600 font-semibold hover:text-purple-700">
                        Learn more <i class="fas fa-arrow-right ml-2"></i>
                    </a>
                </div>

                <!-- Student Banking Card -->
                <div class="bg-white rounded-xl shadow-lg p-6 hover:shadow-xl transition-shadow" data-aos="fade-up" data-aos-delay="400">
                    <div class="w-16 h-16 bg-purple-100 text-purple-600 flex items-center justify-center rounded-full mb-4">
                        <i class="fas fa-credit-card text-2xl"></i>
                    </div>
                    <h3 class="text-xl font-bold text-gray-800 mb-2">Student Banking</h3>
                    <p class="text-gray-600 mb-4">
                        Open a bank account before you arrive.
                    </p>
                    <a href="#" class="inline-flex items-center text-purple-600 font-semibold hover:text-purple-700">
                        Learn more <i class="fas fa-arrow-right ml-2"></i>
                    </a>
                </div>

                <!-- Accommodation Card -->
                <div class="bg-white rounded-xl shadow-lg p-6 hover:shadow-xl transition-shadow" data-aos="fade-up" data-aos-delay="500">
                    <div class="w-16 h-16 bg-purple-100 text-purple-600 flex items-center justify-center rounded-full mb-4">
                        <i class="fas fa-home text-2xl"></i>
                    </div>
                    <h3 class="text-xl font-bold text-gray-800 mb-2">Accommodation</h3>
                    <p class="text-gray-600 mb-4">
                        Student apartment or homestay, the choice is yours.
                    </p>
                    <a href="#" class="inline-flex items-center text-purple-600 font-semibold hover:text-purple-700">
                        Learn more <i class="fas fa-arrow-right ml-2"></i>
                    </a>
                </div>

                <!-- SIM Cards Card -->
                <div class="bg-white rounded-xl shadow-lg p-6 hover:shadow-xl transition-shadow" data-aos="fade-up" data-aos-delay="600">
                    <div class="w-16 h-16 bg-purple-100 text-purple-600 flex items-center justify-center rounded-full mb-4">
                        <i class="fas fa-sim-card text-2xl"></i>
                    </div>
                    <h3 class="text-xl font-bold text-gray-800 mb-2">SIM Cards</h3>
                    <p class="text-gray-600 mb-4">
                        No SIM? No problem – We've got it covered.
                    </p>
                    <a href="#" class="inline-flex items-center text-purple-600 font-semibold hover:text-purple-700">
                        Learn more <i class="fas fa-arrow-right ml-2"></i>
                    </a>
                </div>

                <!-- Guardianship Card -->
                <div class="bg-white rounded-xl shadow-lg p-6 hover:shadow-xl transition-shadow" data-aos="fade-up" data-aos-delay="700">
                    <div class="w-16 h-16 bg-purple-100 text-purple-600 flex items-center justify-center rounded-full mb-4">
                        <i class="fas fa-user-shield text-2xl"></i>
                    </div>
                    <h3 class="text-xl font-bold text-gray-800 mb-2">Guardianship</h3>
                    <p class="text-gray-600 mb-4">
                        If you're under 18, we'll find you a guardian.
                    </p>
                    <a href="#" class="inline-flex items-center text-purple-600 font-semibold hover:text-purple-700">
                        Learn more <i class="fas fa-arrow-right ml-2"></i>
                    </a>
                </div>

                <!-- Student Identity Card -->
                <div class="bg-white rounded-xl shadow-lg p-6 hover:shadow-xl transition-shadow" data-aos="fade-up" data-aos-delay="800">
                    <div class="w-16 h-16 bg-purple-100 text-purple-600 flex items-center justify-center rounded-full mb-4">
                        <i class="fas fa-id-card text-2xl"></i>
                    </div>
                    <h3 class="text-xl font-bold text-gray-800 mb-2">Student Identity Card</h3>
                    <p class="text-gray-600 mb-4">
                        Start enjoying global student discounts on food, fashion, travel, and more.
                    </p>
                    <a href="#" class="inline-flex items-center text-purple-600 font-semibold hover:text-purple-700">
                        Learn more <i class="fas fa-arrow-right ml-2"></i>
                    </a>
                </div>
            </div>
        @endif
    </div>
</section>

<!-- Call to Action Section -->
<section class="py-16 bg-purple-600 text-white">
    <div class="container mx-auto px-4 text-center">
        <h2 class="text-3xl md:text-4xl font-bold mb-6" data-aos="fade-up">Ready to Start Your Journey?</h2>
        <p class="text-xl mb-8 max-w-2xl mx-auto" data-aos="fade-up" data-aos-delay="100">
            Get personalized guidance and support for your study-abroad adventure.
        </p>
        <div class="flex flex-col sm:flex-row justify-center space-y-4 sm:space-y-0 sm:space-x-4" data-aos="fade-up" data-aos-delay="200">
            <a href="{{ route('contact') }}" class="bg-white text-purple-600 px-8 py-3 rounded-lg font-semibold hover:bg-gray-100 transition-colors duration-200">
                Contact Us
            </a>
            <a href="{{ route('home') }}" class="border-2 border-white text-white px-8 py-3 rounded-lg font-semibold hover:bg-white hover:text-purple-600 transition-colors duration-200">
                Learn More
            </a>
        </div>
    </div>
</section>
@endsection
