@extends('layouts.admin')

@section('content')
<div class="space-y-6">
    <!-- Page Header -->
    <div class="flex items-center justify-between">
        <div>
            <h1 class="text-2xl font-bold text-gray-900">Add Social Media Platform</h1>
            <p class="text-gray-600">Add a new social media platform to your topbar.</p>
        </div>
        <a href="{{ route('admin.social-media.index') }}" 
           class="bg-gray-600 text-white px-4 py-2 rounded-lg hover:bg-gray-700 transition-colors duration-200">
            <i class="fas fa-arrow-left mr-2"></i>Back to List
        </a>
    </div>

    <!-- Form -->
    <div class="bg-white rounded-lg shadow-sm border border-gray-200">
        <form action="{{ route('admin.social-media.store') }}" method="POST">
            @csrf
            <div class="p-6 space-y-6">
                <!-- Platform Name -->
                <div>
                    <label for="name" class="block text-sm font-medium text-gray-700 mb-2">Platform Name</label>
                    <input type="text" 
                           id="name" 
                           name="name" 
                           value="{{ old('name') }}"
                           class="w-full border border-gray-300 rounded-md px-3 py-2 focus:outline-none focus:ring-blue-500 focus:border-blue-500"
                           placeholder="e.g., Facebook, Instagram, Twitter"
                           required>
                    @error('name')
                        <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                    @enderror
                </div>

                <!-- Icon Class -->
                <div>
                    <label for="icon" class="block text-sm font-medium text-gray-700 mb-2">Icon Class</label>
                    <input type="text" 
                           id="icon" 
                           name="icon" 
                           value="{{ old('icon') }}"
                           class="w-full border border-gray-300 rounded-md px-3 py-2 focus:outline-none focus:ring-blue-500 focus:border-blue-500"
                           placeholder="e.g., fab fa-facebook, fab fa-instagram"
                           required>
                    <p class="mt-1 text-sm text-gray-500">Font Awesome icon class (e.g., fab fa-facebook, fab fa-instagram, fab fa-twitter)</p>
                    @error('icon')
                        <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                    @enderror
                </div>

                <!-- URL/Handle -->
                <div>
                    <label for="url" class="block text-sm font-medium text-gray-700 mb-2">URL or Handle</label>
                    <input type="text" 
                           id="url" 
                           name="url" 
                           value="{{ old('url') }}"
                           class="w-full border border-gray-300 rounded-md px-3 py-2 focus:outline-none focus:ring-blue-500 focus:border-blue-500"
                           placeholder="e.g., https://facebook.com/yourpage, @username, +1234567890"
                           required>
                    <p class="mt-1 text-sm text-gray-500">Enter the full URL, username, or phone number</p>
                    @error('url')
                        <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                    @enderror
                </div>

                <!-- Color -->
                <div>
                    <label for="color" class="block text-sm font-medium text-gray-700 mb-2">Icon Color</label>
                    <select id="color" 
                            name="color" 
                            class="w-full border border-gray-300 rounded-md px-3 py-2 focus:outline-none focus:ring-blue-500 focus:border-blue-500"
                            required>
                        <option value="">Select a color</option>
                        <option value="text-blue-600" {{ old('color') == 'text-blue-600' ? 'selected' : '' }}>Blue</option>
                        <option value="text-red-600" {{ old('color') == 'text-red-600' ? 'selected' : '' }}>Red</option>
                        <option value="text-green-600" {{ old('color') == 'text-green-600' ? 'selected' : '' }}>Green</option>
                        <option value="text-yellow-600" {{ old('color') == 'text-yellow-600' ? 'selected' : '' }}>Yellow</option>
                        <option value="text-purple-600" {{ old('color') == 'text-purple-600' ? 'selected' : '' }}>Purple</option>
                        <option value="text-pink-600" {{ old('color') == 'text-pink-600' ? 'selected' : '' }}>Pink</option>
                        <option value="text-indigo-600" {{ old('color') == 'text-indigo-600' ? 'selected' : '' }}>Indigo</option>
                        <option value="text-gray-600" {{ old('color') == 'text-gray-600' ? 'selected' : '' }}>Gray</option>
                    </select>
                    @error('color')
                        <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                    @enderror
                </div>

                <!-- Special Types -->
                <div class="space-y-4">
                    <label class="flex items-center">
                        <input type="checkbox" 
                               id="is_phone" 
                               name="is_phone" 
                               value="1"
                               {{ old('is_phone') ? 'checked' : '' }}
                               class="h-4 w-4 text-blue-600 focus:ring-blue-500 border-gray-300 rounded">
                        <span class="ml-2 text-sm text-gray-700">This is a phone number (for WhatsApp)</span>
                    </label>
                    
                    <label class="flex items-center">
                        <input type="checkbox" 
                               id="is_username" 
                               name="is_username" 
                               value="1"
                               {{ old('is_username') ? 'checked' : '' }}
                               class="h-4 w-4 text-blue-600 focus:ring-blue-500 border-gray-300 rounded">
                        <span class="ml-2 text-sm text-gray-700">This is a username (for Telegram)</span>
                    </label>
                </div>

                <!-- Common Icons Reference -->
                <div class="border-t pt-6">
                    <h3 class="text-lg font-medium text-gray-900 mb-4">Common Icon Classes</h3>
                    <div class="grid grid-cols-2 md:grid-cols-4 gap-4">
                        <div class="text-center p-3 border border-gray-200 rounded-lg">
                            <i class="fab fa-facebook text-blue-600 text-2xl mb-2"></i>
                            <p class="text-xs text-gray-600">fab fa-facebook</p>
                        </div>
                        <div class="text-center p-3 border border-gray-200 rounded-lg">
                            <i class="fab fa-twitter text-blue-400 text-2xl mb-2"></i>
                            <p class="text-xs text-gray-600">fab fa-twitter</p>
                        </div>
                        <div class="text-center p-3 border border-gray-200 rounded-lg">
                            <i class="fab fa-instagram text-pink-600 text-2xl mb-2"></i>
                            <p class="text-xs text-gray-600">fab fa-instagram</p>
                        </div>
                        <div class="text-center p-3 border border-gray-200 rounded-lg">
                            <i class="fab fa-linkedin text-blue-700 text-2xl mb-2"></i>
                            <p class="text-xs text-gray-600">fab fa-linkedin</p>
                        </div>
                        <div class="text-center p-3 border border-gray-200 rounded-lg">
                            <i class="fab fa-youtube text-red-600 text-2xl mb-2"></i>
                            <p class="text-xs text-gray-600">fab fa-youtube</p>
                        </div>
                        <div class="text-center p-3 border border-gray-200 rounded-lg">
                            <i class="fab fa-whatsapp text-green-600 text-2xl mb-2"></i>
                            <p class="text-xs text-gray-600">fab fa-whatsapp</p>
                        </div>
                        <div class="text-center p-3 border border-gray-200 rounded-lg">
                            <i class="fab fa-telegram text-blue-500 text-2xl mb-2"></i>
                            <p class="text-xs text-gray-600">fab fa-telegram</p>
                        </div>
                        <div class="text-center p-3 border border-gray-200 rounded-lg">
                            <i class="fab fa-tiktok text-black text-2xl mb-2"></i>
                            <p class="text-xs text-gray-600">fab fa-tiktok</p>
                        </div>
                    </div>
                </div>

                <!-- Submit Buttons -->
                <div class="flex justify-end space-x-3 pt-6 border-t">
                    <a href="{{ route('admin.social-media.index') }}" 
                       class="bg-white py-2 px-4 border border-gray-300 rounded-md shadow-sm text-sm font-medium text-gray-700 hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500">
                        Cancel
                    </a>
                    <button type="submit" 
                            class="bg-blue-600 py-2 px-4 border border-transparent rounded-md shadow-sm text-sm font-medium text-white hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500">
                        Add Platform
                    </button>
                </div>
            </div>
        </form>
    </div>
</div>
@endsection
