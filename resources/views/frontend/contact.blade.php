@php
use App\Helpers\SettingsHelper;
use Illuminate\Support\Collection;
@endphp


@extends('layouts.app')

@section('content')
<!-- Page Header -->
<section class="bg-gradient-to-r from-purple-600 to-blue-600 text-white py-16">
    <div class="container mx-auto px-4">
        <div class="text-center">
            <h1 class="text-4xl font-bold mb-4">Contact Us</h1>
            <p class="text-xl text-purple-100">
                Get in touch with our team for any questions or support
            </p>
        </div>
    </div>
</section>

<!-- Contact Information -->
<section class="py-16 bg-gray-50">
    <div class="container mx-auto px-4">
        <div class="grid grid-cols-1 lg:grid-cols-3 gap-8">
            <!-- Contact Info -->
            <div class="lg:col-span-1">
                <h2 class="text-3xl font-bold text-gray-900 mb-8">Get In Touch</h2>

                <div class="space-y-6">
                    <!-- Bangladesh Office -->
                    <div class="flex items-start space-x-4">
                        <div class="w-12 h-12 bg-purple-100 rounded-lg flex items-center justify-center flex-shrink-0">
                            <i class="fas fa-map-marker-alt text-purple-600 text-xl"></i>
                        </div>
                        <div>
                            <h3 class="text-lg font-semibold text-gray-900 mb-2">Bangladesh Office</h3>
                            <p class="text-gray-600">
                                <span>{{ SettingsHelper::contactAddress() }}</span>
                            </p>
                        </div>
                    </div>

                    <!-- USA Office -->
                    <div class="flex items-start space-x-4">
                        <div class="w-12 h-12 bg-red-100 rounded-lg flex items-center justify-center flex-shrink-0">
                            <i class="fas fa-map-marker-alt text-red-600 text-xl"></i>
                        </div>
                        <div>
                            <h3 class="text-lg font-semibold text-gray-900 mb-2">USA Office</h3>
                            <p class="text-gray-600">
                                <span>{{ SettingsHelper::contactAddressUsa() }}</span>
                            </p>
                        </div>
                    </div>

                    <!-- Phone -->
                    <div class="flex items-start space-x-4">
                        <div class="w-12 h-12 bg-blue-100 rounded-lg flex items-center justify-center flex-shrink-0">
                            <i class="fas fa-phone text-blue-600 text-xl"></i>
                        </div>
                        <div>
                            <h3 class="text-lg font-semibold text-gray-900 mb-2">Phone Numbers</h3>
                            <p class="text-gray-600">
                                <a href="tel:{{ SettingsHelper::contactPhone() }}" class="hover:text-blue-600 transition-colors block">
                                    {{ SettingsHelper::contactPhone() }}
                                </a>
                                <a href="tel:{{ SettingsHelper::secondaryPhone() }}" class="hover:text-blue-600 transition-colors block">
                                    {{ SettingsHelper::secondaryPhone() }}
                                </a>
                                <a href="tel:{{ SettingsHelper::tertiaryPhone() }}" class="hover:text-blue-600 transition-colors block">
                                    {{ SettingsHelper::tertiaryPhone() }}
                                </a>
                            </p>
                        </div>
                    </div>

                    <!-- Email -->
                    <div class="flex items-start space-x-4">
                        <div class="w-12 h-12 bg-green-100 rounded-lg flex items-center justify-center flex-shrink-0">
                            <i class="fas fa-envelope text-green-600 text-xl"></i>
                        </div>
                        <div>
                            <h3 class="text-lg font-semibold text-gray-900 mb-2">Email Addresses</h3>
                            <p class="text-gray-600">
                                <a href="mailto:{{ SettingsHelper::contactEmail() }}" class="hover:text-green-600 transition-colors block">
                                    {{ SettingsHelper::contactEmail() }}
                                </a>
                                <a href="mailto:{{ SettingsHelper::secondaryEmail() }}" class="hover:text-green-600 transition-colors block">
                                    {{ SettingsHelper::secondaryEmail() }}
                                </a>
                            </p>
                        </div>
                    </div>

                    <!-- Business Hours -->
                    <div class="flex items-start space-x-4">
                        <div class="w-12 h-12 bg-orange-100 rounded-lg flex items-center justify-center flex-shrink-0">
                            <i class="fas fa-clock text-orange-600 text-xl"></i>
                        </div>
                        <div>
                            <h3 class="text-lg font-semibold text-gray-900 mb-2">Business Hours</h3>
                            <p class="text-gray-600">
                                {{ SettingsHelper::businessHours() }}
                            </p>
                        </div>
                    </div>
                </div>

                <!-- Social Media -->
                <div class="mt-8">
                    <h3 class="text-lg font-semibold text-gray-900 mb-4">Follow Us</h3>
                    <div class="flex space-x-4">
                        @foreach(\App\Helpers\SettingsHelper::getEnabledSocialPlatforms() as $platform)
                            @php
                                $href = $platform['url'];
                                if (isset($platform['is_phone']) && $platform['is_phone']) {
                                    $href = 'https://wa.me/' . str_replace(['+', ' ', '-'], '', $platform['url']);
                                } elseif (isset($platform['is_username']) && $platform['is_username']) {
                                    $href = 'https://t.me/' . str_replace('@', '', $platform['url']);
                                }
                                
                                // Get platform-specific background color
                                $bgColor = 'bg-gray-600';
                                $hoverColor = 'hover:bg-gray-700';
                                
                                if (strpos($platform['icon'], 'facebook') !== false) {
                                    $bgColor = 'bg-blue-600';
                                    $hoverColor = 'hover:bg-blue-700';
                                } elseif (strpos($platform['icon'], 'twitter') !== false) {
                                    $bgColor = 'bg-blue-400';
                                    $hoverColor = 'hover:bg-blue-500';
                                } elseif (strpos($platform['icon'], 'instagram') !== false) {
                                    $bgColor = 'bg-pink-600';
                                    $hoverColor = 'hover:bg-pink-700';
                                } elseif (strpos($platform['icon'], 'linkedin') !== false) {
                                    $bgColor = 'bg-blue-800';
                                    $hoverColor = 'hover:bg-blue-900';
                                } elseif (strpos($platform['icon'], 'youtube') !== false) {
                                    $bgColor = 'bg-red-600';
                                    $hoverColor = 'hover:bg-red-700';
                                } elseif (strpos($platform['icon'], 'whatsapp') !== false) {
                                    $bgColor = 'bg-green-600';
                                    $hoverColor = 'hover:bg-green-700';
                                }
                            @endphp
                            
                            <a href="{{ $href }}" 
                               target="_blank" 
                               rel="noopener noreferrer"
                               class="w-10 h-10 {{ $bgColor }} rounded-lg flex items-center justify-center text-white {{ $hoverColor }} transition-colors"
                               title="{{ $platform['name'] }}">
                                <i class="{{ $platform['icon'] }}"></i>
                            </a>
                        @endforeach
                    </div>
                </div>
            </div>

            <!-- Contact Form -->
            <div class="lg:col-span-2">
                <div class="bg-white rounded-lg shadow-lg p-8">
                    <h2 class="text-3xl font-bold text-gray-900 mb-6">Send Us a Message</h2>

                    <!-- Success/Error Messages -->
                    <div id="contact-form-messages" class="mb-6 hidden">
                        <div id="contact-success-message" class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded hidden">
                        </div>
                        <div id="contact-error-message" class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded hidden">
                        </div>
                    </div>

                    <form id="contact-form" class="space-y-6">
                        @csrf

                        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                            <!-- Name -->
                            <div>
                                <label for="name" class="block text-sm font-medium text-gray-700 mb-2">
                                    Full Name *
                                </label>
                                <input
                                    type="text"
                                    id="name"
                                    name="name"
                                    class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-purple-500 focus:border-transparent"
                                    placeholder="Your full name"
                                    required
                                />
                            </div>

                            <!-- Email -->
                            <div>
                                <label for="email" class="block text-sm font-medium text-gray-700 mb-2">
                                    Email Address *
                                </label>
                                <input
                                    type="email"
                                    id="email"
                                    name="email"
                                    class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-purple-500 focus:border-transparent"
                                    placeholder="your@email.com"
                                    required
                                />
                            </div>
                        </div>

                        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                            <!-- Phone -->
                            <div>
                                <label for="phone" class="block text-sm font-medium text-gray-700 mb-2">
                                    Phone Number
                                </label>
                                <input
                                    type="tel"
                                    id="phone"
                                    name="phone"
                                    class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-purple-500 focus:border-transparent"
                                    placeholder="+880 1234 567890"
                                />
                            </div>

                            <!-- Subject -->
                            <div>
                                <label for="subject" class="block text-sm font-medium text-gray-700 mb-2">
                                    Subject *
                                </label>
                                <input
                                    type="text"
                                    id="subject"
                                    name="subject"
                                    class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-purple-500 focus:border-transparent"
                                    placeholder="What is this about?"
                                    required
                                />
                            </div>
                        </div>

                        <!-- Message -->
                        <div>
                            <label for="message" class="block text-sm font-medium text-gray-700 mb-2">
                                Message *
                            </label>
                            <textarea
                                id="message"
                                name="message"
                                rows="6"
                                class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-purple-500 focus:border-transparent"
                                placeholder="Tell us how we can help you..."
                                required
                            ></textarea>
                        </div>

                        <!-- Submit Button -->
                        <div class="text-center">
                            <button
                                type="submit"
                                class="bg-purple-600 text-white px-8 py-3 rounded-lg font-semibold hover:bg-purple-700 transition-colors duration-200 inline-flex items-center"
                            >
                                <i class="fas fa-paper-plane mr-2"></i>
                                Send Message
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Map Section -->
<section class="py-16">
    <div class="container mx-auto px-4">
        <div class="text-center mb-8">
            <h2 class="text-3xl font-bold text-gray-900 mb-4">Find Us</h2>
            <p class="text-gray-600">Visit our office or get directions</p>
        </div>

        <div class="rounded-lg overflow-hidden shadow-lg">
<iframe 

    src="{{ SettingsHelper::googleMapsUrl() }}" 
    width="100%" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"
    title="Scholars Global Network - Bangladesh Office Location">
</iframe>
        </div>
        
        <!-- Alternative: Simple Google Maps embed with address -->
        <div class="mt-4 text-center">
            <p class="text-sm text-gray-600 mb-2">Can't see the map? <a href="{{ SettingsHelper::googleMapsUrl() }}" target="_blank" class="text-primary hover:underline">View on Google Maps</a></p>
        </div>
    </div>
</section>

<!-- FAQ Section -->
<section class="py-16 bg-gray-50">
    <div class="container mx-auto px-4">
        <div class="text-center mb-12">
            <h2 class="text-3xl font-bold text-gray-900 mb-4">Frequently Asked Questions</h2>
            <p class="text-gray-600">Find answers to common questions</p>
        </div>

        <div class="max-w-4xl mx-auto">
            <div class="space-y-6">
                <div class="bg-white rounded-lg shadow-sm p-6">
                    <h3 class="text-lg font-semibold text-gray-900 mb-3">
                        How can I schedule a consultation?
                    </h3>
                    <p class="text-gray-600">
                        You can schedule a consultation by filling out our consultation form on the homepage or by calling us directly. Our team will get back to you within 24 hours.
                    </p>
                </div>

                <div class="bg-white rounded-lg shadow-sm p-6">
                    <h3 class="text-lg font-semibold text-gray-900 mb-3">
                        What documents do I need for study abroad?
                    </h3>
                    <p class="text-gray-600">
                        Required documents typically include academic transcripts, passport, language proficiency certificates, and financial statements. Specific requirements vary by country and program.
                    </p>
                </div>

                <div class="bg-white rounded-lg shadow-sm p-6">
                    <h3 class="text-lg font-semibold text-gray-900 mb-3">
                        How long does the visa process take?
                    </h3>
                    <p class="text-gray-600">
                        Visa processing times vary by country. Generally, it takes 2-8 weeks. We recommend applying at least 3 months before your intended travel date.
                    </p>
                </div>

                <div class="bg-white rounded-lg shadow-sm p-6">
                    <h3 class="text-lg font-semibold text-gray-900 mb-3">
                        Do you provide accommodation assistance?
                    </h3>
                    <p class="text-gray-600">
                        Yes, we provide guidance on finding accommodation, including on-campus housing, off-campus apartments, and homestay options. We can also help with booking temporary accommodation.
                    </p>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection
@push('scripts')
<script>
// Contact form submission
document.addEventListener('DOMContentLoaded', function() {
    const contactForm = document.getElementById('contact-form');
    if (contactForm) {
        contactForm.addEventListener('submit', function(e) {
            e.preventDefault();

            // Get form data
            const formData = new FormData(this);

            // Show loading state
            const submitButton = this.querySelector('button[type="submit"]');
            const originalText = submitButton.innerHTML;
            submitButton.innerHTML = '<i class="fas fa-spinner fa-spin mr-2"></i>Sending...';
            submitButton.disabled = true;

            // Submit form via AJAX
            fetch('{{ route("contact.store") }}', {
                method: 'POST',
                body: formData,
                headers: {
                    'X-Requested-With': 'XMLHttpRequest',
                    'Accept': 'application/json',
                }
            })
            .then(response => response.json())
            .then(data => {
                if (data.success) {
                    // Show success message
                    showContactMessage('success', data.message);
                    // Reset form
                    this.reset();
                } else {
                    // Show error message
                    showContactMessage('error', data.message || 'Something went wrong. Please try again.');
                }
            })
            .catch(error => {
                console.error('Error:', error);
                showContactMessage('error', 'Something went wrong. Please try again.');
            })
            .finally(() => {
                // Reset button state
                submitButton.innerHTML = originalText;
                submitButton.disabled = false;
            });
        });
    }
});

// Function to show contact form messages
function showContactMessage(type, message) {
    const messagesContainer = document.getElementById('contact-form-messages');
    const successMessage = document.getElementById('contact-success-message');
    const errorMessage = document.getElementById('contact-error-message');

    // Hide all messages first
    messagesContainer.classList.add('hidden');
    successMessage.classList.add('hidden');
    errorMessage.classList.add('hidden');

    // Show appropriate message
    if (type === 'success') {
        successMessage.textContent = message;
        successMessage.classList.remove('hidden');
    } else {
        errorMessage.textContent = message;
        errorMessage.classList.remove('hidden');
    }

    // Show messages container
    messagesContainer.classList.remove('hidden');

    // Auto-hide after 5 seconds
    setTimeout(() => {
        messagesContainer.classList.add('hidden');
    }, 5000);
}
</script>
@endpush

