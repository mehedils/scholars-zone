@extends('layouts.admin')

@section('content')
<div class="space-y-6">
    <!-- Page Header -->
    <div class="flex items-center justify-between">
        <div>
            <h1 class="text-2xl font-bold text-gray-900">Social Media Settings</h1>
            <p class="text-gray-600">Configure your social media platforms for the topbar.</p>
        </div>
    </div>

    <!-- Settings Form -->
    <div class="bg-white rounded-lg shadow-sm border border-gray-200">
        <form action="{{ route('admin.settings.update') }}" method="POST" enctype="multipart/form-data" x-data="socialMediaForm()">
            @csrf
            <div class="p-6 space-y-6">
                <!-- Enable/Disable Social Media -->
                <div class="space-y-4">
                    @foreach($settings as $setting)
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

                <!-- Social Media Platforms Management -->
                <div class="border-t pt-6">
                    <div class="flex items-center justify-between mb-4">
                        <h4 class="text-md font-medium text-gray-900">Social Media Platforms</h4>
                        <button type="button" 
                                @click="addPlatform()"
                                class="bg-blue-600 text-white px-4 py-2 rounded-lg hover:bg-blue-700 transition-colors duration-200">
                            <i class="fas fa-plus mr-2"></i>Add Platform
                        </button>
                    </div>

                    <div class="space-y-4" id="platforms-container">
                        @php
                            $platformsSetting = $settings->where('key', 'social_platforms')->first();
                            $platforms = $platformsSetting ? json_decode($platformsSetting->value, true) : [];
                        @endphp
                        
                        @foreach($platforms as $index => $platform)
                            <div class="border border-gray-200 rounded-lg p-4" x-data="{ 
                                platform: @json($platform),
                                index: {{ $index }}
                            }">
                                <div class="grid grid-cols-1 md:grid-cols-6 gap-4">
                                    <!-- Platform Name -->
                                    <div>
                                        <label class="block text-sm font-medium text-gray-700 mb-1">Platform Name</label>
                                        <input type="text" 
                                               x-model="platform.name"
                                               :name="'settings[social_platforms][' + index + '][name]'"
                                               class="w-full border border-gray-300 rounded-md px-3 py-2 focus:outline-none focus:ring-blue-500 focus:border-blue-500"
                                               placeholder="e.g., Facebook">
                                    </div>

                                    <!-- Font Awesome Icon -->
                                    <div>
                                        <label class="block text-sm font-medium text-gray-700 mb-1">Icon Class</label>
                                        <input type="text" 
                                               x-model="platform.icon"
                                               :name="'settings[social_platforms][' + index + '][icon]'"
                                               class="w-full border border-gray-300 rounded-md px-3 py-2 focus:outline-none focus:ring-blue-500 focus:border-blue-500"
                                               placeholder="e.g., fab fa-facebook">
                                        <p class="text-xs text-gray-500 mt-1">Font Awesome class name</p>
                                    </div>

                                    <!-- URL -->
                                    <div>
                                        <label class="block text-sm font-medium text-gray-700 mb-1">URL/Handle</label>
                                        <input type="text" 
                                               x-model="platform.url"
                                               :name="'settings[social_platforms][' + index + '][url]'"
                                               class="w-full border border-gray-300 rounded-md px-3 py-2 focus:outline-none focus:ring-blue-500 focus:border-blue-500"
                                               placeholder="https://facebook.com/yourpage">
                                    </div>

                                    <!-- Color -->
                                    <div>
                                        <label class="block text-sm font-medium text-gray-700 mb-1">Color</label>
                                        <select x-model="platform.color"
                                                :name="'settings[social_platforms][' + index + '][color]'"
                                                class="w-full border border-gray-300 rounded-md px-3 py-2 focus:outline-none focus:ring-blue-500 focus:border-blue-500">
                                            <option value="text-blue-600">Blue</option>
                                            <option value="text-red-600">Red</option>
                                            <option value="text-green-600">Green</option>
                                            <option value="text-yellow-600">Yellow</option>
                                            <option value="text-purple-600">Purple</option>
                                            <option value="text-pink-600">Pink</option>
                                            <option value="text-indigo-600">Indigo</option>
                                            <option value="text-gray-600">Gray</option>
                                        </select>
                                    </div>

                                    <!-- Special Types -->
                                    <div>
                                        <label class="block text-sm font-medium text-gray-700 mb-1">Type</label>
                                        <div class="space-y-2">
                                            <label class="flex items-center">
                                                <input type="checkbox" 
                                                       x-model="platform.is_phone"
                                                       :name="'settings[social_platforms][' + index + '][is_phone]'"
                                                       class="h-4 w-4 text-blue-600 focus:ring-blue-500 border-gray-300 rounded">
                                                <span class="ml-2 text-sm text-gray-700">Phone Number (WhatsApp)</span>
                                            </label>
                                            <label class="flex items-center">
                                                <input type="checkbox" 
                                                       x-model="platform.is_username"
                                                       :name="'settings[social_platforms][' + index + '][is_username]'"
                                                       class="h-4 w-4 text-blue-600 focus:ring-blue-500 border-gray-300 rounded">
                                                <span class="ml-2 text-sm text-gray-700">Username (Telegram)</span>
                                            </label>
                                        </div>
                                    </div>

                                    <!-- Enable/Delete -->
                                    <div class="flex items-end space-x-2">
                                        <label class="flex items-center">
                                            <input type="checkbox" 
                                                   x-model="platform.enabled"
                                                   :name="'settings[social_platforms][' + index + '][enabled]'"
                                                   class="h-4 w-4 text-blue-600 focus:ring-blue-500 border-gray-300 rounded">
                                            <span class="ml-2 text-sm text-gray-700">Enabled</span>
                                        </label>
                                        <button type="button" 
                                                @click="removePlatform(index)"
                                                class="text-red-600 hover:text-red-800">
                                            <i class="fas fa-trash"></i>
                                        </button>
                                    </div>
                                </div>

                                <!-- Preview -->
                                <div class="mt-4 pt-4 border-t border-gray-200">
                                    <div class="flex items-center space-x-2">
                                        <span class="text-sm text-gray-500">Preview:</span>
                                        <a href="#" 
                                           :class="platform.color + ' hover:' + platform.color.replace('text-', 'text-').replace('-600', '-800')"
                                           class="transition-colors duration-200">
                                            <i :class="platform.icon + ' text-lg'"></i>
                                        </a>
                                        <span class="text-sm text-gray-700" x-text="platform.name"></span>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>

                <!-- Live Preview -->
                <div class="border-t pt-6">
                    <h4 class="text-md font-medium text-gray-900 mb-4">Live Preview</h4>
                    <div class="bg-gray-50 rounded-lg p-4">
                        <div class="flex items-center space-x-4">
                            @foreach(\App\Helpers\SettingsHelper::getEnabledSocialPlatforms() as $platform)
                                @php
                                    $href = $platform['url'];
                                    if (isset($platform['is_phone']) && $platform['is_phone']) {
                                        $href = 'https://wa.me/' . str_replace(['+', ' ', '-'], '', $platform['url']);
                                    } elseif (isset($platform['is_username']) && $platform['is_username']) {
                                        $href = 'https://t.me/' . str_replace('@', '', $platform['url']);
                                    }
                                @endphp
                                
                                <a href="{{ $href }}" target="_blank" class="{{ $platform['color'] }} {{ $platform['hover_color'] ?? 'hover:' . str_replace('text-', 'text-', $platform['color']) . '-800' }}">
                                    <i class="{{ $platform['icon'] }} text-xl"></i>
                                </a>
                            @endforeach
                        </div>
                        <p class="text-xs text-gray-500 mt-2">These icons will appear in your website's topbar when social media is enabled.</p>
                    </div>
                </div>

                <!-- Save Button -->
                <div class="flex justify-end space-x-3 pt-6 border-t">
                    <button type="button" 
                            class="bg-white py-2 px-4 border border-gray-300 rounded-md shadow-sm text-sm font-medium text-gray-700 hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500">
                        Cancel
                    </button>
                    <button type="submit" 
                            class="bg-blue-600 py-2 px-4 border border-transparent rounded-md shadow-sm text-sm font-medium text-white hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500">
                        Save Changes
                    </button>
                </div>
            </div>
        </form>
    </div>
</div>

<script>
function socialMediaForm() {
    return {
        platforms: [],
        nextIndex: 0,

        addPlatform() {
            const container = document.getElementById('platforms-container');
            const index = this.nextIndex++;
            
            const platformHtml = `
                <div class="border border-gray-200 rounded-lg p-4" x-data="{ 
                    platform: {
                        name: '',
                        icon: '',
                        url: '',
                        color: 'text-blue-600',
                        enabled: true,
                        is_phone: false,
                        is_username: false
                    },
                    index: ${index}
                }">
                    <div class="grid grid-cols-1 md:grid-cols-6 gap-4">
                        <div>
                            <label class="block text-sm font-medium text-gray-700 mb-1">Platform Name</label>
                            <input type="text" 
                                   x-model="platform.name"
                                   :name="'settings[social_platforms][' + index + '][name]'"
                                   class="w-full border border-gray-300 rounded-md px-3 py-2 focus:outline-none focus:ring-blue-500 focus:border-blue-500"
                                   placeholder="e.g., Facebook">
                        </div>
                        <div>
                            <label class="block text-sm font-medium text-gray-700 mb-1">Icon Class</label>
                            <input type="text" 
                                   x-model="platform.icon"
                                   :name="'settings[social_platforms][' + index + '][icon]'"
                                   class="w-full border border-gray-300 rounded-md px-3 py-2 focus:outline-none focus:ring-blue-500 focus:border-blue-500"
                                   placeholder="e.g., fab fa-facebook">
                            <p class="text-xs text-gray-500 mt-1">Font Awesome class name</p>
                        </div>
                        <div>
                            <label class="block text-sm font-medium text-gray-700 mb-1">URL/Handle</label>
                            <input type="text" 
                                   x-model="platform.url"
                                   :name="'settings[social_platforms][' + index + '][url]'"
                                   class="w-full border border-gray-300 rounded-md px-3 py-2 focus:outline-none focus:ring-blue-500 focus:border-blue-500"
                                   placeholder="https://facebook.com/yourpage">
                        </div>
                        <div>
                            <label class="block text-sm font-medium text-gray-700 mb-1">Color</label>
                            <select x-model="platform.color"
                                    :name="'settings[social_platforms][' + index + '][color]'"
                                    class="w-full border border-gray-300 rounded-md px-3 py-2 focus:outline-none focus:ring-blue-500 focus:border-blue-500">
                                <option value="text-blue-600">Blue</option>
                                <option value="text-red-600">Red</option>
                                <option value="text-green-600">Green</option>
                                <option value="text-yellow-600">Yellow</option>
                                <option value="text-purple-600">Purple</option>
                                <option value="text-pink-600">Pink</option>
                                <option value="text-indigo-600">Indigo</option>
                                <option value="text-gray-600">Gray</option>
                            </select>
                        </div>
                        <div>
                            <label class="block text-sm font-medium text-gray-700 mb-1">Type</label>
                            <div class="space-y-2">
                                <label class="flex items-center">
                                    <input type="checkbox" 
                                           x-model="platform.is_phone"
                                           :name="'settings[social_platforms][' + index + '][is_phone]'"
                                           class="h-4 w-4 text-blue-600 focus:ring-blue-500 border-gray-300 rounded">
                                    <span class="ml-2 text-sm text-gray-700">Phone Number (WhatsApp)</span>
                                </label>
                                <label class="flex items-center">
                                    <input type="checkbox" 
                                           x-model="platform.is_username"
                                           :name="'settings[social_platforms][' + index + '][is_username]'"
                                           class="h-4 w-4 text-blue-600 focus:ring-blue-500 border-gray-300 rounded">
                                    <span class="ml-2 text-sm text-gray-700">Username (Telegram)</span>
                                </label>
                            </div>
                        </div>
                        <div class="flex items-end space-x-2">
                            <label class="flex items-center">
                                <input type="checkbox" 
                                       x-model="platform.enabled"
                                       :name="'settings[social_platforms][' + index + '][enabled]'"
                                       class="h-4 w-4 text-blue-600 focus:ring-blue-500 border-gray-300 rounded">
                                <span class="ml-2 text-sm text-gray-700">Enabled</span>
                            </label>
                            <button type="button" 
                                    @click="this.parentElement.parentElement.parentElement.remove()"
                                    class="text-red-600 hover:text-red-800">
                                <i class="fas fa-trash"></i>
                            </button>
                        </div>
                    </div>
                    <div class="mt-4 pt-4 border-t border-gray-200">
                        <div class="flex items-center space-x-2">
                            <span class="text-sm text-gray-500">Preview:</span>
                            <a href="#" 
                               :class="platform.color + ' hover:' + platform.color.replace('text-', 'text-').replace('-600', '-800')"
                               class="transition-colors duration-200">
                                <i :class="platform.icon + ' text-lg'"></i>
                            </a>
                            <span class="text-sm text-gray-700" x-text="platform.name"></span>
                        </div>
                    </div>
                </div>
            `;
            
            container.insertAdjacentHTML('beforeend', platformHtml);
        },

        removePlatform(index) {
            // This will be handled by Alpine.js in the template
        }
    }
}
</script>
@endsection
