<div class="space-y-6">
    <div>
        <h3 class="text-lg font-medium text-gray-900">Notification Settings</h3>
        <p class="text-sm text-gray-500">Configure notification preferences.</p>
    </div>

    <div class="space-y-4">
        @foreach($settings['notifications'] as $setting)
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
