@extends('layouts.admin')

@section('content')
<div class="space-y-6">
    <!-- Page Header -->
    <div class="flex items-center justify-between">
        <div>
            <h1 class="text-2xl font-bold text-gray-900">Create New Feature</h1>
            <p class="text-gray-600">Add a new feature card to display on your website.</p>
        </div>
        <a href="{{ route('admin.features.index') }}" 
           class="bg-gray-600 text-white px-4 py-2 rounded-lg hover:bg-gray-700 transition-colors duration-200">
            <i class="fas fa-arrow-left mr-2"></i>Back to Features
        </a>
    </div>

    <!-- Success/Error Messages -->
    @if($errors->any())
        <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded">
            <ul class="list-disc list-inside">
                @foreach($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <!-- Create Form -->
    <div class="bg-white rounded-lg shadow-sm border border-gray-200">
        <form action="{{ route('admin.features.store') }}" method="POST" class="p-6">
            @csrf
            
            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                <!-- Left Column -->
                <div class="space-y-6">
                    <!-- Title -->
                    <div>
                        <label for="title" class="block text-sm font-medium text-gray-700 mb-2">
                            Feature Title <span class="text-red-500">*</span>
                        </label>
                        <input type="text" name="title" id="title" 
                               value="{{ old('title') }}"
                               class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent"
                               placeholder="e.g., University Selection"
                               required>
                    </div>

                    <!-- Icon -->
                    <div>
                        <label for="icon" class="block text-sm font-medium text-gray-700 mb-2">
                            Icon Class <span class="text-red-500">*</span>
                        </label>
                        <input type="text" name="icon" id="icon" 
                               value="{{ old('icon') }}"
                               class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent"
                               placeholder="e.g., fas fa-university"
                               required>
                        <p class="text-xs text-gray-500 mt-1">Use FontAwesome icon classes (e.g., fas fa-university, fas fa-passport)</p>
                    </div>

                    <!-- Order -->
                    <div>
                        <label for="order" class="block text-sm font-medium text-gray-700 mb-2">
                            Display Order
                        </label>
                        <input type="number" name="order" id="order" 
                               value="{{ old('order', 0) }}"
                               min="0"
                               class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent"
                               placeholder="0">
                        <p class="text-xs text-gray-500 mt-1">Lower numbers appear first</p>
                    </div>
                </div>

                <!-- Right Column -->
                <div class="space-y-6">
                    <!-- Description -->
                    <div>
                        <label for="description" class="block text-sm font-medium text-gray-700 mb-2">
                            Description <span class="text-red-500">*</span>
                        </label>
                        <textarea name="description" id="description" rows="4"
                                  class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent"
                                  placeholder="Describe the feature in detail..."
                                  required>{{ old('description') }}</textarea>
                        <p class="text-xs text-gray-500 mt-1">Maximum 500 characters</p>
                    </div>

                    <!-- Status -->
                    <div>
                        <label class="flex items-center">
                            <input type="checkbox" name="is_active" value="1" 
                                   {{ old('is_active', true) ? 'checked' : '' }}
                                   class="rounded border-gray-300 text-blue-600 shadow-sm focus:border-blue-300 focus:ring focus:ring-blue-200 focus:ring-opacity-50">
                            <span class="ml-2 text-sm text-gray-700">Active</span>
                        </label>
                        <p class="text-xs text-gray-500 mt-1">Only active features will be displayed on the website</p>
                    </div>
                </div>
            </div>

            <!-- Icon Preview -->
            <div class="mt-6 p-4 bg-gray-50 rounded-lg">
                <h4 class="text-sm font-medium text-gray-700 mb-3">Icon Preview</h4>
                <div class="flex items-center space-x-4">
                    <div class="w-16 h-16 bg-purple-100 rounded-full flex items-center justify-center">
                        <i id="icon-preview" class="text-purple-600 text-2xl fas fa-university"></i>
                    </div>
                    <div>
                        <p class="text-sm text-gray-600">The icon will appear like this on your feature card</p>
                        <p class="text-xs text-gray-500 mt-1">Make sure to use valid FontAwesome icon classes</p>
                    </div>
                </div>
            </div>

            <!-- Form Actions -->
            <div class="flex justify-end space-x-3 pt-6 border-t border-gray-200">
                <a href="{{ route('admin.features.index') }}" 
                   class="bg-gray-300 text-gray-700 px-4 py-2 rounded-lg hover:bg-gray-400 transition-colors duration-200">
                    Cancel
                </a>
                <button type="submit" 
                        class="bg-blue-600 text-white px-4 py-2 rounded-lg hover:bg-blue-700 transition-colors duration-200">
                    <i class="fas fa-save mr-2"></i>Create Feature
                </button>
            </div>
        </form>
    </div>
</div>

<script>
// Icon preview functionality
document.getElementById('icon').addEventListener('input', function(e) {
    const iconClass = e.target.value;
    const preview = document.getElementById('icon-preview');
    
    if (iconClass) {
        preview.className = iconClass + ' text-purple-600 text-2xl';
    } else {
        preview.className = 'fas fa-university text-purple-600 text-2xl';
    }
});

// Common FontAwesome icons for reference
const commonIcons = [
    'fas fa-university',
    'fas fa-passport',
    'fas fa-file-alt',
    'fas fa-dollar-sign',
    'fas fa-plane',
    'fas fa-headset',
    'fas fa-graduation-cap',
    'fas fa-globe',
    'fas fa-users',
    'fas fa-chart-line',
    'fas fa-shield-alt',
    'fas fa-clock',
    'fas fa-map-marker-alt',
    'fas fa-phone',
    'fas fa-envelope',
    'fas fa-calendar',
    'fas fa-book',
    'fas fa-laptop',
    'fas fa-home',
    'fas fa-star'
];

// Add icon suggestions (optional enhancement)
document.addEventListener('DOMContentLoaded', function() {
    const iconInput = document.getElementById('icon');
    const suggestions = document.createElement('div');
    suggestions.className = 'mt-2 text-xs text-gray-500';
    suggestions.innerHTML = '<strong>Common icons:</strong> ' + commonIcons.slice(0, 10).join(', ') + '...';
    iconInput.parentNode.appendChild(suggestions);
});
</script>
@endsection
