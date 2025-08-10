@extends('layouts.admin')

@section('content')
<div class="space-y-6">
    <!-- Page Header -->
    <div class="flex items-center justify-between">
        <div>
            <h1 class="text-2xl font-bold text-gray-900">Social Media Platforms</h1>
            <p class="text-gray-600">Manage your social media platforms for the topbar.</p>
        </div>
        <a href="{{ route('admin.social-media.create') }}" 
           class="bg-blue-600 text-white px-4 py-2 rounded-lg hover:bg-blue-700 transition-colors duration-200">
            <i class="fas fa-plus mr-2"></i>Add Platform
        </a>
    </div>

    <!-- Success/Error Messages -->
    @if(session('success'))
        <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded">
            {{ session('success') }}
        </div>
    @endif

    @if(session('error'))
        <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded">
            {{ session('error') }}
        </div>
    @endif

    <!-- Platforms List -->
    <div class="bg-white rounded-lg shadow-sm border border-gray-200">
        @if(count($platforms) > 0)
            <div class="overflow-x-auto">
                <table class="min-w-full divide-y divide-gray-200">
                    <thead class="bg-gray-50">
                        <tr>
                            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Platform</th>
                            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Icon</th>
                            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">URL</th>
                            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Type</th>
                            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Status</th>
                            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Actions</th>
                        </tr>
                    </thead>
                    <tbody class="bg-white divide-y divide-gray-200">
                        @foreach($platforms as $id => $platform)
                        <tr>
                            <td class="px-6 py-4 whitespace-nowrap">
                                <div class="flex items-center">
                                    <div class="w-8 h-8 rounded-lg flex items-center justify-center mr-3" style="background-color: {{ str_replace('text-', '#', $platform['color']) }}20;">
                                        <i class="{{ $platform['icon'] }} {{ $platform['color'] }}"></i>
                                    </div>
                                    <div>
                                        <div class="text-sm font-medium text-gray-900">{{ $platform['name'] }}</div>
                                    </div>
                                </div>
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap">
                                <code class="text-xs bg-gray-100 px-2 py-1 rounded">{{ $platform['icon'] }}</code>
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap">
                                <div class="text-sm text-gray-900">
                                    @if(isset($platform['is_phone']) && $platform['is_phone'])
                                        <span class="text-green-600">Phone: {{ $platform['url'] }}</span>
                                    @elseif(isset($platform['is_username']) && $platform['is_username'])
                                        <span class="text-blue-600">Username: {{ $platform['url'] }}</span>
                                    @else
                                        <a href="{{ $platform['url'] }}" target="_blank" class="text-blue-600 hover:text-blue-800">
                                            {{ Str::limit($platform['url'], 30) }}
                                        </a>
                                    @endif
                                </div>
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap">
                                <div class="text-sm text-gray-900">
                                    @if(isset($platform['is_phone']) && $platform['is_phone'])
                                        <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium bg-green-100 text-green-800">
                                            Phone Number
                                        </span>
                                    @elseif(isset($platform['is_username']) && $platform['is_username'])
                                        <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium bg-blue-100 text-blue-800">
                                            Username
                                        </span>
                                    @else
                                        <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium bg-gray-100 text-gray-800">
                                            URL
                                        </span>
                                    @endif
                                </div>
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap">
                                @if($platform['enabled'])
                                    <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium bg-green-100 text-green-800">
                                        Enabled
                                    </span>
                                @else
                                    <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium bg-red-100 text-red-800">
                                        Disabled
                                    </span>
                                @endif
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap text-sm font-medium">
                                <div class="flex items-center space-x-2">
                                    <a href="{{ route('admin.social-media.edit', $id) }}" 
                                       class="text-indigo-600 hover:text-indigo-900">
                                        <i class="fas fa-edit"></i>
                                    </a>
                                    
                                    <form action="{{ route('admin.social-media.toggle', $id) }}" method="POST" class="inline">
                                        @csrf
                                        <button type="submit" 
                                                class="text-{{ $platform['enabled'] ? 'yellow' : 'green' }}-600 hover:text-{{ $platform['enabled'] ? 'yellow' : 'green' }}-900">
                                            <i class="fas fa-{{ $platform['enabled'] ? 'eye-slash' : 'eye' }}"></i>
                                        </button>
                                    </form>
                                    
                                    <form action="{{ route('admin.social-media.destroy', $id) }}" method="POST" class="inline" 
                                          onsubmit="return confirm('Are you sure you want to delete this platform?')">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="text-red-600 hover:text-red-900">
                                            <i class="fas fa-trash"></i>
                                        </button>
                                    </form>
                                </div>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        @else
            <div class="text-center py-12">
                <div class="text-gray-400 mb-4">
                    <i class="fas fa-share-alt text-6xl"></i>
                </div>
                <h3 class="text-lg font-medium text-gray-900 mb-2">No social media platforms</h3>
                <p class="text-gray-500 mb-6">Get started by adding your first social media platform.</p>
                <a href="{{ route('admin.social-media.create') }}" 
                   class="bg-blue-600 text-white px-4 py-2 rounded-lg hover:bg-blue-700 transition-colors duration-200">
                    <i class="fas fa-plus mr-2"></i>Add Your First Platform
                </a>
            </div>
        @endif
    </div>

    <!-- Live Preview -->
    @if(count($platforms) > 0)
        <div class="bg-white rounded-lg shadow-sm border border-gray-200">
            <div class="p-6">
                <h3 class="text-lg font-medium text-gray-900 mb-4">Live Preview</h3>
                <div class="bg-gray-50 rounded-lg p-4">
                    <div class="flex items-center space-x-4">
                        @foreach($platforms as $platform)
                            @if($platform['enabled'])
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
                            @endif
                        @endforeach
                    </div>
                    <p class="text-xs text-gray-500 mt-2">These icons will appear in your website's topbar when social media is enabled.</p>
                </div>
            </div>
        </div>
    @endif
</div>
@endsection
