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
                        <x-social-media color="text-gray-400" hoverColor="hover:text-purple-400" />
                    </div>

                    <div>
                        <h4 class="text-lg font-semibold mb-4">Quick Links</h4>
                        <ul class="space-y-2 text-gray-400">
                            <li>
                                <a
                                    href="#"
                                    class="hover:text-purple-400 transition"
                                    >About Us</a
                                >
                            </li>
                            <li>
                                <a
                                    href="#"
                                    class="hover:text-purple-400 transition"
                                    >Services</a
                                >
                            </li>
                            <li>
                                <a
                                    href="#"
                                    class="hover:text-purple-400 transition"
                                    >Destinations</a
                                >
                            </li>
                            <li>
                                <a
                                    href="#"
                                    class="hover:text-purple-400 transition"
                                    >Success Stories</a
                                >
                            </li>
                            <li>
                                <a
                                    href="#"
                                    class="hover:text-purple-400 transition"
                                    >Blog</a
                                >
                            </li>
                            <li>
                                <a
                                    href="{{ route('contact') }}"
                                    class="hover:text-purple-400 transition"
                                    >Contact Us</a
                                >
                            </li>
                        </ul>
                    </div>

                    <div>
                        <h4 class="text-lg font-semibold mb-4">
                            Study Destinations
                        </h4>
                        <ul class="space-y-2 text-gray-400">
                            <li>
                                <a
                                    href="#"
                                    class="hover:text-purple-400 transition"
                                    >United States</a
                                >
                            </li>
                            <li>
                                <a
                                    href="#"
                                    class="hover:text-purple-400 transition"
                                    >United Kingdom</a
                                >
                            </li>
                            <li>
                                <a
                                    href="#"
                                    class="hover:text-purple-400 transition"
                                    >Canada</a
                                >
                            </li>
                            <li>
                                <a
                                    href="#"
                                    class="hover:text-purple-400 transition"
                                    >Australia</a
                                >
                            </li>
                            <li>
                                <a
                                    href="#"
                                    class="hover:text-purple-400 transition"
                                    >Germany</a
                                >
                            </li>
                        </ul>
                    </div>

                    <div>
                        <h4 class="text-lg font-semibold mb-4">Contact Info</h4>
                        <div class="space-y-3 text-gray-400">
                            @php
                                use App\Helpers\SettingsHelper;
                            @endphp
                            <div class="flex items-center">
                                <i class="fas fa-map-marker-alt mr-3"></i>
                                <span>{{ SettingsHelper::contactAddress() }}</span>
                            </div>
                            <div class="flex items-center">
                                <i class="fas fa-phone mr-3"></i>
                                <span>{{ SettingsHelper::footerPhone() }}</span>
                            </div>
                            <div class="flex items-center">
                                <i class="fas fa-envelope mr-3"></i>
                                <span>{{ SettingsHelper::footerEmail() }}</span>
                            </div>
                            <div class="flex items-center">
                                <i class="fas fa-clock mr-3"></i>
                                <span>{{ SettingsHelper::businessHours() }}</span>
                            </div>
                        </div>
                    </div>
                </div>

                <div
                    class="border-t border-gray-700 mt-12 pt-8 text-center text-gray-400"
                >
                    <p>
                        &copy; 2025 Scholars Zone Global. All rights reserved. |
                        Privacy Policy | Terms of Service
                    </p>
                </div>
            </div>
        </footer>
