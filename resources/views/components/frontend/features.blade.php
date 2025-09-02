

@push('styles')
<style>

.card-hover {
    transition:
        transform 0.3s ease,
        box-shadow 0.3s ease;
}
.card-hover:hover {
    transform: translateY(-5px);
    box-shadow: 0 20px 40px rgba(139, 92, 246, 0.2);
}

</style>
@endpush

<section class="py-16 bg-gray-50">
    <div class="container mx-auto px-4">
        <div class="text-center mb-12">
            <h2 class="text-3xl md:text-4xl font-bold text-gray-900 mb-4">Why Choose Us</h2>
            <p class="text-lg text-gray-600 max-w-2xl mx-auto">
                We provide comprehensive support to make your study abroad journey smooth and successful
            </p>
        </div>
        
        <div class="grid md:grid-cols-2 lg:grid-cols-3 gap-8">
            @php
                use App\Helpers\FeatureHelper;
                $features = FeatureHelper::getFeaturesForFrontend();
                
                // Fallback to default features if no database features exist
                if ($features->isEmpty()) {
                    $features = collect([
                        [
                            'title' => 'University Selection',
                            'description' => 'Expert guidance in choosing the right university based on your academic profile and career goals.',
                            'icon' => 'fas fa-university'
                        ],
                        [
                            'title' => 'Visa Application',
                            'description' => 'Complete visa application support with 100% success rate and interview preparation.',
                            'icon' => 'fas fa-passport'
                        ],
                        [
                            'title' => 'Documentation',
                            'description' => 'Professional assistance with all required documents and application materials.',
                            'icon' => 'fas fa-file-alt'
                        ],
                        [
                            'title' => 'Financial Planning',
                            'description' => 'Comprehensive financial planning including scholarships, loans, and cost management.',
                            'icon' => 'fas fa-dollar-sign'
                        ],
                        [
                            'title' => 'Travel Arrangements',
                            'description' => 'Complete travel support including flight booking and accommodation assistance.',
                            'icon' => 'fas fa-plane'
                        ],
                        [
                            'title' => '24/7 Support',
                            'description' => 'Round-the-clock support throughout your entire study abroad journey.',
                            'icon' => 'fas fa-headset'
                        ],
                    ]);
                }
            @endphp
            @foreach($features as $feature)
                <div class="bg-white rounded-lg p-6 shadow-lg hover:shadow-xl transition-shadow duration-300">
                    <div 
                        class="w-16 h-16 bg-primary-light rounded-full flex items-center justify-center mx-auto mb-4"
                        style="background-color: color-mix(in srgb, var(--color-primary) 10%, white);"
                    >
                        <i class="{{ $feature['icon'] }} text-primary text-2xl"></i>
                    </div>
                    <h3 class="text-xl font-semibold text-gray-900 mb-3 text-center">{{ $feature['title'] }}</h3>
                    <p class="text-gray-600 text-center leading-relaxed">{{ $feature['description'] }}</p>
                </div>
            @endforeach
            
            <!-- Additional features for demonstration -->
            @if($features->count() < 6)
                <div class="bg-white rounded-lg p-6 shadow-lg hover:shadow-xl transition-shadow duration-300">
                    <div 
                        class="w-16 h-16 bg-primary-light rounded-full flex items-center justify-center mx-auto mb-4"
                        style="background-color: color-mix(in srgb, var(--color-primary) 10%, white);"
                    >
                        <i class="fas fa-university text-primary text-2xl"></i>
                    </div>
                    <h3 class="text-xl font-semibold text-gray-900 mb-3 text-center">University Selection</h3>
                    <p class="text-gray-600 text-center leading-relaxed">Expert guidance in choosing the right university based on your academic profile and career goals.</p>
                </div>
                
                <div class="bg-white rounded-lg p-6 shadow-lg hover:shadow-xl transition-shadow duration-300">
                    <div 
                        class="w-16 h-16 bg-primary-light rounded-full flex items-center justify-center mx-auto mb-4"
                        style="background-color: color-mix(in srgb, var(--color-primary) 10%, white);"
                    >
                        <i class="fas fa-passport text-primary text-2xl"></i>
                    </div>
                    <h3 class="text-xl font-semibold text-gray-900 mb-3 text-center">Visa Application</h3>
                    <p class="text-gray-600 text-center leading-relaxed">Complete visa application support with 100% success rate and interview preparation.</p>
                </div>
                
                <div class="bg-white rounded-lg p-6 shadow-lg hover:shadow-xl transition-shadow duration-300">
                    <div 
                        class="w-16 h-16 bg-primary-light rounded-full flex items-center justify-center mx-auto mb-4"
                        style="background-color: color-mix(in srgb, var(--color-primary) 10%, white);"
                    >
                        <i class="fas fa-file-alt text-primary text-2xl"></i>
                    </div>
                    <h3 class="text-xl font-semibold text-gray-900 mb-3 text-center">Documentation</h3>
                    <p class="text-gray-600 text-center leading-relaxed">Professional assistance with all required documents and application materials.</p>
                </div>
                
                <div class="bg-white rounded-lg p-6 shadow-lg hover:shadow-xl transition-shadow duration-300">
                    <div 
                        class="w-16 h-16 bg-primary-light rounded-full flex items-center justify-center mx-auto mb-4"
                        style="background-color: color-mix(in srgb, var(--color-primary) 10%, white);"
                    >
                        <i class="fas fa-dollar-sign text-primary text-2xl"></i>
                    </div>
                    <h3 class="text-xl font-semibold text-gray-900 mb-3 text-center">Financial Planning</h3>
                    <p class="text-gray-600 text-center leading-relaxed">Comprehensive financial planning including scholarships, loans, and cost management.</p>
                </div>
                
                <div class="bg-white rounded-lg p-6 shadow-lg hover:shadow-xl transition-shadow duration-300">
                    <div 
                        class="w-16 h-16 bg-primary-light rounded-full flex items-center justify-center mx-auto mb-4"
                        style="background-color: color-mix(in srgb, var(--color-primary) 10%, white);"
                    >
                        <i class="fas fa-plane text-primary text-2xl"></i>
                    </div>
                    <h3 class="text-xl font-semibold text-gray-900 mb-3 text-center">Travel Arrangements</h3>
                    <p class="text-gray-600 text-center leading-relaxed">Complete travel support including flight booking and accommodation assistance.</p>
                </div>
                
                <div class="bg-white rounded-lg p-6 shadow-lg hover:shadow-xl transition-shadow duration-300">
                    <div 
                        class="w-16 h-16 bg-primary-light rounded-full flex items-center justify-center mx-auto mb-4"
                        style="background-color: color-mix(in srgb, var(--color-primary) 10%, white);"
                    >
                        <i class="fas fa-headset text-primary text-2xl"></i>
                    </div>
                    <h3 class="text-xl font-semibold text-gray-900 mb-3 text-center">24/7 Support</h3>
                    <p class="text-gray-600 text-center leading-relaxed">Round-the-clock support throughout your entire study abroad journey.</p>
                </div>
            @endif
        </div>
    </div>
</section>
