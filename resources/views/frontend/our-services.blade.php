@extends('layouts.app')

@section('content')
<!-- Hero Section -->
<section class="bg-gradient-to-r from-primary to-blue-600 text-white py-20">
    <div class="container mx-auto px-4 text-center">
        <h1 class="text-4xl md:text-6xl font-bold mb-6" data-aos="fade-up">Services for Students</h1>
        <p class="text-xl md:text-2xl mb-8 max-w-3xl mx-auto" data-aos="fade-up" data-aos-delay="100">
            Your trusted partner for international education consulting and study abroad guidance
        </p>
        <div class="flex justify-center space-x-4" data-aos="fade-up" data-aos-delay="200">
            <a href="{{ route('home') }}#consultation" class="bg-white text-primary px-6 py-3 rounded-lg font-semibold hover:bg-gray-100 transition-colors duration-200">
                Apply Now
            </a>
            <a href="#services" class="border-2 border-white text-white px-6 py-3 rounded-lg font-semibold hover:bg-white hover:text-primary transition-colors duration-200">
                Explore Services
            </a>
        </div>
    </div>
</section>

<!-- Services Section -->
<section id="services" class="py-16 bg-white">
    <div class="container mx-auto px-4">
        
        <!-- Student Counselling -->
        <div class="mb-20" data-aos="fade-up">
            <div class="max-w-4xl mx-auto">
                <h2 class="text-3xl md:text-4xl font-bold text-gray-800 mb-6 text-center">Student Counselling</h2>
                <p class="text-lg text-gray-600 mb-8 text-center max-w-3xl mx-auto">
                    At Scholars Global Network, we simplify your study abroad journey through personalized consultations. Our goal is to provide accurate information and guidance to help you make informed decisions.
                </p>
                <p class="text-lg text-gray-600 mb-12 text-center max-w-3xl mx-auto">
                    We are partnered with over 230+ educational institutions across Australia, Canada, Denmark, New Zealand, Sweden, the UK & the USA. Our counselors will evaluate your academic achievements, financial situation, and other factors to help you choose the best university for you.
                </p>
                
                <div class="bg-gradient-to-br from-gray-50 to-gray-100 rounded-2xl p-8 shadow-lg">
                    <h3 class="text-2xl font-bold text-gray-800 mb-8 text-center">What we discuss</h3>
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-8">
                        <div class="group bg-white rounded-xl p-6 shadow-md hover:shadow-xl transition-all duration-300 hover:-translate-y-1">
                            <div class="flex items-center mb-4">
                                <div class="w-12 h-12 bg-gradient-to-r from-primary to-blue-600 text-white rounded-xl flex items-center justify-center font-bold text-lg shadow-lg">01</div>
                                <div class="ml-4">
                                    <h4 class="font-bold text-gray-800 text-lg group-hover:text-primary transition-colors">Academic Assessment</h4>
                                </div>
                            </div>
                            <p class="text-gray-600 leading-relaxed">We review your academic background and career interests to create a personalized study plan.</p>
                        </div>
                        <div class="group bg-white rounded-xl p-6 shadow-md hover:shadow-xl transition-all duration-300 hover:-translate-y-1">
                            <div class="flex items-center mb-4">
                                <div class="w-12 h-12 bg-gradient-to-r from-primary to-blue-600 text-white rounded-xl flex items-center justify-center font-bold text-lg shadow-lg">02</div>
                                <div class="ml-4">
                                    <h4 class="font-bold text-gray-800 text-lg group-hover:text-primary transition-colors">University Selection</h4>
                                </div>
                            </div>
                            <p class="text-gray-600 leading-relaxed">We assist you in selecting the right university based on your preferences and requirements.</p>
                        </div>
                        <div class="group bg-white rounded-xl p-6 shadow-md hover:shadow-xl transition-all duration-300 hover:-translate-y-1">
                            <div class="flex items-center mb-4">
                                <div class="w-12 h-12 bg-gradient-to-r from-primary to-blue-600 text-white rounded-xl flex items-center justify-center font-bold text-lg shadow-lg">03</div>
                                <div class="ml-4">
                                    <h4 class="font-bold text-gray-800 text-lg group-hover:text-primary transition-colors">Scholarship Opportunities</h4>
                                </div>
                            </div>
                            <p class="text-gray-600 leading-relaxed">We guide you in finding and applying for scholarships based on your academic achievements.</p>
                        </div>
                        <div class="group bg-white rounded-xl p-6 shadow-md hover:shadow-xl transition-all duration-300 hover:-translate-y-1">
                            <div class="flex items-center mb-4">
                                <div class="w-12 h-12 bg-gradient-to-r from-primary to-blue-600 text-white rounded-xl flex items-center justify-center font-bold text-lg shadow-lg">04</div>
                                <div class="ml-4">
                                    <h4 class="font-bold text-gray-800 text-lg group-hover:text-primary transition-colors">Financial Planning</h4>
                                </div>
                            </div>
                            <p class="text-gray-600 leading-relaxed">We help you find affordable study options and plan your education budget effectively.</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- University Application -->
        <div class="mb-20" data-aos="fade-up">
            <div class="max-w-4xl mx-auto">
                <h2 class="text-3xl md:text-4xl font-bold text-gray-800 mb-6 text-center">University Application</h2>
                <p class="text-lg text-gray-600 mb-8 text-center max-w-3xl mx-auto">
                    With direct partnerships with <strong>230+ top universities worldwide</strong>, Scholars Global Network makes your application process faster, smoother, and more reliable. Our expert counselors work closely with students to ensure every detail of the university application is done right — maximizing your chances of admission.
                </p>
                
                <div class="bg-gradient-to-br from-gray-50 to-gray-100 rounded-2xl p-8 shadow-lg">
                    <h3 class="text-2xl font-bold text-gray-800 mb-8 text-center">What we do</h3>
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                        <div class="group bg-white rounded-xl p-6 shadow-md hover:shadow-xl transition-all duration-300 hover:-translate-y-1">
                            <div class="flex items-center mb-4">
                                <div class="w-10 h-10 bg-gradient-to-r from-green-500 to-emerald-600 text-white rounded-lg flex items-center justify-center shadow-lg">
                                    <i class="fas fa-university text-sm"></i>
                                </div>
                                <h4 class="font-bold text-gray-800 ml-4 group-hover:text-primary transition-colors">University Matching</h4>
                            </div>
                            <p class="text-gray-600 leading-relaxed">Match you with the best-fit universities from our 230+ global partners</p>
                        </div>
                        <div class="group bg-white rounded-xl p-6 shadow-md hover:shadow-xl transition-all duration-300 hover:-translate-y-1">
                            <div class="flex items-center mb-4">
                                <div class="w-10 h-10 bg-gradient-to-r from-blue-500 to-cyan-600 text-white rounded-lg flex items-center justify-center shadow-lg">
                                    <i class="fas fa-file-alt text-sm"></i>
                                </div>
                                <h4 class="font-bold text-gray-800 ml-4 group-hover:text-primary transition-colors">Document Preparation</h4>
                            </div>
                            <p class="text-gray-600 leading-relaxed">Guide you in preparing all required documents</p>
                        </div>
                        <div class="group bg-white rounded-xl p-6 shadow-md hover:shadow-xl transition-all duration-300 hover:-translate-y-1">
                            <div class="flex items-center mb-4">
                                <div class="w-10 h-10 bg-gradient-to-r from-purple-500 to-violet-600 text-white rounded-lg flex items-center justify-center shadow-lg">
                                    <i class="fas fa-paper-plane text-sm"></i>
                                </div>
                                <h4 class="font-bold text-gray-800 ml-4 group-hover:text-primary transition-colors">Application Submission</h4>
                            </div>
                            <p class="text-gray-600 leading-relaxed">Ensure accurate and timely application submissions</p>
                        </div>
                        <div class="group bg-white rounded-xl p-6 shadow-md hover:shadow-xl transition-all duration-300 hover:-translate-y-1">
                            <div class="flex items-center mb-4">
                                <div class="w-10 h-10 bg-gradient-to-r from-orange-500 to-red-600 text-white rounded-lg flex items-center justify-center shadow-lg">
                                    <i class="fas fa-comments text-sm"></i>
                                </div>
                                <h4 class="font-bold text-gray-800 ml-4 group-hover:text-primary transition-colors">Communication Support</h4>
                            </div>
                            <p class="text-gray-600 leading-relaxed">Assist with university portals and communication</p>
                        </div>
                    </div>
                    <div class="mt-8 text-center">
                        <a href="{{ route('contact') }}" class="inline-block bg-gradient-to-r from-primary to-blue-600 text-white px-8 py-4 rounded-xl font-semibold hover:shadow-lg transition-all duration-300 hover:-translate-y-1">
                            Request a callback
                        </a>
                    </div>
                </div>
            </div>
        </div>

        <!-- Visa Application Guidance -->
        <div class="mb-20" data-aos="fade-up">
            <div class="max-w-4xl mx-auto">
                <h2 class="text-3xl md:text-4xl font-bold text-gray-800 mb-6 text-center">Visa Application Guidance</h2>
                <p class="text-lg text-gray-600 mb-8 text-center max-w-3xl mx-auto">
                    Once you receive your university offer letter, our dedicated visa team steps in to guide you through the entire student visa process. With years of experience and updated knowledge of visa regulations, we ensure your application is strong, complete, and ready for approval.
                </p>
                
                <div class="bg-gradient-to-br from-gray-50 to-gray-100 rounded-2xl p-8 shadow-lg">
                    <h3 class="text-2xl font-bold text-gray-800 mb-8 text-center">What we do</h3>
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                        <div class="group bg-white rounded-xl p-6 shadow-md hover:shadow-xl transition-all duration-300 hover:-translate-y-1">
                            <div class="flex items-center mb-4">
                                <div class="w-10 h-10 bg-gradient-to-r from-indigo-500 to-purple-600 text-white rounded-lg flex items-center justify-center shadow-lg">
                                    <i class="fas fa-list-check text-sm"></i>
                                </div>
                                <h4 class="font-bold text-gray-800 ml-4 group-hover:text-primary transition-colors">Document Checklist</h4>
                            </div>
                            <p class="text-gray-600 leading-relaxed">Provide a detailed visa document checklist</p>
                        </div>
                        <div class="group bg-white rounded-xl p-6 shadow-md hover:shadow-xl transition-all duration-300 hover:-translate-y-1">
                            <div class="flex items-center mb-4">
                                <div class="w-10 h-10 bg-gradient-to-r from-teal-500 to-cyan-600 text-white rounded-lg flex items-center justify-center shadow-lg">
                                    <i class="fas fa-search text-sm"></i>
                                </div>
                                <h4 class="font-bold text-gray-800 ml-4 group-hover:text-primary transition-colors">Document Review</h4>
                            </div>
                            <p class="text-gray-600 leading-relaxed">Review and verify all required documents</p>
                        </div>
                        <div class="group bg-white rounded-xl p-6 shadow-md hover:shadow-xl transition-all duration-300 hover:-translate-y-1">
                            <div class="flex items-center mb-4">
                                <div class="w-10 h-10 bg-gradient-to-r from-pink-500 to-rose-600 text-white rounded-lg flex items-center justify-center shadow-lg">
                                    <i class="fas fa-user-graduate text-sm"></i>
                                </div>
                                <h4 class="font-bold text-gray-800 ml-4 group-hover:text-primary transition-colors">Interview Training</h4>
                            </div>
                            <p class="text-gray-600 leading-relaxed">Train you for the visa interview (if applicable)</p>
                        </div>
                        <div class="group bg-white rounded-xl p-6 shadow-md hover:shadow-xl transition-all duration-300 hover:-translate-y-1">
                            <div class="flex items-center mb-4">
                                <div class="w-10 h-10 bg-gradient-to-r from-amber-500 to-orange-600 text-white rounded-lg flex items-center justify-center shadow-lg">
                                    <i class="fas fa-file-invoice-dollar text-sm"></i>
                                </div>
                                <h4 class="font-bold text-gray-800 ml-4 group-hover:text-primary transition-colors">Financial Papers</h4>
                            </div>
                            <p class="text-gray-600 leading-relaxed">Guide you in preparing financial and sponsor papers</p>
                        </div>
                    </div>
                    <div class="mt-8 text-center">
                        <a href="{{ route('contact') }}" class="inline-block bg-gradient-to-r from-primary to-blue-600 text-white px-8 py-4 rounded-xl font-semibold hover:shadow-lg transition-all duration-300 hover:-translate-y-1">
                            Request a callback
                        </a>
                    </div>
                </div>
            </div>
        </div>

        <!-- Accommodation Advice -->
        <div class="mb-20" data-aos="fade-up">
            <div class="max-w-4xl mx-auto">
                <h2 class="text-3xl md:text-4xl font-bold text-gray-800 mb-6 text-center">Accommodation Advice</h2>
                <p class="text-lg text-gray-600 mb-8 text-center max-w-3xl mx-auto">
                    Finding a safe and comfortable place to live abroad is just as important as getting admission. At Scholars Global Network, we help you secure the right accommodation based on your budget, preferences, and university location — so you can settle in with peace of mind.
                </p>
                
                <div class="bg-gradient-to-br from-gray-50 to-gray-100 rounded-2xl p-8 shadow-lg">
                    <h3 class="text-2xl font-bold text-gray-800 mb-8 text-center">What we discuss</h3>
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                        <div class="group bg-white rounded-xl p-6 shadow-md hover:shadow-xl transition-all duration-300 hover:-translate-y-1">
                            <div class="flex items-center mb-4">
                                <div class="w-10 h-10 bg-gradient-to-r from-emerald-500 to-green-600 text-white rounded-lg flex items-center justify-center shadow-lg">
                                    <i class="fas fa-home text-sm"></i>
                                </div>
                                <h4 class="font-bold text-gray-800 ml-4 group-hover:text-primary transition-colors">Housing Options</h4>
                            </div>
                            <p class="text-gray-600 leading-relaxed">Provide guidance on on-campus and off-campus housing options</p>
                        </div>
                        <div class="group bg-white rounded-xl p-6 shadow-md hover:shadow-xl transition-all duration-300 hover:-translate-y-1">
                            <div class="flex items-center mb-4">
                                <div class="w-10 h-10 bg-gradient-to-r from-sky-500 to-blue-600 text-white rounded-lg flex items-center justify-center shadow-lg">
                                    <i class="fas fa-handshake text-sm"></i>
                                </div>
                                <h4 class="font-bold text-gray-800 ml-4 group-hover:text-primary transition-colors">Verified Providers</h4>
                            </div>
                            <p class="text-gray-600 leading-relaxed">Assist in connecting with verified student accommodation providers</p>
                        </div>
                        <div class="group bg-white rounded-xl p-6 shadow-md hover:shadow-xl transition-all duration-300 hover:-translate-y-1">
                            <div class="flex items-center mb-4">
                                <div class="w-10 h-10 bg-gradient-to-r from-violet-500 to-purple-600 text-white rounded-lg flex items-center justify-center shadow-lg">
                                    <i class="fas fa-balance-scale text-sm"></i>
                                </div>
                                <h4 class="font-bold text-gray-800 ml-4 group-hover:text-primary transition-colors">Comparison Support</h4>
                            </div>
                            <p class="text-gray-600 leading-relaxed">Help you compare rent, facilities, and locations</p>
                        </div>
                        <div class="group bg-white rounded-xl p-6 shadow-md hover:shadow-xl transition-all duration-300 hover:-translate-y-1">
                            <div class="flex items-center mb-4">
                                <div class="w-10 h-10 bg-gradient-to-r from-rose-500 to-pink-600 text-white rounded-lg flex items-center justify-center shadow-lg">
                                    <i class="fas fa-calendar-check text-sm"></i>
                                </div>
                                <h4 class="font-bold text-gray-800 ml-4 group-hover:text-primary transition-colors">Pre-Booking</h4>
                            </div>
                            <p class="text-gray-600 leading-relaxed">Support in booking your accommodation before you fly</p>
                        </div>
                    </div>
                    <div class="mt-8 text-center">
                        <a href="{{ route('contact') }}" class="inline-block bg-gradient-to-r from-primary to-blue-600 text-white px-8 py-4 rounded-xl font-semibold hover:shadow-lg transition-all duration-300 hover:-translate-y-1">
                            Request a callback
                        </a>
                    </div>
                </div>
            </div>
        </div>

        <!-- Pre-Departure Briefing -->
        <div class="mb-20" data-aos="fade-up">
            <div class="max-w-4xl mx-auto">
                <h2 class="text-3xl md:text-4xl font-bold text-gray-800 mb-6 text-center">Pre-Departure Briefing</h2>
                <p class="text-lg text-gray-600 mb-8 text-center max-w-3xl mx-auto">
                    Before you take off, we prepare you for a smooth transition into your new academic and cultural life abroad. Our pre-departure briefing covers everything you need to know — from travel tips to adapting in a new country — so you arrive informed and confident.
                </p>
                
                <div class="bg-gradient-to-br from-gray-50 to-gray-100 rounded-2xl p-8 shadow-lg">
                    <h3 class="text-2xl font-bold text-gray-800 mb-8 text-center">What we discuss</h3>
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                        <div class="group bg-white rounded-xl p-6 shadow-md hover:shadow-xl transition-all duration-300 hover:-translate-y-1">
                            <div class="flex items-center mb-4">
                                <div class="w-10 h-10 bg-gradient-to-r from-blue-500 to-indigo-600 text-white rounded-lg flex items-center justify-center shadow-lg">
                                    <i class="fas fa-plane text-sm"></i>
                                </div>
                                <h4 class="font-bold text-gray-800 ml-4 group-hover:text-primary transition-colors">Travel Guidelines</h4>
                            </div>
                            <p class="text-gray-600 leading-relaxed">Share travel guidelines and airport procedures</p>
                        </div>
                        <div class="group bg-white rounded-xl p-6 shadow-md hover:shadow-xl transition-all duration-300 hover:-translate-y-1">
                            <div class="flex items-center mb-4">
                                <div class="w-10 h-10 bg-gradient-to-r from-green-500 to-teal-600 text-white rounded-lg flex items-center justify-center shadow-lg">
                                    <i class="fas fa-suitcase text-sm"></i>
                                </div>
                                <h4 class="font-bold text-gray-800 ml-4 group-hover:text-primary transition-colors">Essential Items</h4>
                            </div>
                            <p class="text-gray-600 leading-relaxed">Advise on baggage, currency, and essential items to carry</p>
                        </div>
                        <div class="group bg-white rounded-xl p-6 shadow-md hover:shadow-xl transition-all duration-300 hover:-translate-y-1">
                            <div class="flex items-center mb-4">
                                <div class="w-10 h-10 bg-gradient-to-r from-purple-500 to-violet-600 text-white rounded-lg flex items-center justify-center shadow-lg">
                                    <i class="fas fa-globe text-sm"></i>
                                </div>
                                <h4 class="font-bold text-gray-800 ml-4 group-hover:text-primary transition-colors">Cultural Adaptation</h4>
                            </div>
                            <p class="text-gray-600 leading-relaxed">Discuss cultural differences and student life abroad</p>
                        </div>
                        <div class="group bg-white rounded-xl p-6 shadow-md hover:shadow-xl transition-all duration-300 hover:-translate-y-1">
                            <div class="flex items-center mb-4">
                                <div class="w-10 h-10 bg-gradient-to-r from-red-500 to-pink-600 text-white rounded-lg flex items-center justify-center shadow-lg">
                                    <i class="fas fa-shield-alt text-sm"></i>
                                </div>
                                <h4 class="font-bold text-gray-800 ml-4 group-hover:text-primary transition-colors">Safety & Support</h4>
                            </div>
                            <p class="text-gray-600 leading-relaxed">Provide emergency contacts and safety tips</p>
                        </div>
                    </div>
                    <div class="mt-8 text-center">
                        <a href="{{ route('contact') }}" class="inline-block bg-gradient-to-r from-primary to-blue-600 text-white px-8 py-4 rounded-xl font-semibold hover:shadow-lg transition-all duration-300 hover:-translate-y-1">
                            Request a callback
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Call to Action Section -->
<section class="py-16 bg-gray-50">
    <div class="container mx-auto px-4 text-center">
        <h2 class="text-3xl md:text-4xl font-bold text-gray-800 mb-6" data-aos="fade-up">Looking for a one-stop solution?</h2>
        <p class="text-xl text-gray-600 mb-8 max-w-2xl mx-auto" data-aos="fade-up" data-aos-delay="100">
            Let us guide you through every step.
        </p>
        <div class="flex justify-center" data-aos="fade-up" data-aos-delay="200">
            <a href="{{ route('home') }}#consultation" class="bg-primary text-white px-8 py-4 rounded-lg font-semibold hover:bg-primary-dark transition-colors duration-200 text-lg">
                Apply now
            </a>
        </div>
    </div>
</section>
@endsection
