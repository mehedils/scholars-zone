@props(['size' => 'text-lg', 'color' => 'text-gray-600', 'hoverColor' => 'hover:text-gray-800'])

@if(\App\Helpers\SettingsHelper::isSocialEnabled())
    <div class="flex items-center space-x-4">
        @foreach(\App\Helpers\SettingsHelper::getEnabledSocialPlatforms() as $platform)
            @php
                $href = $platform['url'];
                if (isset($platform['is_phone']) && $platform['is_phone']) {
                    $href = 'https://wa.me/' . str_replace(['+', ' ', '-'], '', $platform['url']);
                } elseif (isset($platform['is_username']) && $platform['is_username']) {
                    $href = 'https://t.me/' . str_replace('@', '', $platform['url']);
                }
                
                $iconColor = $color;
                $iconHoverColor = $hoverColor;
                
                // Use platform-specific colors if no custom colors provided
                if ($color === 'text-gray-600' && isset($platform['color'])) {
                    $iconColor = $platform['color'];
                }
                if ($hoverColor === 'hover:text-gray-800' && isset($platform['hover_color'])) {
                    $iconHoverColor = $platform['hover_color'];
                }
            @endphp
            
            <a href="{{ $href }}" 
               target="_blank" 
               rel="noopener noreferrer" 
               class="{{ $iconColor }} {{ $iconHoverColor }} transition-colors duration-200" 
               title="{{ $platform['name'] }}">
                <i class="{{ $platform['icon'] }} {{ $size }}"></i>
            </a>
        @endforeach
    </div>
@endif
