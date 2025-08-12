@extends('layouts.admin')

@section('content')
<div class="space-y-4 sm:space-y-6">
    <!-- Page Header -->
    <div class="flex flex-col sm:flex-row sm:items-center sm:justify-between space-y-4 sm:space-y-0">
        <div>
            <h1 class="text-xl sm:text-2xl font-bold text-gray-900">Dashboard</h1>
            <p class="text-sm sm:text-base text-gray-600">Welcome back, {{ auth()->user()->name }}! Here's what's happening with your site.</p>
        </div>
        <div class="flex space-x-3">
            <button class="bg-blue-600 text-white px-3 sm:px-4 py-2 rounded-lg hover:bg-blue-700 transition-colors duration-200 text-sm sm:text-base">
                <i class="fas fa-download mr-2"></i>Export Report
            </button>
        </div>
    </div>

    <!-- Statistics Cards -->
    <div class="grid grid-cols-1 sm:grid-cols-2 xl:grid-cols-4 gap-4 sm:gap-6">
        <!-- Total Users -->
        <div class="bg-white rounded-lg shadow-sm p-4 sm:p-6 border border-gray-200">
            <div class="flex items-center justify-between">
                <div>
                    <p class="text-xs sm:text-sm font-medium text-gray-600">Total Users</p>
                    <p class="text-2xl sm:text-3xl font-bold text-gray-900">{{ \App\Models\User::count() }}</p>
                </div>
                <div class="w-10 h-10 sm:w-12 sm:h-12 bg-blue-100 rounded-lg flex items-center justify-center">
                    <i class="fas fa-users text-blue-600 text-lg sm:text-xl"></i>
                </div>
            </div>
            <div class="mt-3 sm:mt-4 flex items-center">
                <span class="text-green-600 text-xs sm:text-sm font-medium">
                    <i class="fas fa-arrow-up mr-1"></i>12%
                </span>
                <span class="text-gray-500 text-xs sm:text-sm ml-2">from last month</span>
            </div>
        </div>

        <!-- Active Consultations -->
        <div class="bg-white rounded-lg shadow-sm p-4 sm:p-6 border border-gray-200">
            <div class="flex items-center justify-between">
                <div>
                    <p class="text-xs sm:text-sm font-medium text-gray-600">Active Consultations</p>
                    <p class="text-2xl sm:text-3xl font-bold text-gray-900">24</p>
                </div>
                <div class="w-10 h-10 sm:w-12 sm:h-12 bg-green-100 rounded-lg flex items-center justify-center">
                    <i class="fas fa-comments text-green-600 text-lg sm:text-xl"></i>
                </div>
            </div>
            <div class="mt-3 sm:mt-4 flex items-center">
                <span class="text-green-600 text-xs sm:text-sm font-medium">
                    <i class="fas fa-arrow-up mr-1"></i>8%
                </span>
                <span class="text-gray-500 text-xs sm:text-sm ml-2">from last week</span>
            </div>
        </div>

        <!-- Destinations -->
        <div class="bg-white rounded-lg shadow-sm p-4 sm:p-6 border border-gray-200">
            <div class="flex items-center justify-between">
                <div>
                    <p class="text-xs sm:text-sm font-medium text-gray-600">Destinations</p>
                    <p class="text-2xl sm:text-3xl font-bold text-gray-900">15</p>
                </div>
                <div class="w-10 h-10 sm:w-12 sm:h-12 bg-purple-100 rounded-lg flex items-center justify-center">
                    <i class="fas fa-globe text-purple-600 text-lg sm:text-xl"></i>
                </div>
            </div>
            <div class="mt-3 sm:mt-4 flex items-center">
                <span class="text-green-600 text-xs sm:text-sm font-medium">
                    <i class="fas fa-arrow-up mr-1"></i>3%
                </span>
                <span class="text-gray-500 text-xs sm:text-sm ml-2">from last month</span>
            </div>
        </div>

        <!-- Revenue -->
        <div class="bg-white rounded-lg shadow-sm p-4 sm:p-6 border border-gray-200">
            <div class="flex items-center justify-between">
                <div>
                    <p class="text-xs sm:text-sm font-medium text-gray-600">Revenue</p>
                    <p class="text-2xl sm:text-3xl font-bold text-gray-900">$12,450</p>
                </div>
                <div class="w-10 h-10 sm:w-12 sm:h-12 bg-yellow-100 rounded-lg flex items-center justify-center">
                    <i class="fas fa-dollar-sign text-yellow-600 text-lg sm:text-xl"></i>
                </div>
            </div>
            <div class="mt-3 sm:mt-4 flex items-center">
                <span class="text-green-600 text-xs sm:text-sm font-medium">
                    <i class="fas fa-arrow-up mr-1"></i>15%
                </span>
                <span class="text-gray-500 text-xs sm:text-sm ml-2">from last month</span>
            </div>
        </div>
    </div>

    <!-- Charts and Tables Section -->
    <div class="grid grid-cols-1 xl:grid-cols-2 gap-4 sm:gap-6">
        <!-- Recent Activity -->
        <div class="bg-white rounded-lg shadow-sm border border-gray-200">
            <div class="p-4 sm:p-6 border-b border-gray-200">
                <h3 class="text-base sm:text-lg font-semibold text-gray-900">Recent Activity</h3>
            </div>
            <div class="p-4 sm:p-6">
                <div class="space-y-3 sm:space-y-4">
                    <div class="flex items-center space-x-3">
                        <div class="w-8 h-8 bg-blue-100 rounded-full flex items-center justify-center">
                            <i class="fas fa-user-plus text-blue-600 text-sm"></i>
                        </div>
                        <div class="flex-1 min-w-0">
                            <p class="text-xs sm:text-sm font-medium text-gray-900">New user registered</p>
                            <p class="text-xs text-gray-500">John Doe joined 2 hours ago</p>
                        </div>
                    </div>
                    
                    <div class="flex items-center space-x-3">
                        <div class="w-8 h-8 bg-green-100 rounded-full flex items-center justify-center">
                            <i class="fas fa-comment text-green-600 text-sm"></i>
                        </div>
                        <div class="flex-1 min-w-0">
                            <p class="text-xs sm:text-sm font-medium text-gray-900">New consultation request</p>
                            <p class="text-xs text-gray-500">Sarah requested consultation 4 hours ago</p>
                        </div>
                    </div>
                    
                    <div class="flex items-center space-x-3">
                        <div class="w-8 h-8 bg-purple-100 rounded-full flex items-center justify-center">
                            <i class="fas fa-globe text-purple-600 text-sm"></i>
                        </div>
                        <div class="flex-1 min-w-0">
                            <p class="text-xs sm:text-sm font-medium text-gray-900">Destination updated</p>
                            <p class="text-xs text-gray-500">Canada information updated 6 hours ago</p>
                        </div>
                    </div>
                    
                    <div class="flex items-center space-x-3">
                        <div class="w-8 h-8 bg-yellow-100 rounded-full flex items-center justify-center">
                            <i class="fas fa-star text-yellow-600 text-sm"></i>
                        </div>
                        <div class="flex-1 min-w-0">
                            <p class="text-xs sm:text-sm font-medium text-gray-900">New review received</p>
                            <p class="text-xs text-gray-500">5-star review from Mike 8 hours ago</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Quick Actions -->
        <div class="bg-white rounded-lg shadow-sm border border-gray-200">
            <div class="p-4 sm:p-6 border-b border-gray-200">
                <h3 class="text-base sm:text-lg font-semibold text-gray-900">Quick Actions</h3>
            </div>
            <div class="p-4 sm:p-6">
                <div class="grid grid-cols-2 gap-3 sm:gap-4">
                    <a href="{{ route('admin.users.create') }}" 
                       class="flex flex-col items-center p-3 sm:p-4 border border-gray-200 rounded-lg hover:bg-gray-50 transition-colors duration-200">
                        <div class="w-10 h-10 sm:w-12 sm:h-12 bg-blue-100 rounded-lg flex items-center justify-center mb-2 sm:mb-3">
                            <i class="fas fa-user-plus text-blue-600 text-sm sm:text-base"></i>
                        </div>
                        <span class="text-xs sm:text-sm font-medium text-gray-900 text-center">Add User</span>
                    </a>
                    
                    <a href="{{ route('admin.destinations.create') }}" 
                       class="flex flex-col items-center p-3 sm:p-4 border border-gray-200 rounded-lg hover:bg-gray-50 transition-colors duration-200">
                        <div class="w-10 h-10 sm:w-12 sm:h-12 bg-green-100 rounded-lg flex items-center justify-center mb-2 sm:mb-3">
                            <i class="fas fa-plus text-green-600 text-sm sm:text-base"></i>
                        </div>
                        <span class="text-xs sm:text-sm font-medium text-gray-900 text-center">Add Destination</span>
                    </a>
                    
                    <a href="{{ route('admin.consultations.index') }}" 
                       class="flex flex-col items-center p-3 sm:p-4 border border-gray-200 rounded-lg hover:bg-gray-50 transition-colors duration-200">
                        <div class="w-10 h-10 sm:w-12 sm:h-12 bg-purple-100 rounded-lg flex items-center justify-center mb-2 sm:mb-3">
                            <i class="fas fa-comments text-purple-600 text-sm sm:text-base"></i>
                        </div>
                        <span class="text-xs sm:text-sm font-medium text-gray-900 text-center">View Consultations</span>
                    </a>
                    
                    <a href="{{ route('admin.settings.general') }}" 
                       class="flex flex-col items-center p-3 sm:p-4 border border-gray-200 rounded-lg hover:bg-gray-50 transition-colors duration-200">
                        <div class="w-10 h-10 sm:w-12 sm:h-12 bg-yellow-100 rounded-lg flex items-center justify-center mb-2 sm:mb-3">
                            <i class="fas fa-cog text-yellow-600 text-sm sm:text-base"></i>
                        </div>
                        <span class="text-xs sm:text-sm font-medium text-gray-900 text-center">Settings</span>
                    </a>
                </div>
            </div>
        </div>
    </div>

    <!-- Recent Users Table -->
    <div class="bg-white rounded-lg shadow-sm border border-gray-200">
        <div class="p-4 sm:p-6 border-b border-gray-200">
            <h3 class="text-base sm:text-lg font-semibold text-gray-900">Recent Users</h3>
        </div>
        <div class="overflow-x-auto">
            <table class="min-w-full divide-y divide-gray-200">
                <thead class="bg-gray-50">
                    <tr>
                        <th class="px-3 sm:px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">User</th>
                        <th class="px-3 sm:px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider hidden sm:table-cell">Email</th>
                        <th class="px-3 sm:px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider hidden lg:table-cell">Joined</th>
                        <th class="px-3 sm:px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider hidden md:table-cell">Status</th>
                        <th class="px-3 sm:px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Actions</th>
                    </tr>
                </thead>
                <tbody class="bg-white divide-y divide-gray-200">
                    @foreach(\App\Models\User::latest()->take(5)->get() as $user)
                    <tr>
                        <td class="px-3 sm:px-6 py-4 whitespace-nowrap">
                            <div class="flex items-center">
                                <div class="w-8 h-8 bg-blue-500 rounded-full flex items-center justify-center">
                                    <i class="fas fa-user text-white text-sm"></i>
                                </div>
                                <div class="ml-3 sm:ml-4 min-w-0">
                                    <div class="text-sm font-medium text-gray-900 truncate">{{ $user->name }}</div>
                                    <div class="text-xs text-gray-500 sm:hidden">{{ $user->email }}</div>
                                </div>
                            </div>
                        </td>
                        <td class="px-3 sm:px-6 py-4 whitespace-nowrap hidden sm:table-cell">
                            <div class="text-sm text-gray-900 truncate">{{ $user->email }}</div>
                        </td>
                        <td class="px-3 sm:px-6 py-4 whitespace-nowrap hidden lg:table-cell">
                            <div class="text-sm text-gray-900">{{ $user->created_at->format('M d, Y') }}</div>
                        </td>
                        <td class="px-3 sm:px-6 py-4 whitespace-nowrap hidden md:table-cell">
                            <span class="inline-flex px-2 py-1 text-xs font-semibold rounded-full bg-green-100 text-green-800">
                                Active
                            </span>
                        </td>
                        <td class="px-3 sm:px-6 py-4 whitespace-nowrap text-sm font-medium">
                            <a href="{{ route('admin.users.show', $user) }}" class="text-blue-600 hover:text-blue-900 mr-2 sm:mr-3">View</a>
                            <a href="{{ route('admin.users.edit', $user) }}" class="text-indigo-600 hover:text-indigo-900">Edit</a>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection


