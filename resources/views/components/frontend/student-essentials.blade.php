@php
    use App\Models\StudentEssential;
    $essentials = StudentEssential::active()->ordered()->get();
    
    // Fallback to default essentials if no database essentials exist
    if ($essentials->isEmpty()) {
        $essentials = collect([
            [
                'title' => 'Passport',
                'description' => 'Valid passport with at least 6 months validity beyond your intended stay.',
                'icon' => 'fas fa-passport'
            ],
            [
                'title' => 'Academic Documents',
                'description' => 'Transcripts, certificates, and academic records from previous institutions.',
                'icon' => 'fas fa-graduation-cap'
            ],
            [
                'title' => 'Language Test Scores',
                'description' => 'IELTS, TOEFL, or other required language proficiency test results.',
                'icon' => 'fas fa-language'
            ],
            [
                'title' => 'Financial Documents',
                'description' => 'Bank statements, scholarship letters, or financial guarantee documents.',
                'icon' => 'fas fa-dollar-sign'
            ],
            [
                'title' => 'Medical Records',
                'description' => 'Health certificates and vaccination records as required by destination country.',
                'icon' => 'fas fa-heartbeat'
            ],
            [
                'title' => 'Personal Statement',
                'description' => 'Well-written personal statement explaining your study abroad goals.',
                'icon' => 'fas fa-file-alt'
            ],
            [
                'title' => 'Letters of Recommendation',
                'description' => 'Strong recommendation letters from teachers, employers, or mentors.',
                'icon' => 'fas fa-envelope'
            ],
            [
                'title' => 'Travel Insurance',
                'description' => 'Comprehensive travel and health insurance coverage for your stay.',
                'icon' => 'fas fa-shield-alt'
            ],
        ]);
    }
@endphp

<section class="py-16 bg-white">
    <div class="container mx-auto px-4">
        <div class="text-center mb-12">
            <h2 class="text-3xl md:text-4xl font-bold text-gray-900 mb-4">Student Essentials</h2>
            <p class="text-lg text-gray-600 max-w-2xl mx-auto">
                Essential documents and requirements for your study abroad journey
            </p>
        </div>
        
        <div class="grid md:grid-cols-2 lg:grid-cols-4 gap-6">
            @foreach($essentials as $essential)
                <div class="bg-gray-50 rounded-lg p-6 text-center hover:shadow-lg transition-shadow duration-300">
                    <div class="w-16 h-16 bg-primary-light text-primary flex items-center justify-center rounded-full mb-4 mx-auto"
                         style="background-color: color-mix(in srgb, var(--color-primary) 10%, white);">
                        <i class="{{ $essential['icon'] }} text-2xl"></i>
                    </div>
                    <h3 class="text-lg font-semibold text-gray-900 mb-2">{{ $essential['title'] }}</h3>
                    <p class="text-gray-600 text-sm leading-relaxed">{{ $essential['description'] }}</p>
                    @if($essential['show_learn_more'])
                    <a href="{{ route('contact') }}" class="inline-flex items-center text-primary font-semibold hover:text-primary-dark mt-3 text-sm">
                        Learn More <i class="fas fa-arrow-right ml-1"></i>
                    </a>
                    @endif
                </div>
            @endforeach
            
            <!-- Additional essentials for demonstration -->
            @if($essentials->count() < 8)
                <div class="bg-gray-50 rounded-lg p-6 text-center hover:shadow-lg transition-shadow duration-300">
                    <div class="w-16 h-16 bg-primary-light text-primary flex items-center justify-center rounded-full mb-4 mx-auto"
                         style="background-color: color-mix(in srgb, var(--color-primary) 10%, white);">
                        <i class="fas fa-passport text-2xl"></i>
                    </div>
                    <h3 class="text-lg font-semibold text-gray-900 mb-2">Passport</h3>
                    <p class="text-gray-600 text-sm leading-relaxed">Valid passport with at least 6 months validity beyond your intended stay.</p>
                    <a href="{{ route('contact') }}" class="inline-flex items-center text-primary font-semibold hover:text-primary-dark mt-3 text-sm">
                        Learn More <i class="fas fa-arrow-right ml-1"></i>
                    </a>
                </div>
                
                <div class="bg-gray-50 rounded-lg p-6 text-center hover:shadow-lg transition-shadow duration-300">
                    <div class="w-16 h-16 bg-primary-light text-primary flex items-center justify-center rounded-full mb-4 mx-auto"
                         style="background-color: color-mix(in srgb, var(--color-primary) 10%, white);">
                        <i class="fas fa-graduation-cap text-2xl"></i>
                    </div>
                    <h3 class="text-lg font-semibold text-gray-900 mb-2">Academic Documents</h3>
                    <p class="text-gray-600 text-sm leading-relaxed">Transcripts, certificates, and academic records from previous institutions.</p>
                    <a href="{{ route('contact') }}" class="inline-flex items-center text-primary font-semibold hover:text-primary-dark mt-3 text-sm">
                        Learn More <i class="fas fa-arrow-right ml-1"></i>
                    </a>
                </div>
                
                <div class="bg-gray-50 rounded-lg p-6 text-center hover:shadow-lg transition-shadow duration-300">
                    <div class="w-16 h-16 bg-primary-light text-primary flex items-center justify-center rounded-full mb-4 mx-auto"
                         style="background-color: color-mix(in srgb, var(--color-primary) 10%, white);">
                        <i class="fas fa-language text-2xl"></i>
                    </div>
                    <h3 class="text-lg font-semibold text-gray-900 mb-2">Language Test Scores</h3>
                    <p class="text-gray-600 text-sm leading-relaxed">IELTS, TOEFL, or other required language proficiency test results.</p>
                    <a href="{{ route('contact') }}" class="inline-flex items-center text-primary font-semibold hover:text-primary-dark mt-3 text-sm">
                        Learn More <i class="fas fa-arrow-right ml-1"></i>
                    </a>
                </div>
                
                <div class="bg-gray-50 rounded-lg p-6 text-center hover:shadow-lg transition-shadow duration-300">
                    <div class="w-16 h-16 bg-primary-light text-primary flex items-center justify-center rounded-full mb-4 mx-auto"
                         style="background-color: color-mix(in srgb, var(--color-primary) 10%, white);">
                        <i class="fas fa-dollar-sign text-2xl"></i>
                    </div>
                    <h3 class="text-lg font-semibold text-gray-900 mb-2">Financial Documents</h3>
                    <p class="text-gray-600 text-sm leading-relaxed">Bank statements, scholarship letters, or financial guarantee documents.</p>
                    <a href="{{ route('contact') }}" class="inline-flex items-center text-primary font-semibold hover:text-primary-dark mt-3 text-sm">
                        Learn More <i class="fas fa-arrow-right ml-1"></i>
                    </a>
                </div>
                
                <div class="bg-gray-50 rounded-lg p-6 text-center hover:shadow-lg transition-shadow duration-300">
                    <div class="w-16 h-16 bg-primary-light text-primary flex items-center justify-center rounded-full mb-4 mx-auto"
                         style="background-color: color-mix(in srgb, var(--color-primary) 10%, white);">
                        <i class="fas fa-heartbeat text-2xl"></i>
                    </div>
                    <h3 class="text-lg font-semibold text-gray-900 mb-2">Medical Records</h3>
                    <p class="text-gray-600 text-sm leading-relaxed">Health certificates and vaccination records as required by destination country.</p>
                    <a href="{{ route('contact') }}" class="inline-flex items-center text-primary font-semibold hover:text-primary-dark mt-3 text-sm">
                        Learn More <i class="fas fa-arrow-right ml-1"></i>
                    </a>
                </div>
                
                <div class="bg-gray-50 rounded-lg p-6 text-center hover:shadow-lg transition-shadow duration-300">
                    <div class="w-16 h-16 bg-primary-light text-primary flex items-center justify-center rounded-full mb-4 mx-auto"
                         style="background-color: color-mix(in srgb, var(--color-primary) 10%, white);">
                        <i class="fas fa-file-alt text-2xl"></i>
                    </div>
                    <h3 class="text-lg font-semibold text-gray-900 mb-2">Personal Statement</h3>
                    <p class="text-gray-600 text-sm leading-relaxed">Well-written personal statement explaining your study abroad goals.</p>
                    <a href="{{ route('contact') }}" class="inline-flex items-center text-primary font-semibold hover:text-primary-dark mt-3 text-sm">
                        Learn More <i class="fas fa-arrow-right ml-1"></i>
                    </a>
                </div>
                
                <div class="bg-gray-50 rounded-lg p-6 text-center hover:shadow-lg transition-shadow duration-300">
                    <div class="w-16 h-16 bg-primary-light text-primary flex items-center justify-center rounded-full mb-4 mx-auto"
                         style="background-color: color-mix(in srgb, var(--color-primary) 10%, white);">
                        <i class="fas fa-envelope text-2xl"></i>
                    </div>
                    <h3 class="text-lg font-semibold text-gray-900 mb-2">Letters of Recommendation</h3>
                    <p class="text-gray-600 text-sm leading-relaxed">Strong recommendation letters from teachers, employers, or mentors.</p>
                    <a href="{{ route('contact') }}" class="inline-flex items-center text-primary font-semibold hover:text-primary-dark mt-3 text-sm">
                        Learn More <i class="fas fa-arrow-right ml-1"></i>
                    </a>
                </div>
                
                <div class="bg-gray-50 rounded-lg p-6 text-center hover:shadow-lg transition-shadow duration-300">
                    <div class="w-16 h-16 bg-primary-light text-primary flex items-center justify-center rounded-full mb-4 mx-auto"
                         style="background-color: color-mix(in srgb, var(--color-primary) 10%, white);">
                        <i class="fas fa-shield-alt text-2xl"></i>
                    </div>
                    <h3 class="text-lg font-semibold text-gray-900 mb-2">Travel Insurance</h3>
                    <p class="text-gray-600 text-sm leading-relaxed">Comprehensive travel and health insurance coverage for your stay.</p>
                    <a href="{{ route('contact') }}" class="inline-flex items-center text-primary font-semibold hover:text-primary-dark mt-3 text-sm">
                        Learn More <i class="fas fa-arrow-right ml-1"></i>
                    </a>
                </div>
            @endif
        </div>
    </div>
</section>
