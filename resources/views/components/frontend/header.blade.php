@props(['header' => 'header1'   ])

@php
    $header = [
        'logo' => asset('images/logo.png'),
        'title' => 'Scholars Zone Global',
    ];
@endphp

<!-- Header -->
<header class="bg-white shadow-lg sticky top-0 z-50">
    <div class="container mx-auto px-4">
        <div class="flex justify-between items-center py-4">
            <div class="flex items-center">
                <div
                    class="w-16 h-16 flex items-center justify-center mr-3"
                >
                    <img src="{{ $header['logo'] }}" alt="{{ $header['title'] }}" class="w-full h-full object-cover">
                </div>
                <h1 class="text-2xl font-bold text-purple-800">
                    {{ $header['title'] }}
                </h1>
            </div>
            <nav class="hidden md:flex space-x-8">
                <a
                    href="#home"
                    class="text-gray-700 hover:text-purple-600 transition"
                >Home</a
                >
                <a
                    href="#about"
                    class="text-gray-700 hover:text-purple-600 transition"
                >About</a>
                <a
                    href="#services"
                    class="text-gray-700 hover:text-purple-600 transition"
                >Services</a
                >
                <a
                    href="#destinations"
                    class="text-gray-700 hover:text-purple-600 transition"
                >Destinations</a
                >
                <a
                    href="#blog"
                    class="text-gray-700 hover:text-purple-600 transition"
                >Blog</a
                >
                <a
                    href="#contact"
                    class="text-gray-700 hover:text-purple-600 transition"
                >Contact</a
                >
            </nav>
            <button
                class="md:hidden text-gray-700"
                onclick="toggleMobileMenu()"
            >
                <i class="fas fa-bars text-xl"></i>
            </button>
        </div>
    </div>
</header>
