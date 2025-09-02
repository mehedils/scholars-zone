@extends('layouts.app')

@section('content')
<!-- Hero Section -->
<section class="relative bg-gradient-to-r from-blue-600 to-purple-700 text-white py-20">
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
                <div class="bg-gradient-to-br from-blue-500 to-purple-600 rounded-2xl p-8 text-white">
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
                <div class="w-16 h-16 bg-purple-600 rounded-full flex items-center justify-center mx-auto mb-4">
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
                    Today, we serve students from around the world, helping them achieve their dreams of international education.
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
                The principles that guide everything we do and shape our commitment to student success.
            </p>
        </div>
        
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-8">
            <div class="text-center p-6 rounded-lg bg-blue-50">
                <div class="w-12 h-12 bg-blue-600 rounded-full flex items-center justify-center mx-auto mb-4">
                    <i class="fas fa-heart text-white"></i>
                </div>
                <h3 class="text-lg font-bold text-gray-900 mb-2">Passion</h3>
                <p class="text-gray-600 text-sm">
                    We are passionate about education and committed to helping students achieve their dreams.
                </p>
            </div>
            
            <div class="text-center p-6 rounded-lg bg-purple-50">
                <div class="w-12 h-12 bg-purple-600 rounded-full flex items-center justify-center mx-auto mb-4">
                    <i class="fas fa-shield-alt text-white"></i>
                </div>
                <h3 class="text-lg font-bold text-gray-900 mb-2">Integrity</h3>
                <p class="text-gray-600 text-sm">
                    We maintain the highest standards of honesty and transparency in all our interactions.
                </p>
            </div>
            
            <div class="text-center p-6 rounded-lg bg-green-50">
                <div class="w-12 h-12 bg-green-600 rounded-full flex items-center justify-center mx-auto mb-4">
                    <i class="fas fa-star text-white"></i>
                </div>
                <h3 class="text-lg font-bold text-gray-900 mb-2">Excellence</h3>
                <p class="text-gray-600 text-sm">
                    We strive for excellence in everything we do, from counseling to customer service.
                </p>
            </div>
            
            <div class="text-center p-6 rounded-lg bg-yellow-50">
                <div class="w-12 h-12 bg-yellow-600 rounded-full flex items-center justify-center mx-auto mb-4">
                    <i class="fas fa-hands-helping text-white"></i>
                </div>
                <h3 class="text-lg font-bold text-gray-900 mb-2">Support</h3>
                <p class="text-gray-600 text-sm">
                    We provide unwavering support to our students throughout their educational journey.
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
                Meet the dedicated professionals who are committed to helping you achieve your educational goals.
            </p>
        </div>
        
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
            <div class="bg-white rounded-lg shadow-lg overflow-hidden">
                <div class="bg-gradient-to-r from-blue-500 to-purple-600 p-8 text-white text-center">
                    <div class="w-20 h-20 bg-white bg-opacity-20 rounded-full flex items-center justify-center mx-auto mb-4">
                        <i class="fas fa-user-tie text-2xl"></i>
                    </div>
                    <h3 class="text-xl font-bold">Education Counselors</h3>
                    <p class="text-blue-100">Expert guidance for your academic journey</p>
                </div>
                <div class="p-6">
                    <p class="text-gray-600">
                        Our experienced counselors provide personalized advice to help you choose the right program and university.
                    </p>
                </div>
            </div>
            
            <div class="bg-white rounded-lg shadow-lg overflow-hidden">
                <div class="bg-gradient-to-r from-green-500 to-blue-600 p-8 text-white text-center">
                    <div class="w-20 h-20 bg-white bg-opacity-20 rounded-full flex items-center justify-center mx-auto mb-4">
                        <i class="fas fa-file-alt text-2xl"></i>
                    </div>
                    <h3 class="text-xl font-bold">Application Specialists</h3>
                    <p class="text-green-100">Comprehensive application support</p>
                </div>
                <div class="p-6">
                    <p class="text-gray-600">
                        Our specialists ensure your applications are complete, accurate, and submitted on time.
                    </p>
                </div>
            </div>
            
            <div class="bg-white rounded-lg shadow-lg overflow-hidden">
                <div class="bg-gradient-to-r from-purple-500 to-pink-600 p-8 text-white text-center">
                    <div class="w-20 h-20 bg-white bg-opacity-20 rounded-full flex items-center justify-center mx-auto mb-4">
                        <i class="fas fa-headset text-2xl"></i>
                    </div>
                    <h3 class="text-xl font-bold">Student Support</h3>
                    <p class="text-purple-100">24/7 assistance and guidance</p>
                </div>
                <div class="p-6">
                    <p class="text-gray-600">
                        Our support team is always available to answer your questions and provide assistance.
                    </p>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Statistics Section -->
<section class="py-16 bg-blue-600 text-white">
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
            <a href="{{ route('consultation.store') }}" 
               class="bg-blue-600 text-white px-8 py-3 rounded-lg hover:bg-blue-700 transition-colors duration-200 font-semibold">
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

