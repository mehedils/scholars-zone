@extends('layouts.admin')

@section('content')
<div class="space-y-6">
    <!-- Page Header -->
    <div class="flex items-center justify-between">
        <div>
            <h1 class="text-2xl font-bold text-gray-900">Create Student Essential</h1>
            <p class="text-gray-600">Add a new student essential service to your our-services page.</p>
        </div>
        <a href="{{ route('admin.student-essentials.index') }}" 
           class="bg-gray-600 text-white px-4 py-2 rounded-lg hover:bg-gray-700 transition-colors duration-200">
            <i class="fas fa-arrow-left mr-2"></i>Back to List
        </a>
    </div>

    <!-- Form -->
    <div class="bg-white rounded-lg shadow-sm border border-gray-200 p-6">
        <form action="{{ route('admin.student-essentials.store') }}" method="POST">
            @csrf
            
            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                <!-- Title -->
                <div class="md:col-span-2">
                    <label for="title" class="block text-sm font-medium text-gray-700 mb-2">Title *</label>
                    <input type="text" 
                           name="title" 
                           id="title" 
                           value="{{ old('title') }}"
                           class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent"
                           placeholder="e.g., Education Loan"
                           required>
                    @error('title')
                        <p class="text-red-600 text-sm mt-1">{{ $message }}</p>
                    @enderror
                </div>

                <!-- Description -->
                <div class="md:col-span-2">
                    <label for="description" class="block text-sm font-medium text-gray-700 mb-2">Description *</label>
                    <textarea name="description" 
                              id="description" 
                              rows="4"
                              class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent"
                              placeholder="Describe the student essential service..."
                              required>{{ old('description') }}</textarea>
                    @error('description')
                        <p class="text-red-600 text-sm mt-1">{{ $message }}</p>
                    @enderror
                </div>

                <!-- Icon -->
                <div>
                    <label for="icon" class="block text-sm font-medium text-gray-700 mb-2">Icon *</label>
                    <input type="text" 
                           name="icon" 
                           id="icon" 
                           value="{{ old('icon') }}"
                           class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent"
                           placeholder="e.g., fas fa-university"
                           required>
                    <p class="text-sm text-gray-500 mt-1">Use FontAwesome icon classes (e.g., fas fa-university)</p>
                    @error('icon')
                        <p class="text-red-600 text-sm mt-1">{{ $message }}</p>
                    @enderror
                </div>

                <!-- Order -->
                <div>
                    <label for="order" class="block text-sm font-medium text-gray-700 mb-2">Order</label>
                    <input type="number" 
                           name="order" 
                           id="order" 
                           value="{{ old('order', 0) }}"
                           min="0"
                           class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent"
                           placeholder="0">
                    <p class="text-sm text-gray-500 mt-1">Lower numbers appear first</p>
                    @error('order')
                        <p class="text-red-600 text-sm mt-1">{{ $message }}</p>
                    @enderror
                </div>

                <!-- Show Learn More -->
                <div>
                    <label class="flex items-center">
                        <input type="checkbox" 
                               name="show_learn_more" 
                               id="show_learn_more"
                               value="1"
                               {{ old('show_learn_more') ? 'checked' : '' }}
                               class="rounded border-gray-300 text-blue-600 shadow-sm focus:border-blue-300 focus:ring focus:ring-blue-200 focus:ring-opacity-50">
                        <span class="ml-2 text-sm font-medium text-gray-700">Show Learn More Link</span>
                    </label>
                    <p class="text-sm text-gray-500 mt-1">Enable to show a "Learn more" link</p>
                </div>

                <!-- Learn More URL -->
                <div>
                    <label for="learn_more_url" class="block text-sm font-medium text-gray-700 mb-2">Learn More URL</label>
                    <input type="url" 
                           name="learn_more_url" 
                           id="learn_more_url" 
                           value="{{ old('learn_more_url') }}"
                           class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent"
                           placeholder="https://example.com/learn-more">
                    <p class="text-sm text-gray-500 mt-1">URL for the learn more link (optional)</p>
                    @error('learn_more_url')
                        <p class="text-red-600 text-sm mt-1">{{ $message }}</p>
                    @enderror
                </div>

                <!-- Is Active -->
                <div class="md:col-span-2">
                    <label class="flex items-center">
                        <input type="checkbox" 
                               name="is_active" 
                               id="is_active"
                               value="1"
                               {{ old('is_active', true) ? 'checked' : '' }}
                               class="rounded border-gray-300 text-blue-600 shadow-sm focus:border-blue-300 focus:ring focus:ring-blue-200 focus:ring-opacity-50">
                        <span class="ml-2 text-sm font-medium text-gray-700">Active</span>
                    </label>
                    <p class="text-sm text-gray-500 mt-1">Enable to show this student essential on the website</p>
                </div>
            </div>

            <!-- Submit Button -->
            <div class="flex justify-end space-x-3 mt-8">
                <a href="{{ route('admin.student-essentials.index') }}" 
                   class="bg-gray-600 text-white px-6 py-2 rounded-lg hover:bg-gray-700 transition-colors duration-200">
                    Cancel
                </a>
                <button type="submit" 
                        class="bg-blue-600 text-white px-6 py-2 rounded-lg hover:bg-blue-700 transition-colors duration-200">
                    <i class="fas fa-save mr-2"></i>Create Student Essential
                </button>
            </div>
        </form>
    </div>
</div>

<script>
// Show/hide learn more URL field based on checkbox
document.getElementById('show_learn_more').addEventListener('change', function() {
    const urlField = document.getElementById('learn_more_url');
    if (this.checked) {
        urlField.parentElement.style.display = 'block';
    } else {
        urlField.parentElement.style.display = 'none';
        urlField.value = '';
    }
});

// Initialize on page load
document.addEventListener('DOMContentLoaded', function() {
    const checkbox = document.getElementById('show_learn_more');
    const urlField = document.getElementById('learn_more_url');
    if (!checkbox.checked) {
        urlField.parentElement.style.display = 'none';
    }
});
</script>
@endsection
