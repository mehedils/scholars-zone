 <footer class="bg-gray-800 text-white py-16">
            <div class="container mx-auto px-4">
                <div class="grid md:grid-cols-4 gap-8">
                    <div>
                        <div class="flex items-center mb-6">
                            <div
                                class="w-10 h-10 rounded-lg flex items-center justify-center mr-3"
                            >
                            <img src="@siteLogo" alt="logo" class="w-10 h-10">
                            </div>
                            <h3 class="text-xl font-bold">
                                @siteName
                            </h3>
                        </div>
                        <p class="text-gray-400 mb-4">
                            Your trusted partner for studying abroad. We help
                            Bangladeshi students achieve their dreams of
                            international education.
                        </p>
                        <x-social-media color="text-gray-400" hoverColor="hover:text-primary" />
                    </div>

                    <div>
                        <h3 class="text-lg font-semibold mb-4">Quick Links</h3>
                        <ul class="space-y-2">
                            <li>
                                <a href="{{ route('home') }}" 
                                   class="hover:text-primary transition">Home</a>
                            </li>
                            <li>
                                <a href="{{ route('about') }}" 
                                   class="hover:text-primary transition">About Us</a>
                            </li>
                            <li>
                                <a href="{{ route('our-services') }}" 
                                   class="hover:text-primary transition">Our Services</a>
                            </li>
                            <li>
                                <a href="{{ route('destinations.index') }}" 
                                   class="hover:text-primary transition">Destinations</a>
                            </li>
                            <li>
                                <a href="{{ route('success-stories.index') }}" 
                                   class="hover:text-primary transition">Success Stories</a>
                            </li>
                            <li>
                                <a href="{{ route('contact') }}" 
                                   class="hover:text-primary transition">Contact</a>
                            </li>
                        </ul>
                    </div>

                    <div>
                        <h3 class="text-lg font-semibold mb-4">Services</h3>
                        <ul class="space-y-2">
                            <li>
                                <a href="{{ route('our-services') }}" 
                                   class="hover:text-primary transition">University Selection</a>
                            </li>
                            <li>
                                <a href="{{ route('our-services') }}" 
                                   class="hover:text-primary transition">Visa Application</a>
                            </li>
                            <li>
                                <a href="{{ route('our-services') }}" 
                                   class="hover:text-primary transition">Documentation</a>
                            </li>
                            <li>
                                <a href="{{ route('our-services') }}" 
                                   class="hover:text-primary transition">Financial Planning</a>
                            </li>
                            <li>
                                <a href="{{ route('our-services') }}" 
                                   class="hover:text-primary transition">Travel Support</a>
                            </li>
                        </ul>
                    </div>

                    <div>
                        <h3 class="text-lg font-semibold mb-4">Contact Info</h3>
                        <div class="space-y-3">
                            <div class="flex items-center">
                                <i class="fas fa-map-marker-alt mr-3 text-primary"></i>
                                <span class="text-gray-400">Mirpur-1, Dhaka-1216, Bangladesh</span>
                            </div>
                            <div class="flex items-center">
                                <i class="fas fa-phone mr-3 text-primary"></i>
                                <span class="text-gray-400">@contactPhone</span>
                            </div>
                            <div class="flex items-center">
                                <i class="fas fa-envelope mr-3 text-primary"></i>
                                <span class="text-gray-400">@contactEmail</span>
                            </div>
                        </div>
                        
                        <div class="mt-6">
                            <h4 class="text-md font-semibold mb-3">Newsletter</h4>
                            <div class="flex">
                                <input type="email" 
                                       placeholder="Your email" 
                                       class="flex-1 px-3 py-2 bg-gray-700 text-white rounded-l-lg focus:outline-none focus:ring-2 focus:ring-primary">
                                <button class="px-4 py-2 bg-primary text-white rounded-r-lg hover:bg-primary-dark transition-colors">
                                    <i class="fas fa-paper-plane"></i>
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
                
                <div class="border-t border-gray-700 mt-12 pt-8 text-center">
                    <p class="text-gray-400">
                        © {{ date('Y') }} @siteName. All rights reserved.
                    </p>
                </div>
            </div>
        </footer>
