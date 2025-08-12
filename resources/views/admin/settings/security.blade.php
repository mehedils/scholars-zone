@extends('layouts.admin')

@section('content')
<div class="space-y-6">
    <!-- Page Header -->
    <div class="flex items-center justify-between">
        <div>
            <h1 class="text-xl sm:text-2xl font-bold text-gray-900">Security Settings</h1>
            <p class="text-sm sm:text-base text-gray-600">Configure security and authentication settings.</p>
        </div>
    </div>

    <!-- Change Password Section -->
    <div class="bg-white rounded-lg shadow-sm border border-gray-200">
        <div class="p-4 sm:p-6 border-b border-gray-200">
            <h2 class="text-lg font-semibold text-gray-900">Change Password</h2>
            <p class="text-sm text-gray-600 mt-1">Update your account password to keep your account secure.</p>
        </div>
        
        <form action="{{ route('admin.settings.change-password') }}" method="POST" class="p-4 sm:p-6">
            @csrf
            <div class="space-y-4">
                <!-- Current Password -->
                <div>
                    <label for="current_password" class="block text-sm font-medium text-gray-700 mb-2">Current Password *</label>
                    <input type="password" 
                           id="current_password" 
                           name="current_password"
                           required
                           class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent"
                           placeholder="Enter your current password">
                    @error('current_password')
                        <p class="text-red-600 text-sm mt-1">{{ $message }}</p>
                    @enderror
                </div>

                <!-- New Password -->
                <div>
                    <label for="new_password" class="block text-sm font-medium text-gray-700 mb-2">New Password *</label>
                    <input type="password" 
                           id="new_password" 
                           name="new_password"
                           required
                           class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent"
                           placeholder="Enter your new password">
                    @error('new_password')
                        <p class="text-red-600 text-sm mt-1">{{ $message }}</p>
                    @enderror
                </div>

                <!-- Confirm New Password -->
                <div>
                    <label for="new_password_confirmation" class="block text-sm font-medium text-gray-700 mb-2">Confirm New Password *</label>
                    <input type="password" 
                           id="new_password_confirmation" 
                           name="new_password_confirmation"
                           required
                           class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent"
                           placeholder="Confirm your new password">
                    @error('new_password_confirmation')
                        <p class="text-red-600 text-sm mt-1">{{ $message }}</p>
                    @enderror
                </div>

                <!-- Password Requirements -->
                <div class="bg-gray-50 p-3 rounded-md">
                    <p class="text-xs text-gray-600 mb-2">Password requirements:</p>
                    <ul class="text-xs text-gray-600 space-y-1">
                        <li>• At least 8 characters long</li>
                        <li>• Contains at least one uppercase letter</li>
                        <li>• Contains at least one lowercase letter</li>
                        <li>• Contains at least one number</li>
                        <li>• Contains at least one special character</li>
                    </ul>
                </div>

                <!-- Submit Button -->
                <div class="flex justify-end">
                    <button type="submit" 
                            class="bg-blue-600 text-white px-4 py-2 rounded-md hover:bg-blue-700 transition-colors duration-200 text-sm font-medium">
                        <i class="fas fa-key mr-2"></i>Change Password
                    </button>
                </div>
            </div>
        </form>
    </div>

    <!-- General Security Settings -->
    <div class="bg-white rounded-lg shadow-sm border border-gray-200">
        <div class="p-4 sm:p-6 border-b border-gray-200">
            <h2 class="text-lg font-semibold text-gray-900">Security Preferences</h2>
            <p class="text-sm text-gray-600 mt-1">Configure additional security settings for your account.</p>
        </div>
        
        <form action="{{ route('admin.settings.update') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="p-4 sm:p-6 space-y-6">
                <!-- Text Settings -->
                <div class="grid grid-cols-1 gap-4 sm:gap-6 sm:grid-cols-2">
                    @foreach($settings as $setting)
                        @if($setting->type === 'text')
                            <div>
                                <label for="{{ $setting->key }}" class="block text-sm font-medium text-gray-700 mb-2">{{ $setting->label }}</label>
                                <input type="text" 
                                       id="{{ $setting->key }}" 
                                       name="settings[{{ $setting->key }}]"
                                       value="{{ old("settings.{$setting->key}", $setting->value) }}" 
                                       class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent">
                                @if($setting->description)
                                    <p class="text-xs text-gray-500 mt-1">{{ $setting->description }}</p>
                                @endif
                            </div>
                        @endif
                    @endforeach
                </div>

                <!-- Boolean Security Settings -->
                <div class="space-y-4">
                    @foreach($settings as $setting)
                        @if($setting->type === 'boolean')
                            <div class="flex items-center justify-between p-3 border border-gray-200 rounded-md">
                                <div>
                                    <h4 class="text-sm font-medium text-gray-900">{{ $setting->label }}</h4>
                                    <p class="text-xs text-gray-500">{{ $setting->description }}</p>
                                </div>
                                <div class="flex items-center">
                                    <input type="checkbox" 
                                           id="{{ $setting->key }}"
                                           name="settings[{{ $setting->key }}]"
                                           value="1"
                                           {{ old("settings.{$setting->key}", $setting->value) ? 'checked' : '' }}
                                           class="h-4 w-4 text-blue-600 focus:ring-blue-500 border-gray-300 rounded">
                                </div>
                            </div>
                        @endif
                    @endforeach
                </div>

                <!-- Save Button -->
                <div class="flex justify-end space-x-3 pt-4 border-t">
                    <button type="button" 
                            class="bg-gray-600 text-white px-4 py-2 rounded-md hover:bg-gray-700 transition-colors duration-200 text-sm font-medium">
                        Cancel
                    </button>
                    <button type="submit" 
                            class="bg-blue-600 text-white px-4 py-2 rounded-md hover:bg-blue-700 transition-colors duration-200 text-sm font-medium">
                        <i class="fas fa-save mr-2"></i>Save Changes
                    </button>
                </div>
            </div>
        </form>
    </div>
</div>
@endsection
