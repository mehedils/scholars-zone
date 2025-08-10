<div class="space-y-6">
    <div>
        <h3 class="text-lg font-medium text-gray-900">Social Media Settings</h3>
        <p class="text-sm text-gray-500">Configure your social media links for the topbar.</p>
    </div>

    <!-- Enable/Disable Social Media -->
    <div class="space-y-4">
        @foreach($settings['social'] as $setting)
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

    <!-- Social Media URLs -->
    <div class="grid grid-cols-1 gap-6 sm:grid-cols-2">
        @foreach($settings['social'] as $setting)
            @if($setting->type === 'text')
                <div>
                    <label for="{{ $setting->key }}" class="block text-sm font-medium text-gray-700">
                        <i class="fab fa-{{ str_replace('social_', '', $setting->key) }} mr-2"></i>
                        {{ $setting->label }}
                    </label>
                    <input type="url" 
                           id="{{ $setting->key }}" 
                           name="settings[{{ $setting->key }}]"
                           value="{{ old("settings.{$setting->key}", $setting->value) }}" 
                           placeholder="https://..."
                           class="mt-1 block w-full border border-gray-300 rounded-md px-3 py-2 focus:outline-none focus:ring-blue-500 focus:border-blue-500">
                    @if($setting->description)
                        <p class="mt-1 text-xs text-gray-500">{{ $setting->description }}</p>
                    @endif
                </div>
            @endif
        @endforeach
    </div>

    <!-- Social Media Preview -->
    <div class="border-t pt-6">
        <h4 class="text-md font-medium text-gray-900 mb-4">Social Media Preview</h4>
        <div class="bg-gray-50 rounded-lg p-4">
            <div class="flex items-center space-x-4">
                @php
                    $facebookSetting = $settings['social']->where('key', 'social_facebook')->first();
                    $twitterSetting = $settings['social']->where('key', 'social_twitter')->first();
                    $linkedinSetting = $settings['social']->where('key', 'social_linkedin')->first();
                    $instagramSetting = $settings['social']->where('key', 'social_instagram')->first();
                    $youtubeSetting = $settings['social']->where('key', 'social_youtube')->first();
                    $whatsappSetting = $settings['social']->where('key', 'social_whatsapp')->first();
                    $telegramSetting = $settings['social']->where('key', 'social_telegram')->first();
                @endphp
                
                @if($facebookSetting && $facebookSetting->value)
                    <a href="{{ $facebookSetting->value }}" target="_blank" class="text-blue-600 hover:text-blue-800">
                        <i class="fab fa-facebook text-xl"></i>
                    </a>
                @endif
                
                @if($twitterSetting && $twitterSetting->value)
                    <a href="{{ $twitterSetting->value }}" target="_blank" class="text-blue-400 hover:text-blue-600">
                        <i class="fab fa-twitter text-xl"></i>
                    </a>
                @endif
                
                @if($linkedinSetting && $linkedinSetting->value)
                    <a href="{{ $linkedinSetting->value }}" target="_blank" class="text-blue-700 hover:text-blue-900">
                        <i class="fab fa-linkedin text-xl"></i>
                    </a>
                @endif
                
                @if($instagramSetting && $instagramSetting->value)
                    <a href="{{ $instagramSetting->value }}" target="_blank" class="text-pink-600 hover:text-pink-800">
                        <i class="fab fa-instagram text-xl"></i>
                    </a>
                @endif
                
                @if($youtubeSetting && $youtubeSetting->value)
                    <a href="{{ $youtubeSetting->value }}" target="_blank" class="text-red-600 hover:text-red-800">
                        <i class="fab fa-youtube text-xl"></i>
                    </a>
                @endif
                
                @if($whatsappSetting && $whatsappSetting->value)
                    <a href="https://wa.me/{{ str_replace(['+', ' ', '-'], '', $whatsappSetting->value) }}" target="_blank" class="text-green-600 hover:text-green-800">
                        <i class="fab fa-whatsapp text-xl"></i>
                    </a>
                @endif
                
                @if($telegramSetting && $telegramSetting->value)
                    <a href="https://t.me/{{ str_replace('@', '', $telegramSetting->value) }}" target="_blank" class="text-blue-500 hover:text-blue-700">
                        <i class="fab fa-telegram text-xl"></i>
                    </a>
                @endif
            </div>
            <p class="text-xs text-gray-500 mt-2">These icons will appear in your website's topbar when social media is enabled.</p>
        </div>
    </div>
</div>
