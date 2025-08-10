@extends('layouts.admin')

@section('content')
<div class="space-y-6">
    <!-- Page Header -->
    <div class="flex items-center justify-between">
        <div>
            <h1 class="text-2xl font-bold text-gray-900">Settings</h1>
            <p class="text-gray-600">Manage your application settings and preferences.</p>
        </div>
    </div>

    <!-- Settings Layout -->
    <div class="bg-white rounded-lg shadow-sm border border-gray-200">
        <div class="flex">
            <!-- Settings Sidebar -->
            <div class="w-64 border-r border-gray-200 bg-gray-50">
                <nav class="p-4 space-y-2" x-data="{ activeSection: 'general' }">
                    @foreach($groups as $group)
                    <button @click="activeSection = '{{ $group }}'" 
                            :class="activeSection === '{{ $group }}' ? 'bg-blue-100 text-blue-700 border-blue-300' : 'text-gray-600 hover:bg-gray-100 hover:text-gray-900'"
                            class="w-full text-left px-4 py-3 rounded-lg border border-transparent transition-colors duration-200 font-medium capitalize">
                        <div class="flex items-center">
                            @if($group === 'general')
                                <i class="fas fa-cog mr-3"></i>
                            @elseif($group === 'email')
                                <i class="fas fa-envelope mr-3"></i>
                            @elseif($group === 'security')
                                <i class="fas fa-shield-alt mr-3"></i>
                            @elseif($group === 'notifications')
                                <i class="fas fa-bell mr-3"></i>
                            @elseif($group === 'social')
                                <i class="fas fa-share-alt mr-3"></i>
                            @endif
                            {{ ucfirst($group) }}
                        </div>
                    </button>
                    @endforeach
                </nav>
            </div>

            <!-- Settings Content -->
            <div class="flex-1">
                <form action="{{ route('admin.settings.update') }}" method="POST" enctype="multipart/form-data" x-data="settingsForm()">
                    @csrf
                    <div class="p-6">
                        <!-- General Settings -->
                        <div x-show="activeSection === 'general'" x-transition>
                            @include('admin.partials.settings.general')
                        </div>

                        <!-- Email Settings -->
                        <div x-show="activeSection === 'email'" x-transition>
                            @include('admin.partials.settings.email')
                        </div>

                        <!-- Security Settings -->
                        <div x-show="activeSection === 'security'" x-transition>
                            @include('admin.partials.settings.security')
                        </div>

                        <!-- Notification Settings -->
                        <div x-show="activeSection === 'notifications'" x-transition>
                            @include('admin.partials.settings.notifications')
                        </div>

                        <!-- Social Media Settings -->
                        <div x-show="activeSection === 'social'" x-transition>
                            @include('admin.partials.settings.social')
                        </div>

                        <!-- Save Button -->
                        <div class="flex justify-end space-x-3 pt-6 border-t mt-6">
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
    </div>
</div>

<script>
function settingsForm() {
    return {
        activeSection: 'general',
        
        handleLogoUpload(event) {
            const file = event.target.files[0];
            if (!file) return;
            
            const formData = new FormData();
            formData.append('logo', file);
            formData.append('_token', '{{ csrf_token() }}');
            
            fetch('{{ route("admin.settings.upload-logo") }}', {
                method: 'POST',
                body: formData
            })
            .then(response => response.json())
            .then(data => {
                if (data.success) {
                    // Update the logo display
                    const logoContainer = document.querySelector('.w-24.h-24');
                    logoContainer.innerHTML = `<img src="${data.path}" alt="Site Logo" class="w-full h-full object-contain">`;
                    
                    // Show success message
                    if (window.adminDashboard) {
                        window.adminDashboard.showNotification(data.message, 'success');
                    }
                } else {
                    if (window.adminDashboard) {
                        window.adminDashboard.showNotification(data.message, 'error');
                    }
                }
            })
            .catch(error => {
                console.error('Error:', error);
                if (window.adminDashboard) {
                    window.adminDashboard.showNotification('Error uploading logo', 'error');
                }
            });
        },
        
        deleteLogo() {
            if (!confirm('Are you sure you want to delete the logo?')) return;
            
            fetch('{{ route("admin.settings.delete-logo") }}', {
                method: 'POST',
                headers: {
                    'X-CSRF-TOKEN': '{{ csrf_token() }}',
                    'Content-Type': 'application/json'
                }
            })
            .then(response => response.json())
            .then(data => {
                if (data.success) {
                    // Update the logo display
                    const logoContainer = document.querySelector('.w-24.h-24');
                    logoContainer.innerHTML = '<i class="fas fa-image text-gray-400 text-2xl"></i>';
                    
                    // Show success message
                    if (window.adminDashboard) {
                        window.adminDashboard.showNotification(data.message, 'success');
                    }
                }
            })
            .catch(error => {
                console.error('Error:', error);
                if (window.adminDashboard) {
                    window.adminDashboard.showNotification('Error deleting logo', 'error');
                }
            });
        }
    }
}
</script>
@endsection
