@extends('layouts.app')

@section('content')
<!-- Hero Section -->
<section class="relative bg-gradient-to-r from-blue-600 to-primary text-white py-20">
    <div class="absolute inset-0 bg-black opacity-20"></div>
    <div class="relative max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="text-center">
            <h1 class="text-4xl md:text-6xl font-bold mb-6">About Scholars Zone</h1>
            <p class="text-xl md:text-2xl text-blue-100 max-w-3xl mx-auto">
                Empowering students to achieve their dreams through expert guidance and comprehensive support for international education.
            </p>
        </div>
    </div>
</section>

<!-- Mission & Vision Section -->
<section class="py-16 bg-white">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="grid grid-cols-1 lg:grid-cols-2 gap-12 items-center">
            <div>
                <h2 class="text-3xl md:text-4xl font-bold text-gray-900 mb-6">Our Mission</h2>
                <p class="text-lg text-gray-600 mb-6">
                    At Scholars Zone, we believe that every student deserves the opportunity to pursue their educational dreams abroad. Our mission is to provide comprehensive guidance, expert advice, and unwavering support to help students navigate the complex journey of international education.
                </p>
                <p class="text-lg text-gray-600 mb-8">
                    We are committed to making quality education accessible to students from all backgrounds, helping them find the perfect academic path that aligns with their goals and aspirations.
                </p>
                
                <h3 class="text-2xl font-bold text-gray-900 mb-4">Our Vision</h3>
                <p class="text-lg text-gray-600">
                    To become the leading platform for international education guidance, connecting students with world-class institutions and creating opportunities for academic excellence and personal growth.
                </p>
            </div>
            <div class="relative">
                <div class="bg-gradient-to-br from-blue-500 to-primary rounded-2xl p-8 text-white">
                    <div class="text-center">
                        <div class="w-20 h-20 bg-white bg-opacity-20 rounded-full flex items-center justify-center mx-auto mb-6">
                            <i class="fas fa-graduation-cap text-3xl"></i>
                        </div>
                        <h3 class="text-2xl font-bold mb-4">Why Choose Scholars Zone?</h3>
                        <ul class="text-left space-y-3">
                            <li class="flex items-center">
                                <i class="fas fa-check-circle mr-3 text-green-300"></i>
                                Expert guidance from experienced counselors
                            </li>
                            <li class="flex items-center">
                                <i class="fas fa-check-circle mr-3 text-green-300"></i>
                                Comprehensive support throughout the process
                            </li>
                            <li class="flex items-center">
                                <i class="fas fa-check-circle mr-3 text-green-300"></i>
                                Access to top universities worldwide
                            </li>
                            <li class="flex items-center">
                                <i class="fas fa-check-circle mr-3 text-green-300"></i>
                                Personalized approach for each student
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Our Story Section -->
<section class="py-16 bg-gray-50">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="text-center mb-12">
            <h2 class="text-3xl md:text-4xl font-bold text-gray-900 mb-4">Our Story</h2>
            <p class="text-lg text-gray-600 max-w-3xl mx-auto">
                Founded with a passion for education and a vision to bridge the gap between students and international opportunities.
            </p>
        </div>
        
        <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
            <div class="text-center">
                <div class="w-16 h-16 bg-blue-600 rounded-full flex items-center justify-center mx-auto mb-4">
                    <i class="fas fa-lightbulb text-white text-2xl"></i>
                </div>
                <h3 class="text-xl font-bold text-gray-900 mb-2">The Beginning</h3>
                <p class="text-gray-600">
                    Started as a small team of education enthusiasts who recognized the challenges students face when pursuing international education.
                </p>
            </div>
            
            <div class="text-center">
                <div class="w-16 h-16 bg-primary rounded-full flex items-center justify-center mx-auto mb-4">
                    <i class="fas fa-users text-white text-2xl"></i>
                </div>
                <h3 class="text-xl font-bold text-gray-900 mb-2">Growing Together</h3>
                <p class="text-gray-600">
                    Expanded our team with experienced counselors and education experts to provide comprehensive support services.
                </p>
            </div>
            
            <div class="text-center">
                <div class="w-16 h-16 bg-green-600 rounded-full flex items-center justify-center mx-auto mb-4">
                    <i class="fas fa-globe text-white text-2xl"></i>
                </div>
                <h3 class="text-xl font-bold text-gray-900 mb-2">Global Reach</h3>
                <p class="text-gray-600">
                    Established partnerships with universities and institutions across the globe to expand opportunities for our students.
                </p>
            </div>
        </div>
    </div>
</section>

<!-- Values Section -->
<section class="py-16 bg-white">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="text-center mb-12">
            <h2 class="text-3xl md:text-4xl font-bold text-gray-900 mb-4">Our Core Values</h2>
            <p class="text-lg text-gray-600 max-w-3xl mx-auto">
                The principles that guide our work and define our commitment to student success.
            </p>
        </div>
        
        <div class="grid grid-cols-1 md:grid-cols-4 gap-8">
            <div class="text-center p-6 rounded-lg bg-primary-light">
                <div class="w-12 h-12 bg-primary rounded-full flex items-center justify-center mx-auto mb-4">
                    <i class="fas fa-heart text-white text-xl"></i>
                </div>
                <h3 class="text-lg font-bold text-gray-900 mb-2">Compassion</h3>
                <p class="text-gray-600 text-sm">
                    We care deeply about each student's journey and success.
                </p>
            </div>
            
            <div class="text-center p-6 rounded-lg bg-blue-50">
                <div class="w-12 h-12 bg-blue-600 rounded-full flex items-center justify-center mx-auto mb-4">
                    <i class="fas fa-shield-alt text-white text-xl"></i>
                </div>
                <h3 class="text-lg font-bold text-gray-900 mb-2">Integrity</h3>
                <p class="text-gray-600 text-sm">
                    We maintain the highest ethical standards in all our interactions.
                </p>
            </div>
            
            <div class="text-center p-6 rounded-lg bg-green-50">
                <div class="w-12 h-12 bg-green-600 rounded-full flex items-center justify-center mx-auto mb-4">
                    <i class="fas fa-star text-white text-xl"></i>
                </div>
                <h3 class="text-lg font-bold text-gray-900 mb-2">Excellence</h3>
                <p class="text-gray-600 text-sm">
                    We strive for the highest quality in everything we do.
                </p>
            </div>
            
            <div class="text-center p-6 rounded-lg bg-yellow-50">
                <div class="w-12 h-12 bg-yellow-600 rounded-full flex items-center justify-center mx-auto mb-4">
                    <i class="fas fa-handshake text-white text-xl"></i>
                </div>
                <h3 class="text-lg font-bold text-gray-900 mb-2">Partnership</h3>
                <p class="text-gray-600 text-sm">
                    We build lasting relationships with students and institutions.
                </p>
            </div>
        </div>
    </div>
</section>

<!-- Team Section -->
<section class="py-16 bg-gray-50">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="text-center mb-12">
            <h2 class="text-3xl md:text-4xl font-bold text-gray-900 mb-4">Our Expert Team</h2>
            <p class="text-lg text-gray-600 max-w-3xl mx-auto">
                Meet the dedicated professionals who make your study abroad dreams a reality.
            </p>
        </div>
        
        @php
            $teamMembers = App\Models\TeamMember::active()->ordered()->get();
        @endphp
        
        <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
            @forelse($teamMembers as $member)
            <div class="bg-white rounded-lg shadow-lg overflow-hidden">
                <div class="bg-gradient-to-r from-blue-500 to-primary p-8 text-white text-center">
                    <div class="w-24 h-24 bg-white bg-opacity-20 rounded-full flex items-center justify-center mx-auto mb-4 overflow-hidden">
                        @if($member->photo_path)
                            <img src="{{ Storage::url($member->photo_path) }}" alt="{{ $member->name }}" class="w-full h-full object-cover">
                        @else
                            <i class="fas fa-user text-4xl"></i>
                        @endif
                    </div>
                    <h3 class="text-xl font-bold mb-1">{{ $member->name }}</h3>
                    <p class="text-primary-light font-medium">{{ $member->designation }}</p>
                </div>
                <div class="p-6">
                    @if($member->about)
                    <p class="text-gray-600 mb-4">{{ Str::limit($member->about, 140) }}</p>
                    @endif
                    <div class="flex items-center justify-center space-x-4">
                        @if($member->facebook_url)
                            <a href="{{ $member->facebook_url }}" target="_blank" class="text-gray-400 hover:text-primary transition"><i class="fab fa-facebook-f"></i></a>
                        @endif
                        @if($member->twitter_url)
                            <a href="{{ $member->twitter_url }}" target="_blank" class="text-gray-400 hover:text-primary transition"><i class="fab fa-twitter"></i></a>
                        @endif
                        @if($member->linkedin_url)
                            <a href="{{ $member->linkedin_url }}" target="_blank" class="text-gray-400 hover:text-primary transition"><i class="fab fa-linkedin-in"></i></a>
                        @endif
                        @if($member->instagram_url)
                            <a href="{{ $member->instagram_url }}" target="_blank" class="text-gray-400 hover:text-primary transition"><i class="fab fa-instagram"></i></a>
                        @endif
                    </div>
                </div>
            </div>
            @empty
            <div class="col-span-1 md:col-span-3">
                <div class="text-center p-10 bg-gray-50 rounded-lg">
                    <p class="text-gray-600">Team information coming soon.</p>
                </div>
            </div>
            @endforelse
        </div>
    </div>
</section>

<!-- Statistics Section -->
<section class="py-16 bg-primary text-white">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="text-center mb-12">
            <h2 class="text-3xl md:text-4xl font-bold mb-4">Our Impact</h2>
            <p class="text-xl text-blue-100">
                Numbers that reflect our commitment to student success
            </p>
        </div>
        
        <div class="grid grid-cols-2 md:grid-cols-4 gap-8">
            <div class="text-center">
                <div class="text-4xl md:text-5xl font-bold mb-2">1000+</div>
                <p class="text-blue-100">Students Helped</p>
            </div>
            
            <div class="text-center">
                <div class="text-4xl md:text-5xl font-bold mb-2">50+</div>
                <p class="text-blue-100">Partner Universities</p>
            </div>
            
            <div class="text-center">
                <div class="text-4xl md:text-5xl font-bold mb-2">95%</div>
                <p class="text-blue-100">Success Rate</p>
            </div>
            
            <div class="text-center">
                <div class="text-4xl md:text-5xl font-bold mb-2">25+</div>
                <p class="text-blue-100">Countries Covered</p>
            </div>
        </div>
    </div>
</section>

<!-- CTA Section -->
<section class="py-16 bg-gray-900 text-white">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 text-center">
        <h2 class="text-3xl md:text-4xl font-bold mb-6">Ready to Start Your Journey?</h2>
        <p class="text-xl text-gray-300 mb-8 max-w-2xl mx-auto">
            Join thousands of students who have successfully achieved their dreams of international education with our guidance.
        </p>
        <div class="flex flex-col sm:flex-row gap-4 justify-center">
            <a href="/#consultation" 
               class="bg-primary text-white px-8 py-3 rounded-lg hover:bg-primary-dark transition-colors duration-200 font-semibold">
                Get Free Consultation
            </a>
            <a href="{{ route('contact') }}" 
               class="bg-transparent border-2 border-white text-white px-8 py-3 rounded-lg hover:bg-white hover:text-gray-900 transition-colors duration-200 font-semibold">
                Contact Us
            </a>
        </div>
    </div>
</section>
@endsection

