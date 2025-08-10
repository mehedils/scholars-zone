@extends('layouts.admin')

@section('content')
<div class="space-y-6">
    <!-- Page Header -->
    <div class="flex items-center justify-between">
        <div>
            <h1 class="text-2xl font-bold text-gray-900">Destinations Management</h1>
            <p class="text-gray-600">Manage study destinations and their information.</p>
        </div>
        <div class="flex space-x-3">
            <a href="{{ route('admin.destinations.create') }}" 
               class="bg-blue-600 text-white px-4 py-2 rounded-lg hover:bg-blue-700 transition-colors duration-200">
                <i class="fas fa-plus mr-2"></i>Add Destination
            </a>
        </div>
    </div>

    <!-- Statistics Cards -->
    <div class="grid grid-cols-1 md:grid-cols-4 gap-6">
        <div class="bg-white rounded-lg shadow-sm p-6 border border-gray-200">
            <div class="flex items-center justify-between">
                <div>
                    <p class="text-sm font-medium text-gray-600">Total Destinations</p>
                    <p class="text-3xl font-bold text-gray-900">15</p>
                </div>
                <div class="w-12 h-12 bg-blue-100 rounded-lg flex items-center justify-center">
                    <i class="fas fa-globe text-blue-600 text-xl"></i>
                </div>
            </div>
        </div>

        <div class="bg-white rounded-lg shadow-sm p-6 border border-gray-200">
            <div class="flex items-center justify-between">
                <div>
                    <p class="text-sm font-medium text-gray-600">Active</p>
                    <p class="text-3xl font-bold text-gray-900">12</p>
                </div>
                <div class="w-12 h-12 bg-green-100 rounded-lg flex items-center justify-center">
                    <i class="fas fa-check text-green-600 text-xl"></i>
                </div>
            </div>
        </div>

        <div class="bg-white rounded-lg shadow-sm p-6 border border-gray-200">
            <div class="flex items-center justify-between">
                <div>
                    <p class="text-sm font-medium text-gray-600">Draft</p>
                    <p class="text-3xl font-bold text-gray-900">3</p>
                </div>
                <div class="w-12 h-12 bg-yellow-100 rounded-lg flex items-center justify-center">
                    <i class="fas fa-edit text-yellow-600 text-xl"></i>
                </div>
            </div>
        </div>

        <div class="bg-white rounded-lg shadow-sm p-6 border border-gray-200">
            <div class="flex items-center justify-between">
                <div>
                    <p class="text-sm font-medium text-gray-600">Featured</p>
                    <p class="text-3xl font-bold text-gray-900">5</p>
                </div>
                <div class="w-12 h-12 bg-purple-100 rounded-lg flex items-center justify-center">
                    <i class="fas fa-star text-purple-600 text-xl"></i>
                </div>
            </div>
        </div>
    </div>

    <!-- Filters and Search -->
    <div class="bg-white rounded-lg shadow-sm border border-gray-200 p-6">
        <div class="flex flex-col md:flex-row md:items-center md:justify-between space-y-4 md:space-y-0">
            <div class="flex items-center space-x-4">
                <div class="relative">
                    <input type="text" 
                           placeholder="Search destinations..." 
                           class="w-64 pl-10 pr-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-transparent">
                    <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                        <i class="fas fa-search text-gray-400"></i>
                    </div>
                </div>
                
                <select class="border border-gray-300 rounded-lg px-3 py-2 focus:ring-2 focus:ring-blue-500 focus:border-transparent">
                    <option value="">All Regions</option>
                    <option value="north-america">North America</option>
                    <option value="europe">Europe</option>
                    <option value="asia">Asia</option>
                    <option value="australia">Australia</option>
                </select>
                
                <select class="border border-gray-300 rounded-lg px-3 py-2 focus:ring-2 focus:ring-blue-500 focus:border-transparent">
                    <option value="">All Status</option>
                    <option value="active">Active</option>
                    <option value="draft">Draft</option>
                    <option value="archived">Archived</option>
                </select>
            </div>
            
            <div class="flex items-center space-x-2">
                <span class="text-sm text-gray-600">Show:</span>
                <select class="border border-gray-300 rounded-lg px-3 py-2 focus:ring-2 focus:ring-blue-500 focus:border-transparent">
                    <option value="10">10</option>
                    <option value="25">25</option>
                    <option value="50">50</option>
                </select>
            </div>
        </div>
    </div>

    <!-- Destinations Grid -->
    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
        <!-- Sample Destination Cards -->
        <div class="bg-white rounded-lg shadow-sm border border-gray-200 overflow-hidden">
            <div class="h-48 bg-gradient-to-br from-blue-400 to-blue-600 flex items-center justify-center">
                <i class="fas fa-flag text-white text-4xl"></i>
            </div>
            <div class="p-6">
                <div class="flex items-center justify-between mb-2">
                    <h3 class="text-lg font-semibold text-gray-900">Canada</h3>
                    <span class="inline-flex px-2 py-1 text-xs font-semibold rounded-full bg-green-100 text-green-800">
                        Active
                    </span>
                </div>
                <p class="text-gray-600 text-sm mb-4">North America's premier study destination with world-class universities and diverse culture.</p>
                <div class="flex items-center justify-between">
                    <div class="flex items-center space-x-2">
                        <span class="text-xs text-gray-500">Universities: 15</span>
                        <span class="text-xs text-gray-500">Programs: 120</span>
                    </div>
                    <div class="flex items-center space-x-2">
                        <a href="#" class="text-blue-600 hover:text-blue-900">
                            <i class="fas fa-eye"></i>
                        </a>
                        <a href="#" class="text-indigo-600 hover:text-indigo-900">
                            <i class="fas fa-edit"></i>
                        </a>
                        <button class="text-red-600 hover:text-red-900">
                            <i class="fas fa-trash"></i>
                        </button>
                    </div>
                </div>
            </div>
        </div>

        <div class="bg-white rounded-lg shadow-sm border border-gray-200 overflow-hidden">
            <div class="h-48 bg-gradient-to-br from-green-400 to-green-600 flex items-center justify-center">
                <i class="fas fa-flag text-white text-4xl"></i>
            </div>
            <div class="p-6">
                <div class="flex items-center justify-between mb-2">
                    <h3 class="text-lg font-semibold text-gray-900">Germany</h3>
                    <span class="inline-flex px-2 py-1 text-xs font-semibold rounded-full bg-green-100 text-green-800">
                        Active
                    </span>
                </div>
                <p class="text-gray-600 text-sm mb-4">European excellence in education with affordable tuition and strong industry connections.</p>
                <div class="flex items-center justify-between">
                    <div class="flex items-center space-x-2">
                        <span class="text-xs text-gray-500">Universities: 12</span>
                        <span class="text-xs text-gray-500">Programs: 95</span>
                    </div>
                    <div class="flex items-center space-x-2">
                        <a href="#" class="text-blue-600 hover:text-blue-900">
                            <i class="fas fa-eye"></i>
                        </a>
                        <a href="#" class="text-indigo-600 hover:text-indigo-900">
                            <i class="fas fa-edit"></i>
                        </a>
                        <button class="text-red-600 hover:text-red-900">
                            <i class="fas fa-trash"></i>
                        </button>
                    </div>
                </div>
            </div>
        </div>

        <div class="bg-white rounded-lg shadow-sm border border-gray-200 overflow-hidden">
            <div class="h-48 bg-gradient-to-br from-purple-400 to-purple-600 flex items-center justify-center">
                <i class="fas fa-flag text-white text-4xl"></i>
            </div>
            <div class="p-6">
                <div class="flex items-center justify-between mb-2">
                    <h3 class="text-lg font-semibold text-gray-900">Australia</h3>
                    <span class="inline-flex px-2 py-1 text-xs font-semibold rounded-full bg-yellow-100 text-yellow-800">
                        Draft
                    </span>
                </div>
                <p class="text-gray-600 text-sm mb-4">Land down under offering quality education and amazing lifestyle opportunities.</p>
                <div class="flex items-center justify-between">
                    <div class="flex items-center space-x-2">
                        <span class="text-xs text-gray-500">Universities: 8</span>
                        <span class="text-xs text-gray-500">Programs: 75</span>
                    </div>
                    <div class="flex items-center space-x-2">
                        <a href="#" class="text-blue-600 hover:text-blue-900">
                            <i class="fas fa-eye"></i>
                        </a>
                        <a href="#" class="text-indigo-600 hover:text-indigo-900">
                            <i class="fas fa-edit"></i>
                        </a>
                        <button class="text-red-600 hover:text-red-900">
                            <i class="fas fa-trash"></i>
                        </button>
                    </div>
                </div>
            </div>
        </div>

        <div class="bg-white rounded-lg shadow-sm border border-gray-200 overflow-hidden">
            <div class="h-48 bg-gradient-to-br from-red-400 to-red-600 flex items-center justify-center">
                <i class="fas fa-flag text-white text-4xl"></i>
            </div>
            <div class="p-6">
                <div class="flex items-center justify-between mb-2">
                    <h3 class="text-lg font-semibold text-gray-900">United Kingdom</h3>
                    <span class="inline-flex px-2 py-1 text-xs font-semibold rounded-full bg-green-100 text-green-800">
                        Active
                    </span>
                </div>
                <p class="text-gray-600 text-sm mb-4">Historic universities with modern facilities and global recognition.</p>
                <div class="flex items-center justify-between">
                    <div class="flex items-center space-x-2">
                        <span class="text-xs text-gray-500">Universities: 20</span>
                        <span class="text-xs text-gray-500">Programs: 150</span>
                    </div>
                    <div class="flex items-center space-x-2">
                        <a href="#" class="text-blue-600 hover:text-blue-900">
                            <i class="fas fa-eye"></i>
                        </a>
                        <a href="#" class="text-indigo-600 hover:text-indigo-900">
                            <i class="fas fa-edit"></i>
                        </a>
                        <button class="text-red-600 hover:text-red-900">
                            <i class="fas fa-trash"></i>
                        </button>
                    </div>
                </div>
            </div>
        </div>

        <div class="bg-white rounded-lg shadow-sm border border-gray-200 overflow-hidden">
            <div class="h-48 bg-gradient-to-br from-indigo-400 to-indigo-600 flex items-center justify-center">
                <i class="fas fa-flag text-white text-4xl"></i>
            </div>
            <div class="p-6">
                <div class="flex items-center justify-between mb-2">
                    <h3 class="text-lg font-semibold text-gray-900">Netherlands</h3>
                    <span class="inline-flex px-2 py-1 text-xs font-semibold rounded-full bg-green-100 text-green-800">
                        Active
                    </span>
                </div>
                <p class="text-gray-600 text-sm mb-4">Innovative education system with English-taught programs and international focus.</p>
                <div class="flex items-center justify-between">
                    <div class="flex items-center space-x-2">
                        <span class="text-xs text-gray-500">Universities: 10</span>
                        <span class="text-xs text-gray-500">Programs: 85</span>
                    </div>
                    <div class="flex items-center space-x-2">
                        <a href="#" class="text-blue-600 hover:text-blue-900">
                            <i class="fas fa-eye"></i>
                        </a>
                        <a href="#" class="text-indigo-600 hover:text-indigo-900">
                            <i class="fas fa-edit"></i>
                        </a>
                        <button class="text-red-600 hover:text-red-900">
                            <i class="fas fa-trash"></i>
                        </button>
                    </div>
                </div>
            </div>
        </div>

        <div class="bg-white rounded-lg shadow-sm border border-gray-200 overflow-hidden">
            <div class="h-48 bg-gradient-to-br from-pink-400 to-pink-600 flex items-center justify-center">
                <i class="fas fa-plus text-white text-4xl"></i>
            </div>
            <div class="p-6">
                <div class="flex items-center justify-center h-full">
                    <a href="{{ route('admin.destinations.create') }}" 
                       class="flex flex-col items-center text-gray-500 hover:text-blue-600 transition-colors duration-200">
                        <i class="fas fa-plus text-2xl mb-2"></i>
                        <span class="text-sm font-medium">Add New Destination</span>
                    </a>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
