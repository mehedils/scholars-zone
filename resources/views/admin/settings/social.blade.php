@extends('layouts.admin')

@section('content')
<div class="space-y-6">
    <!-- Page Header -->
    <div class="flex items-center justify-between">
        <div>
            <h1 class="text-2xl font-bold text-gray-900">Social Media Settings</h1>
            <p class="text-gray-600">Social media management has been moved to a dedicated section.</p>
        </div>
        <a href="{{ route('admin.social-media.index') }}" 
           class="bg-blue-600 text-white px-4 py-2 rounded-lg hover:bg-blue-700 transition-colors duration-200">
            <i class="fas fa-external-link-alt mr-2"></i>Manage Social Media
        </a>
    </div>

    <!-- Redirect Message -->
    <div class="bg-blue-50 border border-blue-200 rounded-lg p-6">
        <div class="flex items-center">
            <div class="flex-shrink-0">
                <i class="fas fa-info-circle text-blue-400 text-xl"></i>
            </div>
            <div class="ml-3">
                <h3 class="text-sm font-medium text-blue-800">Social Media Management Moved</h3>
                <div class="mt-2 text-sm text-blue-700">
                    <p>Social media platforms are now managed through a dedicated resource controller for better organization and functionality.</p>
                    <p class="mt-2">Click the button above to access the new social media management interface.</p>
                </div>
            </div>
        </div>
    </div>

@endsection
