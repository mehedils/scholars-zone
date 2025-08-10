@extends('layouts.admin')

@section('content')
<div class="space-y-6">
    <!-- Page Header -->
    <div class="flex items-center justify-between">
        <div>
            <h1 class="text-2xl font-bold text-gray-900">Notification Settings</h1>
            <p class="text-gray-600">Configure notification preferences.</p>
        </div>
    </div>

    <!-- Settings Form -->
    <div class="bg-white rounded-lg shadow-sm border border-gray-200">
        <form action="{{ route('admin.settings.update') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="p-6 space-y-6">
                <!-- Boolean Notification Settings -->
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
@endsection
