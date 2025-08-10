<div class="space-y-6">
    <div>
        <h3 class="text-lg font-medium text-gray-900">General Settings</h3>
        <p class="text-sm text-gray-500">Manage your application's general configuration.</p>
    </div>

    <div class="grid grid-cols-1 gap-6 sm:grid-cols-2">
        @foreach($settings['general'] as $setting)
            @if($setting->type === 'text')
                <div>
                    <label for="{{ $setting->key }}" class="block text-sm font-medium text-gray-700">{{ $setting->label }}</label>
                    <input type="text" 
                           id="{{ $setting->key }}" 
                           name="settings[{{ $setting->key }}]"
                           value="{{ old("settings.{$setting->key}", $setting->value) }}" 
                           class="mt-1 block w-full border border-gray-300 rounded-md px-3 py-2 focus:outline-none focus:ring-blue-500 focus:border-blue-500">
                    @if($setting->description)
                        <p class="mt-1 text-xs text-gray-500">{{ $setting->description }}</p>
                    @endif
                </div>
            @elseif($setting->type === 'select')
                <div>
                    <label for="{{ $setting->key }}" class="block text-sm font-medium text-gray-700">{{ $setting->label }}</label>
                    <select id="{{ $setting->key }}" 
                            name="settings[{{ $setting->key }}]"
                            class="mt-1 block w-full border border-gray-300 rounded-md px-3 py-2 focus:outline-none focus:ring-blue-500 focus:border-blue-500">
                        @if($setting->key === 'timezone')
                            <option value="UTC" {{ $setting->value === 'UTC' ? 'selected' : '' }}>UTC</option>
                            <option value="America/New_York" {{ $setting->value === 'America/New_York' ? 'selected' : '' }}>Eastern Time</option>
                            <option value="America/Chicago" {{ $setting->value === 'America/Chicago' ? 'selected' : '' }}>Central Time</option>
                            <option value="America/Denver" {{ $setting->value === 'America/Denver' ? 'selected' : '' }}>Mountain Time</option>
                            <option value="America/Los_Angeles" {{ $setting->value === 'America/Los_Angeles' ? 'selected' : '' }}>Pacific Time</option>
                        @elseif($setting->key === 'date_format')
                            <option value="Y-m-d" {{ $setting->value === 'Y-m-d' ? 'selected' : '' }}>YYYY-MM-DD</option>
                            <option value="m/d/Y" {{ $setting->value === 'm/d/Y' ? 'selected' : '' }}>MM/DD/YYYY</option>
                            <option value="d/m/Y" {{ $setting->value === 'd/m/Y' ? 'selected' : '' }}>DD/MM/YYYY</option>
                        @endif
                    </select>
                    @if($setting->description)
                        <p class="mt-1 text-xs text-gray-500">{{ $setting->description }}</p>
                    @endif
                </div>
            @endif
        @endforeach
    </div>

    <!-- Logo Upload Section -->
    <div class="border-t pt-6">
        <h4 class="text-md font-medium text-gray-900 mb-4">Site Logo</h4>
        <div class="flex items-center space-x-6">
            <div class="flex-shrink-0">
                <div class="w-24 h-24 bg-gray-100 rounded-lg flex items-center justify-center overflow-hidden">
                    @php
                        $logoSetting = $settings['general']->where('key', 'site_logo')->first();
                    @endphp
                    @if($logoSetting && $logoSetting->value)
                        <img src="{{ asset($logoSetting->value) }}" 
                             alt="Site Logo" 
                             class="w-full h-full object-contain">
                    @else
                        <i class="fas fa-image text-gray-400 text-2xl"></i>
                    @endif
                </div>
            </div>
            <div class="flex-1">
                <div class="flex items-center space-x-4">
                    <label for="logo-upload" class="bg-blue-600 text-white px-4 py-2 rounded-lg hover:bg-blue-700 transition-colors duration-200 cursor-pointer">
                        <i class="fas fa-upload mr-2"></i>Upload Logo
                    </label>
                    <input type="file" 
                           id="logo-upload" 
                           name="settings[site_logo]"
                           accept="image/*" 
                           class="hidden"
                           @change="handleLogoUpload($event)">
                    @if($logoSetting && $logoSetting->value)
                        <button type="button" 
                                @click="deleteLogo()"
                                class="bg-red-600 text-white px-4 py-2 rounded-lg hover:bg-red-700 transition-colors duration-200">
                            <i class="fas fa-trash mr-2"></i>Delete
                        </button>
                    @endif
                </div>
                <p class="mt-2 text-xs text-gray-500">Upload a logo image (JPEG, PNG, JPG, GIF, SVG) under 2MB.</p>
            </div>
        </div>
    </div>

    <!-- Textarea Settings -->
    @foreach($settings['general'] as $setting)
        @if($setting->type === 'textarea')
            <div>
                <label for="{{ $setting->key }}" class="block text-sm font-medium text-gray-700">{{ $setting->label }}</label>
                <textarea id="{{ $setting->key }}" 
                          name="settings[{{ $setting->key }}]"
                          rows="3" 
                          class="mt-1 block w-full border border-gray-300 rounded-md px-3 py-2 focus:outline-none focus:ring-blue-500 focus:border-blue-500">{{ old("settings.{$setting->key}", $setting->value) }}</textarea>
                @if($setting->description)
                    <p class="mt-1 text-xs text-gray-500">{{ $setting->description }}</p>
                @endif
            </div>
        @endif
    @endforeach

    <!-- Boolean Settings -->
    <div class="space-y-4">
        @foreach($settings['general'] as $setting)
            @if($setting->type === 'boolean')
                <div class="flex items-center justify-between">
                    <div>
                        <h4 class="text-sm font-medium text-gray-900">{{ $setting->label }}</h4>
                        <p class="text-sm text-gray-500">{{ $setting->description }}</p>
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
</div>
