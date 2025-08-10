<div class="space-y-6">
    <div>
        <h3 class="text-lg font-medium text-gray-900">Security Settings</h3>
        <p class="text-sm text-gray-500">Configure security and authentication settings.</p>
    </div>

    <div class="grid grid-cols-1 gap-6 sm:grid-cols-2">
        @foreach($settings['security'] as $setting)
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
            @endif
        @endforeach
    </div>

    <!-- Boolean Security Settings -->
    <div class="space-y-4">
        @foreach($settings['security'] as $setting)
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
