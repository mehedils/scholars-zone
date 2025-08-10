@extends('layouts.admin')

@section('content')
<div class="space-y-6">
    <!-- Page Header -->
    <div class="flex items-center justify-between">
        <div>
            <h1 class="text-2xl font-bold text-gray-900">Profile</h1>
            <p class="text-gray-600">Manage your account information and preferences.</p>
        </div>
    </div>

    <div class="grid grid-cols-1 lg:grid-cols-3 gap-6">
        <!-- Profile Information -->
        <div class="lg:col-span-2">
            <div class="bg-white rounded-lg shadow-sm border border-gray-200">
                <div class="p-6 border-b border-gray-200">
                    <h3 class="text-lg font-medium text-gray-900">Profile Information</h3>
                    <p class="text-sm text-gray-500">Update your account profile information and email address.</p>
                </div>
                <div class="p-6 space-y-6">
                    <div class="grid grid-cols-1 gap-6 sm:grid-cols-2">
                        <div>
                            <label for="name" class="block text-sm font-medium text-gray-700">Full Name</label>
                            <input type="text" 
                                   id="name" 
                                   value="{{ auth()->user()->name }}" 
                                   class="mt-1 block w-full border border-gray-300 rounded-md px-3 py-2 focus:outline-none focus:ring-blue-500 focus:border-blue-500">
                        </div>

                        <div>
                            <label for="email" class="block text-sm font-medium text-gray-700">Email Address</label>
                            <input type="email" 
                                   id="email" 
                                   value="{{ auth()->user()->email }}" 
                                   class="mt-1 block w-full border border-gray-300 rounded-md px-3 py-2 focus:outline-none focus:ring-blue-500 focus:border-blue-500">
                        </div>

                        <div>
                            <label for="phone" class="block text-sm font-medium text-gray-700">Phone Number</label>
                            <input type="tel" 
                                   id="phone" 
                                   value="+1 (555) 123-4567" 
                                   class="mt-1 block w-full border border-gray-300 rounded-md px-3 py-2 focus:outline-none focus:ring-blue-500 focus:border-blue-500">
                        </div>

                        <div>
                            <label for="position" class="block text-sm font-medium text-gray-700">Position</label>
                            <input type="text" 
                                   id="position" 
                                   value="Administrator" 
                                   class="mt-1 block w-full border border-gray-300 rounded-md px-3 py-2 focus:outline-none focus:ring-blue-500 focus:border-blue-500">
                        </div>
                    </div>

                    <div>
                        <label for="bio" class="block text-sm font-medium text-gray-700">Bio</label>
                        <textarea id="bio" 
                                  rows="4" 
                                  class="mt-1 block w-full border border-gray-300 rounded-md px-3 py-2 focus:outline-none focus:ring-blue-500 focus:border-blue-500">Experienced education consultant with over 5 years of expertise in international student guidance and study abroad programs.</textarea>
                    </div>

                    <div class="flex justify-end">
                        <button type="button" 
                                class="bg-blue-600 py-2 px-4 border border-transparent rounded-md shadow-sm text-sm font-medium text-white hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500">
                            Save Changes
                        </button>
                    </div>
                </div>
            </div>

            <!-- Change Password -->
            <div class="bg-white rounded-lg shadow-sm border border-gray-200 mt-6">
                <div class="p-6 border-b border-gray-200">
                    <h3 class="text-lg font-medium text-gray-900">Change Password</h3>
                    <p class="text-sm text-gray-500">Ensure your account is using a long, random password to stay secure.</p>
                </div>
                <div class="p-6 space-y-6">
                    <div>
                        <label for="current_password" class="block text-sm font-medium text-gray-700">Current Password</label>
                        <input type="password" 
                               id="current_password" 
                               class="mt-1 block w-full border border-gray-300 rounded-md px-3 py-2 focus:outline-none focus:ring-blue-500 focus:border-blue-500">
                    </div>

                    <div>
                        <label for="new_password" class="block text-sm font-medium text-gray-700">New Password</label>
                        <input type="password" 
                               id="new_password" 
                               class="mt-1 block w-full border border-gray-300 rounded-md px-3 py-2 focus:outline-none focus:ring-blue-500 focus:border-blue-500">
                    </div>

                    <div>
                        <label for="confirm_password" class="block text-sm font-medium text-gray-700">Confirm New Password</label>
                        <input type="password" 
                               id="confirm_password" 
                               class="mt-1 block w-full border border-gray-300 rounded-md px-3 py-2 focus:outline-none focus:ring-blue-500 focus:border-blue-500">
                    </div>

                    <div class="flex justify-end">
                        <button type="button" 
                                class="bg-blue-600 py-2 px-4 border border-transparent rounded-md shadow-sm text-sm font-medium text-white hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500">
                            Update Password
                        </button>
                    </div>
                </div>
            </div>
        </div>

        <!-- Profile Sidebar -->
        <div class="space-y-6">
            <!-- Profile Photo -->
            <div class="bg-white rounded-lg shadow-sm border border-gray-200 p-6">
                <div class="flex flex-col items-center">
                    <div class="w-24 h-24 bg-blue-500 rounded-full flex items-center justify-center mb-4">
                        <i class="fas fa-user text-white text-3xl"></i>
                    </div>
                    <h3 class="text-lg font-medium text-gray-900">{{ auth()->user()->name }}</h3>
                    <p class="text-sm text-gray-500">Administrator</p>
                    <button class="mt-4 bg-blue-600 text-white px-4 py-2 rounded-lg hover:bg-blue-700 transition-colors duration-200">
                        Change Photo
                    </button>
                </div>
            </div>

            <!-- Account Stats -->
            <div class="bg-white rounded-lg shadow-sm border border-gray-200 p-6">
                <h3 class="text-lg font-medium text-gray-900 mb-4">Account Statistics</h3>
                <div class="space-y-4">
                    <div class="flex items-center justify-between">
                        <span class="text-sm text-gray-600">Member Since</span>
                        <span class="text-sm font-medium text-gray-900">{{ auth()->user()->created_at->format('M Y') }}</span>
                    </div>
                    <div class="flex items-center justify-between">
                        <span class="text-sm text-gray-600">Last Login</span>
                        <span class="text-sm font-medium text-gray-900">Today</span>
                    </div>
                    <div class="flex items-center justify-between">
                        <span class="text-sm text-gray-600">Total Logins</span>
                        <span class="text-sm font-medium text-gray-900">127</span>
                    </div>
                    <div class="flex items-center justify-between">
                        <span class="text-sm text-gray-600">Actions Today</span>
                        <span class="text-sm font-medium text-gray-900">23</span>
                    </div>
                </div>
            </div>

            <!-- Quick Actions -->
            <div class="bg-white rounded-lg shadow-sm border border-gray-200 p-6">
                <h3 class="text-lg font-medium text-gray-900 mb-4">Quick Actions</h3>
                <div class="space-y-3">
                    <a href="#" class="flex items-center text-sm text-gray-600 hover:text-blue-600 transition-colors duration-200">
                        <i class="fas fa-download mr-3"></i>
                        Export Data
                    </a>
                    <a href="#" class="flex items-center text-sm text-gray-600 hover:text-blue-600 transition-colors duration-200">
                        <i class="fas fa-bell mr-3"></i>
                        Notification Settings
                    </a>
                    <a href="#" class="flex items-center text-sm text-gray-600 hover:text-blue-600 transition-colors duration-200">
                        <i class="fas fa-shield-alt mr-3"></i>
                        Security Settings
                    </a>
                    <a href="#" class="flex items-center text-sm text-gray-600 hover:text-blue-600 transition-colors duration-200">
                        <i class="fas fa-history mr-3"></i>
                        Activity Log
                    </a>
                </div>
            </div>

            <!-- Two-Factor Authentication -->
            <div class="bg-white rounded-lg shadow-sm border border-gray-200 p-6">
                <h3 class="text-lg font-medium text-gray-900 mb-4">Two-Factor Authentication</h3>
                <p class="text-sm text-gray-500 mb-4">Add additional security to your account using two-factor authentication.</p>
                <button class="w-full bg-green-600 text-white px-4 py-2 rounded-lg hover:bg-green-700 transition-colors duration-200">
                    <i class="fas fa-shield-alt mr-2"></i>Enable 2FA
                </button>
            </div>
        </div>
    </div>
</div>
@endsection
