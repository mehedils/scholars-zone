@extends('layouts.admin')

@section('content')
<div class="space-y-6">
    <!-- Page Header -->
    <div class="flex items-center justify-between">
        <div>
            <h1 class="text-2xl font-bold text-gray-900">Create New Destination</h1>
            <p class="text-gray-600">Add a new study destination to your website.</p>
        </div>
        <div class="flex space-x-3">
            <a href="{{ route('admin.destinations.index') }}" 
               class="bg-gray-600 text-white px-4 py-2 rounded-lg hover:bg-gray-700 transition-colors duration-200">
                <i class="fas fa-arrow-left mr-2"></i>Back to Destinations
            </a>
        </div>
    </div>

    <!-- Form -->
    <div class="bg-white rounded-lg shadow-sm border border-gray-200">
        <form action="{{ route('admin.destinations.store') }}" method="POST" enctype="multipart/form-data" class="p-6">
            @csrf
            
            <div class="grid grid-cols-1 lg:grid-cols-2 gap-6">
                <!-- Basic Information -->
                <div class="space-y-6">
                    <div>
                        <label for="name" class="block text-sm font-medium text-gray-700 mb-2">Destination Name *</label>
                        <input type="text" name="name" id="name" value="{{ old('name') }}" required
                               class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-transparent">
                        @error('name')
                            <p class="text-red-600 text-sm mt-1">{{ $message }}</p>
                        @enderror
                    </div>

                    <div>
                        <label for="short_description" class="block text-sm font-medium text-gray-700 mb-2">Short Description *</label>
                        <textarea name="short_description" id="short_description" rows="3" required
                                  class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-transparent">{{ old('short_description') }}</textarea>
                        @error('short_description')
                            <p class="text-red-600 text-sm mt-1">{{ $message }}</p>
                        @enderror
                    </div>

                    <div>
                        <label for="region" class="block text-sm font-medium text-gray-700 mb-2">Region *</label>
                        <select name="region" id="region" required
                                class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-transparent">
                            <option value="">Select Region</option>
                            @foreach($regions as $key => $region)
                                <option value="{{ $key }}" {{ old('region') == $key ? 'selected' : '' }}>{{ $region }}</option>
                            @endforeach
                        </select>
                        @error('region')
                            <p class="text-red-600 text-sm mt-1">{{ $message }}</p>
                        @enderror
                    </div>

                    <div class="grid grid-cols-2 gap-4">
                        <div>
                            <label for="capital" class="block text-sm font-medium text-gray-700 mb-2">Capital</label>
                            <input type="text" name="capital" id="capital" value="{{ old('capital') }}"
                                   class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-transparent">
                        </div>
                        <div>
                            <label for="currency" class="block text-sm font-medium text-gray-700 mb-2">Currency</label>
                            <input type="text" name="currency" id="currency" value="{{ old('currency') }}"
                                   class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-transparent">
                        </div>
                    </div>

                    <div>
                        <label for="language" class="block text-sm font-medium text-gray-700 mb-2">Language</label>
                        <input type="text" name="language" id="language" value="{{ old('language') }}"
                               class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-transparent">
                    </div>
                </div>

                <!-- Financial Information -->
                <div class="space-y-6">
                    <div class="grid grid-cols-2 gap-4">
                        <div>
                            <label for="average_tuition_fee" class="block text-sm font-medium text-gray-700 mb-2">Average Tuition Fee</label>
                            <input type="number" name="average_tuition_fee" id="average_tuition_fee" value="{{ old('average_tuition_fee') }}" step="0.01"
                                   class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-transparent">
                        </div>
                        <div>
                            <label for="average_living_cost" class="block text-sm font-medium text-gray-700 mb-2">Average Living Cost</label>
                            <input type="number" name="average_living_cost" id="average_living_cost" value="{{ old('average_living_cost') }}" step="0.01"
                                   class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-transparent">
                        </div>
                    </div>

                    <div class="grid grid-cols-2 gap-4">
                        <div>
                            <label for="universities_count" class="block text-sm font-medium text-gray-700 mb-2">Universities Count</label>
                            <input type="number" name="universities_count" id="universities_count" value="{{ old('universities_count', 0) }}"
                                   class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-transparent">
                        </div>
                        <div>
                            <label for="programs_count" class="block text-sm font-medium text-gray-700 mb-2">Programs Count</label>
                            <input type="number" name="programs_count" id="programs_count" value="{{ old('programs_count', 0) }}"
                                   class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-transparent">
                        </div>
                    </div>

                    <div>
                        <label for="order" class="block text-sm font-medium text-gray-700 mb-2">Display Order</label>
                        <input type="number" name="order" id="order" value="{{ old('order', 0) }}"
                               class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-transparent">
                    </div>

                    <!-- Image Uploads -->
                    <div class="space-y-4">
                        <div>
                            <label for="featured_image" class="block text-sm font-medium text-gray-700 mb-2">Featured Image</label>
                            <input type="file" name="featured_image" id="featured_image" accept="image/*"
                                   class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-transparent">
                            <p class="text-sm text-gray-500 mt-1">Recommended size: 800x600px, Max: 2MB</p>
                        </div>

                        <div>
                            <label for="flag_image" class="block text-sm font-medium text-gray-700 mb-2">Flag Image</label>
                            <input type="file" name="flag_image" id="flag_image" accept="image/*"
                                   class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-transparent">
                            <p class="text-sm text-gray-500 mt-1">Recommended size: 200x150px, Max: 1MB</p>
                        </div>
                    </div>

                    <!-- Status Toggles -->
                    <div class="space-y-4">
                        <div class="flex items-center">
                            <input type="checkbox" name="is_active" id="is_active" value="1" {{ old('is_active', true) ? 'checked' : '' }}
                                   class="h-4 w-4 text-blue-600 focus:ring-blue-500 border-gray-300 rounded">
                            <label for="is_active" class="ml-2 block text-sm text-gray-900">Active</label>
                        </div>

                        <div class="flex items-center">
                            <input type="checkbox" name="is_featured" id="is_featured" value="1" {{ old('is_featured') ? 'checked' : '' }}
                                   class="h-4 w-4 text-blue-600 focus:ring-blue-500 border-gray-300 rounded">
                            <label for="is_featured" class="ml-2 block text-sm text-gray-900">Featured Destination</label>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Rich Text Content -->
            <div class="mt-6">
                <label for="content" class="block text-sm font-medium text-gray-700 mb-2">Content *</label>
                <textarea name="content" id="content" rows="15" required
                          class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-transparent">{{ old('content') }}</textarea>
                @error('content')
                    <p class="text-red-600 text-sm mt-1">{{ $message }}</p>
                @enderror
            </div>

            <!-- Arrays Section -->
            <div class="mt-6 grid grid-cols-1 lg:grid-cols-3 gap-6">
                <!-- Highlights -->
                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-2">Highlights</label>
                    <div id="highlights-container" class="space-y-2">
                        <div class="flex">
                            <input type="text" name="highlights[]" placeholder="Enter highlight"
                                   class="flex-1 px-3 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-transparent">
                            <button type="button" onclick="removeField(this)" class="ml-2 text-red-600 hover:text-red-800">
                                <i class="fas fa-times"></i>
                            </button>
                        </div>
                    </div>
                    <button type="button" onclick="addField('highlights-container', 'highlights[]')" 
                            class="mt-2 text-sm text-blue-600 hover:text-blue-800">
                        <i class="fas fa-plus mr-1"></i>Add Highlight
                    </button>
                </div>

                <!-- Requirements -->
                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-2">Requirements</label>
                    <div id="requirements-container" class="space-y-2">
                        <div class="flex">
                            <input type="text" name="requirements[]" placeholder="Enter requirement"
                                   class="flex-1 px-3 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-transparent">
                            <button type="button" onclick="removeField(this)" class="ml-2 text-red-600 hover:text-red-800">
                                <i class="fas fa-times"></i>
                            </button>
                        </div>
                    </div>
                    <button type="button" onclick="addField('requirements-container', 'requirements[]')" 
                            class="mt-2 text-sm text-blue-600 hover:text-blue-800">
                        <i class="fas fa-plus mr-1"></i>Add Requirement
                    </button>
                </div>

                <!-- Benefits -->
                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-2">Benefits</label>
                    <div id="benefits-container" class="space-y-2">
                        <div class="flex">
                            <input type="text" name="benefits[]" placeholder="Enter benefit"
                                   class="flex-1 px-3 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-transparent">
                            <button type="button" onclick="removeField(this)" class="ml-2 text-red-600 hover:text-red-800">
                                <i class="fas fa-times"></i>
                            </button>
                        </div>
                    </div>
                    <button type="button" onclick="addField('benefits-container', 'benefits[]')" 
                            class="mt-2 text-sm text-blue-600 hover:text-blue-800">
                        <i class="fas fa-plus mr-1"></i>Add Benefit
                    </button>
                </div>
            </div>

            <!-- SEO Section -->
            <div class="mt-6 space-y-4">
                <div>
                    <label for="meta_title" class="block text-sm font-medium text-gray-700 mb-2">Meta Title</label>
                    <input type="text" name="meta_title" id="meta_title" value="{{ old('meta_title') }}"
                           class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-transparent">
                </div>

                <div>
                    <label for="meta_description" class="block text-sm font-medium text-gray-700 mb-2">Meta Description</label>
                    <textarea name="meta_description" id="meta_description" rows="3"
                              class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-transparent">{{ old('meta_description') }}</textarea>
                </div>
            </div>

            <!-- Form Actions -->
            <div class="mt-8 flex justify-end space-x-3">
                <a href="{{ route('admin.destinations.index') }}" 
                   class="bg-gray-600 text-white px-6 py-2 rounded-lg hover:bg-gray-700 transition-colors duration-200">
                    Cancel
                </a>
                <button type="submit" 
                        class="bg-blue-600 text-white px-6 py-2 rounded-lg hover:bg-blue-700 transition-colors duration-200">
                    <i class="fas fa-save mr-2"></i>Create Destination
                </button>
            </div>
        </form>
    </div>
</div>

<!-- TinyMCE Script -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/tinymce/6.7.2/tinymce.min.js" referrerpolicy="origin"></script>
<script>
    tinymce.init({
        selector: '#content',
        plugins: 'anchor autolink charmap codesample emoticons image link lists media searchreplace table visualblocks wordcount',
        toolbar: 'undo redo | blocks fontfamily fontsize | bold italic underline strikethrough | link image media table | align lineheight | numlist bullist indent outdent | emoticons charmap | removeformat',
        height: 500,
        menubar: false,
        branding: false,
        promotion: false,
        file_picker_types: 'image',
        images_upload_url: '{{ route("admin.destinations.upload-file") }}',
        automatic_uploads: true,
        images_reuse_filename: true,
        entity_encoding: 'raw',
        element_format: 'html',
        verify_html: true,
        cleanup: true,
        cleanup_on_startup: true,
        images_upload_handler: function (blobInfo, success, failure) {
            var xhr, formData;
            xhr = new XMLHttpRequest();
            xhr.withCredentials = false;
            xhr.open('POST', '{{ route("admin.destinations.upload-file") }}');
            xhr.setRequestHeader('X-CSRF-TOKEN', '{{ csrf_token() }}');
            xhr.onload = function() {
                var json;
                if (xhr.status != 200) {
                    failure('HTTP Error: ' + xhr.status);
                    return;
                }
                json = JSON.parse(xhr.responseText);
                if (!json || typeof json.location != 'string') {
                    failure('Invalid JSON: ' + xhr.responseText);
                    return;
                }
                success(json.location);
            };
            formData = new FormData();
            formData.append('file', blobInfo.blob(), blobInfo.filename());
            xhr.send(formData);
        }
    });

    function addField(containerId, name) {
        const container = document.getElementById(containerId);
        const newField = document.createElement('div');
        newField.className = 'flex';
        newField.innerHTML = `
            <input type="text" name="${name}" placeholder="Enter item"
                   class="flex-1 px-3 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-transparent">
            <button type="button" onclick="removeField(this)" class="ml-2 text-red-600 hover:text-red-800">
                <i class="fas fa-times"></i>
            </button>
        `;
        container.appendChild(newField);
    }

    function removeField(button) {
        button.parentElement.remove();
    }
</script>
@endsection
