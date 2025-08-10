<!-- Free Consultation Form -->
<section class="py-16 purple-gradient" id="contact">
    <div class="container mx-auto px-4">
        <div class="max-w-4xl mx-auto">
            <div class="text-center mb-12" data-aos="fade-up">
                <h2 class="text-4xl font-bold text-white mb-4">
                    Book Your Free Consultation
                </h2>
                <p class="text-purple-100 text-lg">
                    Get expert advice on your study abroad journey -
                    completely free!
                </p>
            </div>

            <div
                class="bg-white rounded-lg shadow-lg p-8"
                data-aos="fade-up"
            >
                <form id="consultation-form" class="grid md:grid-cols-2 gap-6" action="{{ route('consultation.store') }}" method="POST">
                    @csrf
                    
                    <!-- Success/Error Messages -->
                    <div id="form-messages" class="md:col-span-2 hidden">
                        <div id="success-message" class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded mb-4 hidden">
                        </div>
                        <div id="error-message" class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded mb-4 hidden">
                        </div>
                    </div>
                    <div>
                        <label
                            class="block text-gray-700 font-semibold mb-2"
                            >First Name *</label
                        >
                        <input
                            type="text"
                            name="first_name"
                            class="w-full px-4 py-3 border rounded-lg focus:outline-none focus:ring-2 focus:ring-purple-500"
                            placeholder="Your first name"
                            required
                        />
                    </div>

                    <div>
                        <label
                            class="block text-gray-700 font-semibold mb-2"
                            >Last Name *</label
                        >
                        <input
                            type="text"
                            name="last_name"
                            class="w-full px-4 py-3 border rounded-lg focus:outline-none focus:ring-2 focus:ring-purple-500"
                            placeholder="Your last name"
                            required
                        />
                    </div>

                    <div>
                        <label
                            class="block text-gray-700 font-semibold mb-2"
                            >Email Address *</label
                        >
                        <input
                            type="email"
                            name="email"
                            class="w-full px-4 py-3 border rounded-lg focus:outline-none focus:ring-2 focus:ring-purple-500"
                            placeholder="your@email.com"
                            required
                        />
                    </div>

                    <div>
                        <label
                            class="block text-gray-700 font-semibold mb-2"
                            >Phone Number *</label
                        >
                        <input
                            type="tel"
                            name="phone"
                            class="w-full px-4 py-3 border rounded-lg focus:outline-none focus:ring-2 focus:ring-purple-500"
                            placeholder="+880 1234 567890"
                            required
                        />
                    </div>

                    <div>
                        <label
                            class="block text-gray-700 font-semibold mb-2"
                            >Preferred Country</label
                        >
                        <select
                            name="preferred_country"
                            class="w-full px-4 py-3 border rounded-lg focus:outline-none focus:ring-2 focus:ring-purple-500"
                        >
                            <option value="">Select a country</option>
                            <option value="United States">United States</option>
                            <option value="United Kingdom">United Kingdom</option>
                            <option value="Canada">Canada</option>
                            <option value="Australia">Australia</option>
                            <option value="Germany">Germany</option>
                        </select>
                    </div>

                    <div>
                        <label
                            class="block text-gray-700 font-semibold mb-2"
                            >Study Level</label
                        >
                        <select
                            name="study_level"
                            class="w-full px-4 py-3 border rounded-lg focus:outline-none focus:ring-2 focus:ring-purple-500"
                        >
                            <option value="">Select study level</option>
                            <option value="Bachelor's Degree">Bachelor's Degree</option>
                            <option value="Master's Degree">Master's Degree</option>
                            <option value="PhD">PhD</option>
                            <option value="Diploma">Diploma</option>
                        </select>
                    </div>

                    <div>
                        <label
                            class="block text-gray-700 font-semibold mb-2"
                            >Preferred Subject</label
                        >
                        <select
                            name="preferred_subject"
                            class="w-full px-4 py-3 border rounded-lg focus:outline-none focus:ring-2 focus:ring-purple-500"
                        >
                            <option value="">Select subject area</option>
                            <option value="Computer Science">Computer Science</option>
                            <option value="Engineering">Engineering</option>
                            <option value="Business & Management">Business & Management</option>
                            <option value="Medicine & Health">Medicine & Health</option>
                            <option value="Arts & Design">Arts & Design</option>
                            <option value="Social Sciences">Social Sciences</option>
                            <option value="Natural Sciences">Natural Sciences</option>
                            <option value="Law">Law</option>
                        </select>
                    </div>

                    <div>
                        <label
                            class="block text-gray-700 font-semibold mb-2"
                            >Preferred Intake</label
                        >
                        <select
                            name="preferred_intake"
                            class="w-full px-4 py-3 border rounded-lg focus:outline-none focus:ring-2 focus:ring-purple-500"
                        >
                            <option value="">Select intake</option>
                            <option value="Fall 2024">Fall 2024</option>
                            <option value="Spring 2025">Spring 2025</option>
                            <option value="Summer 2025">Summer 2025</option>
                            <option value="Fall 2025">Fall 2025</option>
                        </select>
                    </div>

                    <div class="md:col-span-2">
                        <label
                            class="block text-gray-700 font-semibold mb-2"
                            >Message</label
                        >
                        <textarea
                            name="message"
                            class="w-full px-4 py-3 border rounded-lg focus:outline-none focus:ring-2 focus:ring-purple-500"
                            rows="4"
                            placeholder="Tell us about your study goals and any specific questions..."
                        ></textarea>
                    </div>

                    <div class="md:col-span-2 text-center">
                        <button
                            type="submit"
                            class="bg-purple-600 text-white px-8 py-3 rounded-lg font-semibold hover:bg-purple-700 transition"
                        >
                            <i class="fas fa-calendar-alt mr-2"></i>Book
                            Free Consultation
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</section>
