<!-- Student Essentials -->
@php
    $studentEssentials = \App\Models\StudentEssential::active()->ordered()->get();
@endphp

<section class="py-16 bg-gray-50">
  <div class="container mx-auto px-4">
    <div class="text-center mb-12" data-aos="fade-up">
      <h2 class="text-4xl font-bold text-gray-800 mb-4">Student Essentials</h2>
      <p class="text-lg text-gray-600 max-w-2xl mx-auto">
        Everything you need to start your study-abroad journey with confidence.
      </p>
    </div>

    @if(count($studentEssentials) > 0)
        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-8">
            @foreach($studentEssentials as $index => $essential)
                <div class="bg-white rounded-xl shadow-lg p-6 hover:shadow-xl transition-shadow" 
                     data-aos="fade-up" 
                     data-aos-delay="{{ ($index + 1) * 100 }}">
                    <div class="w-16 h-16 bg-purple-100 text-purple-600 flex items-center justify-center rounded-full mb-4">
                        <i class="{{ $essential->icon }} text-2xl"></i>
                    </div>
                    <h3 class="text-xl font-bold text-gray-800 mb-2">{{ $essential->title }}</h3>
                    <p class="text-gray-600 mb-4">
                        {{ $essential->description }}
                    </p>
                    @if($essential->show_learn_more)
                        <a href="{{ $essential->learn_more_url ?? '#' }}" 
                           class="inline-flex items-center text-purple-600 font-semibold hover:text-purple-700"
                           @if($essential->learn_more_url) target="_blank" @endif>
                            Learn more <i class="fas fa-arrow-right ml-2"></i>
                        </a>
                    @endif
                </div>
            @endforeach
        </div>
    @else
        <!-- Default Student Essentials (fallback) -->
        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-8">
            <!-- Education Loan Card -->
            <div class="bg-white rounded-xl shadow-lg p-6 hover:shadow-xl transition-shadow" data-aos="fade-up" data-aos-delay="100">
                <div class="w-16 h-16 bg-purple-100 text-purple-600 flex items-center justify-center rounded-full mb-4">
                    <i class="fas fa-university text-2xl"></i>
                </div>
                <h3 class="text-xl font-bold text-gray-800 mb-2">Education Loan</h3>
                <p class="text-gray-600 mb-4">
                    Easy access to finances so you don't delay your dreams.
                </p>
                <a href="#" class="inline-flex items-center text-purple-600 font-semibold hover:text-purple-700">
                    Learn more <i class="fas fa-arrow-right ml-2"></i>
                </a>
            </div>

            <!-- Money Transfer Card -->
            <div class="bg-white rounded-xl shadow-lg p-6 hover:shadow-xl transition-shadow" data-aos="fade-up" data-aos-delay="200">
                <div class="w-16 h-16 bg-purple-100 text-purple-600 flex items-center justify-center rounded-full mb-4">
                    <i class="fas fa-exchange-alt text-2xl"></i>
                </div>
                <h3 class="text-xl font-bold text-gray-800 mb-2">Money Transfer</h3>
                <p class="text-gray-600 mb-4">
                    Safe, secure and fast payments to your institution and other key services.
                </p>
                <a href="#" class="inline-flex items-center text-purple-600 font-semibold hover:text-purple-700">
                    Learn more <i class="fas fa-arrow-right ml-2"></i>
                </a>
            </div>

            <!-- Student Health Cover Card -->
            <div class="bg-white rounded-xl shadow-lg p-6 hover:shadow-xl transition-shadow" data-aos="fade-up" data-aos-delay="300">
                <div class="w-16 h-16 bg-purple-100 text-purple-600 flex items-center justify-center rounded-full mb-4">
                    <i class="fas fa-shield-alt text-2xl"></i>
                </div>
                <h3 class="text-xl font-bold text-gray-800 mb-2">Student Health Cover</h3>
                <p class="text-gray-600 mb-4">
                    Your choice, your health cover, your peace of mind abroad.
                </p>
                <a href="#" class="inline-flex items-center text-purple-600 font-semibold hover:text-purple-700">
                    Learn more <i class="fas fa-arrow-right ml-2"></i>
                </a>
            </div>

            <!-- Student Banking Card -->
            <div class="bg-white rounded-xl shadow-lg p-6 hover:shadow-xl transition-shadow" data-aos="fade-up" data-aos-delay="400">
                <div class="w-16 h-16 bg-purple-100 text-purple-600 flex items-center justify-center rounded-full mb-4">
                    <i class="fas fa-credit-card text-2xl"></i>
                </div>
                <h3 class="text-xl font-bold text-gray-800 mb-2">Student Banking</h3>
                <p class="text-gray-600 mb-4">
                    Open a bank account before you arrive.
                </p>
                <a href="#" class="inline-flex items-center text-purple-600 font-semibold hover:text-purple-700">
                    Learn more <i class="fas fa-arrow-right ml-2"></i>
                </a>
            </div>

            <!-- Accommodation Card -->
            <div class="bg-white rounded-xl shadow-lg p-6 hover:shadow-xl transition-shadow" data-aos="fade-up" data-aos-delay="500">
                <div class="w-16 h-16 bg-purple-100 text-purple-600 flex items-center justify-center rounded-full mb-4">
                    <i class="fas fa-home text-2xl"></i>
                </div>
                <h3 class="text-xl font-bold text-gray-800 mb-2">Accommodation</h3>
                <p class="text-gray-600 mb-4">
                    Student apartment or homestay, the choice is yours.
                </p>
                <a href="#" class="inline-flex items-center text-purple-600 font-semibold hover:text-purple-700">
                    Learn more <i class="fas fa-arrow-right ml-2"></i>
                </a>
            </div>

            <!-- SIM Cards Card -->
            <div class="bg-white rounded-xl shadow-lg p-6 hover:shadow-xl transition-shadow" data-aos="fade-up" data-aos-delay="600">
                <div class="w-16 h-16 bg-purple-100 text-purple-600 flex items-center justify-center rounded-full mb-4">
                    <i class="fas fa-sim-card text-2xl"></i>
                </div>
                <h3 class="text-xl font-bold text-gray-800 mb-2">SIM Cards</h3>
                <p class="text-gray-600 mb-4">
                    No SIM? No problem – We've got it covered.
                </p>
                <a href="#" class="inline-flex items-center text-purple-600 font-semibold hover:text-purple-700">
                    Learn more <i class="fas fa-arrow-right ml-2"></i>
                </a>
            </div>

            <!-- Guardianship Card -->
            <div class="bg-white rounded-xl shadow-lg p-6 hover:shadow-xl transition-shadow" data-aos="fade-up" data-aos-delay="700">
                <div class="w-16 h-16 bg-purple-100 text-purple-600 flex items-center justify-center rounded-full mb-4">
                    <i class="fas fa-user-shield text-2xl"></i>
                </div>
                <h3 class="text-xl font-bold text-gray-800 mb-2">Guardianship</h3>
                <p class="text-gray-600 mb-4">
                    If you're under 18, we'll find you a guardian.
                </p>
                <a href="#" class="inline-flex items-center text-purple-600 font-semibold hover:text-purple-700">
                    Learn more <i class="fas fa-arrow-right ml-2"></i>
                </a>
            </div>

            <!-- Student Identity Card -->
            <div class="bg-white rounded-xl shadow-lg p-6 hover:shadow-xl transition-shadow" data-aos="fade-up" data-aos-delay="800">
                <div class="w-16 h-16 bg-purple-100 text-purple-600 flex items-center justify-center rounded-full mb-4">
                    <i class="fas fa-id-card text-2xl"></i>
                </div>
                <h3 class="text-xl font-bold text-gray-800 mb-2">Student Identity Card</h3>
                <p class="text-gray-600 mb-4">
                    Start enjoying global student discounts on food, fashion, travel, and more.
                </p>
                <a href="#" class="inline-flex items-center text-purple-600 font-semibold hover:text-purple-700">
                    Learn more <i class="fas fa-arrow-right ml-2"></i>
                </a>
            </div>
        </div>
    @endif
  </div>
</section>
