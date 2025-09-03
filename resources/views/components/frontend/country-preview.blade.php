
@push('styles')
<style>

.tab-content {
    display: none;
}
.tab-content.active {
    display: block;
}

/* Ensure active tab button always uses primary color regardless of leftover classes */
.tab-btn.is-active {
    background-color: var(--color-primary) !important;
    color: #ffffff !important;
}

</style>

@endpush


 <!-- Vertical Tab Switcher -->
        <section class="py-16 bg-white">
            <div class="container mx-auto px-4">
                <div class="text-center mb-12" data-aos="fade-up">
                    <h2 class="text-4xl font-bold text-gray-800 mb-4">
                        Popular Study Destinations
                    </h2>
                    <p class="text-gray-600 text-lg">
                        Choose from our top 5 recommended countries for
                        international education
                    </p>
                </div>

                <div class="max-w-6xl mx-auto">
                    <div class="flex flex-col md:flex-row gap-8">
                        <!-- Tab Navigation -->
                        <div class="md:w-1/4">
                            <div class="space-y-2">
                                <button
                                    class="tab-btn w-full text-left p-4 rounded-lg bg-gray-200 text-gray-700 font-semibold"
                                    onclick="openTab(event, 'usa')"
                                >
                                    <img src="https://flagsapi.com/US/flat/24.png" alt="US" class="inline-block mr-3 w-6 h-4">United
                                    States
                                </button>
                                <button
                                    class="tab-btn w-full text-left p-4 rounded-lg bg-gray-200 text-gray-700 font-semibold hover:bg-gray-300 transition"
                                    onclick="openTab(event, 'uk')"
                                >
                                    <img src="https://flagsapi.com/GB/flat/24.png" alt="UK" class="inline-block mr-3 w-6 h-4">United
                                    Kingdom
                                </button>
                                <button
                                    class="tab-btn w-full text-left p-4 rounded-lg bg-gray-200 text-gray-700 font-semibold hover:bg-gray-300 transition"
                                    onclick="openTab(event, 'canada')"
                                >
                                    <img src="https://flagsapi.com/CA/flat/24.png" alt="Canada" class="inline-block mr-3 w-6 h-4">Canada
                                </button>
                                <button
                                    class="tab-btn w-full text-left p-4 rounded-lg bg-gray-200 text-gray-700 font-semibold hover:bg-gray-300 transition"
                                    onclick="openTab(event, 'australia')"
                                >
                                    <img src="https://flagsapi.com/AU/flat/24.png" alt="Australia" class="inline-block mr-3 w-6 h-4">Australia
                                </button>
                                <button
                                    class="tab-btn w-full text-left p-4 rounded-lg bg-gray-200 text-gray-700 font-semibold hover:bg-gray-300 transition"
                                    onclick="openTab(event, 'germany')"
                                >
                                    <img src="https://flagsapi.com/DE/flat/24.png" alt="Germany" class="inline-block mr-3 w-6 h-4">Germany
                                </button>
                            </div>
                        </div>

                        <!-- Tab Content -->
                        <div class="md:w-3/4">
                            <div id="usa" class="tab-content active">
                                <div class="bg-blue-50 p-8 rounded-lg">
                                    <h3
                                        class="text-2xl font-bold text-gray-800 mb-4"
                                    >
                                        Study in the United States
                                    </h3>
                                    <p class="text-gray-600 mb-6">
                                        The USA hosts the world's largest
                                        international student population,
                                        offering diverse programs and
                                        cutting-edge research opportunities.
                                    </p>
                                    <div class="grid md:grid-cols-2 gap-6">
                                        <div>
                                            <h4 class="font-semibold mb-3">
                                                Top Universities
                                            </h4>
                                            <ul class="space-y-2 text-gray-600">
                                                <li>• Harvard University</li>
                                                <li>• Stanford University</li>
                                                <li>• MIT</li>
                                                <li>
                                                    • University of California
                                                </li>
                                            </ul>
                                        </div>
                                        <div>
                                            <h4 class="font-semibold mb-3">
                                                Key Benefits
                                            </h4>
                                            <ul class="space-y-2 text-gray-600">
                                                <li>
                                                    • World-class education
                                                    system
                                                </li>
                                                <li>
                                                    • Diverse cultural
                                                    experience
                                                </li>
                                                <li>
                                                    • Research opportunities
                                                </li>
                                                <li>• Career advancement</li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div id="uk" class="tab-content">
                                <div class="bg-red-50 p-8 rounded-lg">
                                    <h3
                                        class="text-2xl font-bold text-gray-800 mb-4"
                                    >
                                        Study in the United Kingdom
                                    </h3>
                                    <p class="text-gray-600 mb-6">
                                        Home to some of the world's oldest and
                                        most prestigious universities, the UK
                                        offers excellent education with shorter
                                        course durations.
                                    </p>
                                    <div class="grid md:grid-cols-2 gap-6">
                                        <div>
                                            <h4 class="font-semibold mb-3">
                                                Top Universities
                                            </h4>
                                            <ul class="space-y-2 text-gray-600">
                                                <li>• Oxford University</li>
                                                <li>• Cambridge University</li>
                                                <li>
                                                    • Imperial College London
                                                </li>
                                                <li>
                                                    • University of Edinburgh
                                                </li>
                                            </ul>
                                        </div>
                                        <div>
                                            <h4 class="font-semibold mb-3">
                                                Key Benefits
                                            </h4>
                                            <ul class="space-y-2 text-gray-600">
                                                <li>
                                                    • Shorter course duration
                                                </li>
                                                <li>
                                                    • Rich cultural heritage
                                                </li>
                                                <li>• Gateway to Europe</li>
                                                <li>• Strong alumni network</li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div id="canada" class="tab-content">
                                <div class="bg-red-50 p-8 rounded-lg">
                                    <h3
                                        class="text-2xl font-bold text-gray-800 mb-4"
                                    >
                                        Study in Canada
                                    </h3>
                                    <p class="text-gray-600 mb-6">
                                        Canada offers high-quality education
                                        with affordable tuition fees and
                                        excellent immigration opportunities for
                                        international students.
                                    </p>
                                    <div class="grid md:grid-cols-2 gap-6">
                                        <div>
                                            <h4 class="font-semibold mb-3">
                                                Top Universities
                                            </h4>
                                            <ul class="space-y-2 text-gray-600">
                                                <li>• University of Toronto</li>
                                                <li>• McGill University</li>
                                                <li>
                                                    • University of British
                                                    Columbia
                                                </li>
                                                <li>
                                                    • University of Waterloo
                                                </li>
                                            </ul>
                                        </div>
                                        <div>
                                            <h4 class="font-semibold mb-3">
                                                Key Benefits
                                            </h4>
                                            <ul class="space-y-2 text-gray-600">
                                                <li>
                                                    • Post-graduation work
                                                    permit
                                                </li>
                                                <li>• Pathway to PR</li>
                                                <li>
                                                    • Multicultural environment
                                                </li>
                                                <li>• High quality of life</li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div id="australia" class="tab-content">
                                <div class="bg-yellow-50 p-8 rounded-lg">
                                    <h3
                                        class="text-2xl font-bold text-gray-800 mb-4"
                                    >
                                        Study in Australia
                                    </h3>
                                    <p class="text-gray-600 mb-6">
                                        Australia offers world-class education
                                        with a relaxed lifestyle, excellent
                                        weather, and strong job prospects for
                                        international students.
                                    </p>
                                    <div class="grid md:grid-cols-2 gap-6">
                                        <div>
                                            <h4 class="font-semibold mb-3">
                                                Top Universities
                                            </h4>
                                            <ul class="space-y-2 text-gray-600">
                                                <li>
                                                    • University of Melbourne
                                                </li>
                                                <li>
                                                    • Australian National
                                                    University
                                                </li>
                                                <li>• University of Sydney</li>
                                                <li>
                                                    • University of Queensland
                                                </li>
                                            </ul>
                                        </div>
                                        <div>
                                            <h4 class="font-semibold mb-3">
                                                Key Benefits
                                            </h4>
                                            <ul class="space-y-2 text-gray-600">
                                                <li>• Work while studying</li>
                                                <li>• Post-study work visa</li>
                                                <li>
                                                    • High-quality education
                                                </li>
                                                <li>
                                                    • Great weather & lifestyle
                                                </li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div id="germany" class="tab-content">
                                <div class="bg-gray-50 p-8 rounded-lg">
                                    <h3
                                        class="text-2xl font-bold text-gray-800 mb-4"
                                    >
                                        Study in Germany
                                    </h3>
                                    <p class="text-gray-600 mb-6">
                                        Germany offers world-class education
                                        with low or no tuition fees, making it
                                        an attractive destination for
                                        international students.
                                    </p>
                                    <div class="grid md:grid-cols-2 gap-6">
                                        <div>
                                            <h4 class="font-semibold mb-3">
                                                Top Universities
                                            </h4>
                                            <ul class="space-y-2 text-gray-600">
                                                <li>
                                                    • Technical University of
                                                    Munich
                                                </li>
                                                <li>• Heidelberg University</li>
                                                <li>• Humboldt University</li>
                                                <li>
                                                    • University of Freiburg
                                                </li>
                                            </ul>
                                        </div>
                                        <div>
                                            <h4 class="font-semibold mb-3">
                                                Key Benefits
                                            </h4>
                                            <ul class="space-y-2 text-gray-600">
                                                <li>• Low/No tuition fees</li>
                                                <li>• Strong economy</li>
                                                <li>
                                                    • Research opportunities
                                                </li>
                                                <li>
                                                    • Central location in Europe
                                                </li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        
@push('scripts')
<script>
    function openTab(e, id) {
        // Switch content
        document.querySelectorAll('.tab-content').forEach(function (el) {
            el.classList.remove('active');
        });
        var target = document.getElementById(id);
        if (target) target.classList.add('active');

        // Reset all tab button states globally (also strip any leftover color classes)
        document.querySelectorAll('.tab-btn').forEach(function (btn) {
            btn.classList.remove('is-active', 'bg-primary', 'text-white');
            btn.classList.add('bg-gray-200', 'text-gray-700');
        });
        var current = e.currentTarget;
        current.classList.remove('bg-gray-200', 'text-gray-700');
        current.classList.add('is-active', 'bg-primary', 'text-white');
    }
</script>
@endpush
