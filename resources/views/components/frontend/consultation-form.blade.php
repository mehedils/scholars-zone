<!-- Free Consultation Form -->
<section class="py-16 bg-primary" id="consultation">
    <div class="container mx-auto px-4">
        <div class="max-w-4xl mx-auto">
            <div class="text-center mb-12" data-aos="fade-up">
                <h2 class="text-4xl font-bold text-white mb-4">
                    Book Your Free Consultation
                </h2>
                <p class="text-primary-light text-lg">
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
                            class="w-full px-4 py-3 border rounded-lg focus:outline-none focus:ring-2 focus:ring-primary"
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
                            class="w-full px-4 py-3 border rounded-lg focus:outline-none focus:ring-2 focus:ring-primary"
                            placeholder="Your last name"
                            required
                        />
                    </div>

                    <div>
                        <label
                            class="block text-gray-700 font-semibold mb-2"
                            >Email *</label
                        >
                        <input
                            type="email"
                            name="email"
                            class="w-full px-4 py-3 border rounded-lg focus:outline-none focus:ring-2 focus:ring-primary"
                            placeholder="your.email@example.com"
                            required
                        />
                    </div>

                    <div>
                        <label
                            class="block text-gray-700 font-semibold mb-2"
                            >Phone *</label
                        >
                        <input
                            type="tel"
                            name="phone"
                            class="w-full px-4 py-3 border rounded-lg focus:outline-none focus:ring-2 focus:ring-primary"
                            placeholder="+880 1XXX XXX XXX"
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
                            class="w-full px-4 py-3 border rounded-lg focus:outline-none focus:ring-2 focus:ring-primary"
                        >
                            <option value="">Select country</option>
                            <option value="USA">United States</option>
                            <option value="UK">United Kingdom</option>
                            <option value="Canada">Canada</option>
                            <option value="Australia">Australia</option>
                            <option value="Germany">Germany</option>
                            <option value="New Zealand">New Zealand</option>
                            <option value="Ireland">Ireland</option>
                            <option value="Netherlands">Netherlands</option>
                            <option value="Sweden">Sweden</option>
                            <option value="Other">Other</option>
                        </select>
                    </div>

                    <div>
                        <label
                            class="block text-gray-700 font-semibold mb-2"
                            >Study Level</label
                        >
                        <select
                            name="study_level"
                            class="w-full px-4 py-3 border rounded-lg focus:outline-none focus:ring-2 focus:ring-primary"
                        >
                            <option value="">Select level</option>
                            <option value="High School">High School</option>
                            <option value="Undergraduate">Undergraduate</option>
                            <option value="Graduate">Graduate</option>
                            <option value="PhD">PhD</option>
                            <option value="Diploma">Diploma</option>
                            <option value="Certificate">Certificate</option>
                        </select>
                    </div>

                    <div>
                        <label
                            class="block text-gray-700 font-semibold mb-2"
                            >Preferred Subject</label
                        >
                        <select
                            name="preferred_subject"
                            class="w-full px-4 py-3 border rounded-lg focus:outline-none focus:ring-2 focus:ring-primary"
                        >
                            <option value="">Select subject</option>
                            <option value="Engineering">Engineering</option>
                            <option value="Computer Science">Computer Science</option>
                            <option value="Business">Business</option>
                            <option value="Medicine">Medicine</option>
                            <option value="Arts & Humanities">Arts & Humanities</option>
                            <option value="Social Sciences">Social Sciences</option>
                            <option value="Natural Sciences">Natural Sciences</option>
                            <option value="Other">Other</option>
                        </select>
                    </div>

                    <div>
                        <label
                            class="block text-gray-700 font-semibold mb-2"
                            >Preferred Intake</label
                        >
                        <select
                            name="preferred_intake"
                            class="w-full px-4 py-3 border rounded-lg focus:outline-none focus:ring-2 focus:ring-primary"
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
                            class="w-full px-4 py-3 border rounded-lg focus:outline-none focus:ring-2 focus:ring-primary"
                            rows="4"
                            placeholder="Tell us about your study goals and any specific questions..."
                        ></textarea>
                    </div>

                    <div class="md:col-span-2 text-center">
                        <button
                            type="submit"
                            class="bg-primary-dark text-white px-8 py-3 rounded-lg font-semibold hover:bg-primary transition"
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
