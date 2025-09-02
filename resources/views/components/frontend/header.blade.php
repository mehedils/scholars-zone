<!-- Header -->
<header class="bg-white shadow-lg sticky top-0 z-50">
    <div class="container mx-auto px-4">
        <div class="flex justify-between items-center py-4">
            <a href="{{route("home")}}">
            <div class="flex items-center">
                <div
                    class="w-16 h-16 flex items-center justify-center mr-3"
                >
                    <img src="@siteLogo" alt="@siteName" class="w-full h-full object-cover">
                </div>
                <h1 class="text-2xl font-bold text-purple-800">
                    @siteName
                </h1>
            </div>
            </a>
            <nav class="hidden md:flex space-x-8">
                <a
                    href="#home"
                    class="text-gray-700 hover:text-purple-600 transition"
                >Home</a
                >
                <a
                    href="{{ route('about') }}"
                    class="text-gray-700 hover:text-purple-600 transition"
                >About</a>
                <a
                    href="{{ route('our-services') }}"
                    class="text-gray-700 hover:text-purple-600 transition"
                >Our Services</a
                >
                <a
                    href="{{ route('destinations.index') }}"
                    class="text-gray-700 hover:text-purple-600 transition"
                >Destinations</a
                >
                <a
                    href="#blog"
                    class="text-gray-700 hover:text-purple-600 transition"
                >Blog</a
                >
                <a
                    href="{{ route('contact') }}"
                    class="text-gray-700 hover:text-purple-600 transition"
                >Contact</a
                >
            </nav>
            <button
                id="mobile-menu-button"
                class="md:hidden text-gray-700 relative z-50"
                onclick="toggleMobileMenu()"
            >
                <i id="hamburger-icon" class="fas fa-bars text-xl transition-all duration-300"></i>
                <i id="close-icon" class="fas fa-times text-xl absolute top-0 left-0 opacity-0 transition-all duration-300"></i>
            </button>
        </div>
    </div>

    <!-- Mobile Menu & Overlay (positioned below header) -->
    <div class="relative">
        <!-- Mobile Menu -->
        <div id="mobile-menu" class="md:hidden fixed left-0 right-0 top-20 bg-white transform translate-x-full transition-transform duration-300 ease-in-out z-40" style="height: calc(100vh - 5rem);">
            <div class="px-4 py-6 h-full overflow-y-auto">
                <nav class="flex flex-col space-y-6">
                    <a
                        href="#home"
                        class="text-lg text-gray-700 hover:text-purple-600 transition-colors duration-200 py-3 border-b border-gray-100"
                        onclick="closeMobileMenu()"
                    >
                        <i class="fas fa-home mr-3 text-purple-600"></i>Home
                    </a>
                    <a
                        href="{{ route('about') }}"
                        class="text-lg text-gray-700 hover:text-purple-600 transition-colors duration-200 py-3 border-b border-gray-100"
                        onclick="closeMobileMenu()"
                    >
                        <i class="fas fa-info-circle mr-3 text-purple-600"></i>About
                    </a>
                    <a
                        href="{{ route('our-services') }}"
                        class="text-lg text-gray-700 hover:text-purple-600 transition-colors duration-200 py-3 border-b border-gray-100"
                        onclick="closeMobileMenu()"
                    >
                        <i class="fas fa-cogs mr-3 text-purple-600"></i>Our Services
                    </a>
                    <a
                        href="{{ route('destinations.index') }}"
                        class="text-lg text-gray-700 hover:text-purple-600 transition-colors duration-200 py-3 border-b border-gray-100"
                        onclick="closeMobileMenu()"
                    >
                        <i class="fas fa-map-marker-alt mr-3 text-purple-600"></i>Destinations
                    </a>
                    <a
                        href="#blog"
                        class="text-lg text-gray-700 hover:text-purple-600 transition-colors duration-200 py-3 border-b border-gray-100"
                        onclick="closeMobileMenu()"
                    >
                        <i class="fas fa-blog mr-3 text-purple-600"></i>Blog
                    </a>
                    <a
                        href="{{ route('contact') }}"
                        class="text-lg text-gray-700 hover:text-purple-600 transition-colors duration-200 py-3 border-b border-gray-100"
                        onclick="closeMobileMenu()"
                    >
                        <i class="fas fa-envelope mr-3 text-purple-600"></i>Contact
                    </a>
                </nav>

                <!-- Additional mobile menu content -->
                <div class="mt-8 pt-6 border-t border-gray-200">
                    <div class="text-center">
                        <h3 class="text-lg font-semibold text-purple-800 mb-4">Get Started Today</h3>
                        <a href="#contact"
                           class="inline-block bg-purple-600 text-white px-6 py-3 rounded-lg hover:bg-purple-700 transition-colors duration-200"
                           onclick="closeMobileMenu()">
                            Book Consultation
                        </a>
                    </div>
                </div>
            </div>
        </div>
        <!-- Mobile Menu Overlay -->
        <div id="mobile-menu-overlay" class="md:hidden fixed left-0 right-0 top-20 bg-black bg-opacity-50 opacity-0 pointer-events-none transition-opacity duration-300 z-30" style="height: calc(100vh - 5rem);"></div>
    </div>
</header>
