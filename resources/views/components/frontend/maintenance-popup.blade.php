<!-- Maintenance Popup -->
<div id="maintenance-popup" class="fixed inset-0 bg-black bg-opacity-50 z-[9999] flex items-center justify-center p-4 opacity-0 pointer-events-none transition-opacity duration-300">
    <div class="bg-white rounded-lg shadow-2xl max-w-md w-full mx-4 transform scale-95 transition-transform duration-300">
        <!-- Header -->
        <div class="bg-gradient-to-r from-purple-600 to-purple-800 text-white p-6 rounded-t-lg">
            <div class="flex items-center justify-between">
                <div class="flex items-center">
                    <i class="fas fa-tools text-2xl mr-3"></i>
                    <h2 class="text-xl font-bold">Under Maintenance</h2>
                </div>
                <button id="close-maintenance-popup" class="text-white hover:text-gray-200 transition-colors">
                    <i class="fas fa-times text-xl"></i>
                </button>
            </div>
        </div>
        
        <!-- Content -->
        <div class="p-6">
            <div class="text-center mb-6">
                <div class="w-16 h-16 bg-yellow-100 rounded-full flex items-center justify-center mx-auto mb-4">
                    <i class="fas fa-exclamation-triangle text-2xl text-yellow-600"></i>
                </div>
                <h3 class="text-lg font-semibold text-gray-800 mb-2">Website Maintenance</h3>
                <p class="text-gray-600 text-sm leading-relaxed">
                    We're currently performing scheduled maintenance to improve your experience. 
                    Some features may be temporarily unavailable. We apologize for any inconvenience.
                </p>
            </div>
            
            <!-- Progress Bar -->
            <div class="mb-6">
                <div class="flex justify-between text-sm text-gray-600 mb-2">
                    <span>Estimated completion</span>
                    <span>2 hours</span>
                </div>
                <div class="w-full bg-gray-200 rounded-full h-2">
                    <div class="bg-purple-600 h-2 rounded-full animate-pulse" style="width: 25%"></div>
                </div>
            </div>
            
            <!-- Features Status -->
            <div class="space-y-3 mb-6">
                <div class="flex items-center justify-between">
                    <span class="text-sm text-gray-700">Website browsing</span>
                    <span class="text-green-600 text-sm"><i class="fas fa-check-circle mr-1"></i>Available</span>
                </div>
                <div class="flex items-center justify-between">
                    <span class="text-sm text-gray-700">Contact forms</span>
                    <span class="text-yellow-600 text-sm"><i class="fas fa-clock mr-1"></i>Limited</span>
                </div>
                <div class="flex items-center justify-between">
                    <span class="text-sm text-gray-700">Payment processing</span>
                    <span class="text-red-600 text-sm"><i class="fas fa-times-circle mr-1"></i>Unavailable</span>
                </div>
            </div>
            
            <!-- Action Buttons -->
            <div class="flex space-x-3">
                <button id="continue-browsing" class="flex-1 bg-purple-600 text-white py-3 px-4 rounded-lg hover:bg-purple-700 transition-colors duration-200 font-medium">
                    Continue Browsing
                </button>
                <button id="notify-me" class="flex-1 bg-gray-100 text-gray-700 py-3 px-4 rounded-lg hover:bg-gray-200 transition-colors duration-200 font-medium">
                    Notify Me
                </button>
            </div>
        </div>
        
        <!-- Footer -->
        <div class="bg-gray-50 px-6 py-4 rounded-b-lg">
            <p class="text-xs text-gray-500 text-center">
                For urgent inquiries, please email us at 
                <a href="mailto:info@scholarsglobalnetwork.com" class="text-purple-600 hover:underline">info@scholarsglobalnetwork.com</a>
            </p>
        </div>
    </div>
</div> 