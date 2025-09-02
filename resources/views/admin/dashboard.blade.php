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
    <div class="grid grid-cols-1 sm:grid-cols-2 gap-4 sm:gap-6">
        <!-- Consultations -->
        <div class="bg-white rounded-lg shadow-sm p-4 sm:p-6 border border-gray-200">
            <div class="flex items-center justify-between">
                <div>
                    <p class="text-xs sm:text-sm font-medium text-gray-600">Total Consultations</p>
                    <p class="text-2xl sm:text-3xl font-bold text-gray-900">{{ \App\Models\Consultation::count() }}</p>
                </div>
                <div class="w-10 h-10 sm:w-12 sm:h-12 bg-green-100 rounded-lg flex items-center justify-center">
                    <i class="fas fa-comments text-green-600 text-lg sm:text-xl"></i>
                </div>
            </div>
            <div class="mt-3 sm:mt-4">
                <div class="flex items-center justify-between text-xs sm:text-sm">
                    <span class="text-gray-500">Pending: {{ \App\Models\Consultation::where('status', 'pending')->count() }}</span>
                    <span class="text-gray-500">Contacted: {{ \App\Models\Consultation::where('status', 'contacted')->count() }}</span>
                    <span class="text-gray-500">Completed: {{ \App\Models\Consultation::where('status', 'completed')->count() }}</span>
                </div>
            </div>
        </div>

        <!-- Contact Messages -->
        <div class="bg-white rounded-lg shadow-sm p-4 sm:p-6 border border-gray-200">
            <div class="flex items-center justify-between">
                <div>
                    <p class="text-xs sm:text-sm font-medium text-gray-600">Contact Messages</p>
                    <p class="text-2xl sm:text-3xl font-bold text-gray-900">{{ \App\Models\Contact::count() }}</p>
                </div>
                <div class="w-10 h-10 sm:w-12 sm:h-12 bg-blue-100 rounded-lg flex items-center justify-center">
                    <i class="fas fa-envelope text-blue-600 text-lg sm:text-xl"></i>
                </div>
            </div>
            <div class="mt-3 sm:mt-4">
                <div class="flex items-center justify-between text-xs sm:text-sm">
                    <span class="text-gray-500">Unread: {{ \App\Models\Contact::where('status', 'unread')->count() }}</span>
                    <span class="text-gray-500">Read: {{ \App\Models\Contact::where('status', 'read')->count() }}</span>
                    <span class="text-gray-500">Replied: {{ \App\Models\Contact::where('status', 'replied')->count() }}</span>
                </div>
            </div>
        </div>
    </div>

    <!-- Charts and Tables Section -->
    <div class="grid grid-cols-1 xl:grid-cols-2 gap-4 sm:gap-6">
        <!-- Recent Consultations -->
        <div class="bg-white rounded-lg shadow-sm border border-gray-200">
            <div class="p-4 sm:p-6 border-b border-gray-200">
                <div class="flex items-center justify-between">
                    <h3 class="text-base sm:text-lg font-semibold text-gray-900">Recent Consultations</h3>
                    <a href="{{ route('admin.consultations.index') }}" class="text-blue-600 hover:text-blue-800 text-sm">View All</a>
                </div>
            </div>
            <div class="p-4 sm:p-6">
                <div class="space-y-3 sm:space-y-4">
                    @foreach(\App\Models\Consultation::latest()->take(5)->get() as $consultation)
                    <div class="flex items-center space-x-3">
                        <div class="w-8 h-8 bg-green-100 rounded-full flex items-center justify-center">
                            <i class="fas fa-comment text-green-600 text-sm"></i>
                        </div>
                        <div class="flex-1 min-w-0">
                            <p class="text-xs sm:text-sm font-medium text-gray-900">{{ $consultation->full_name }}</p>
                            <p class="text-xs text-gray-500">{{ $consultation->preferred_country ?: 'No country specified' }} • {{ $consultation->created_at->diffForHumans() }}</p>
                        </div>
                        <div class="flex-shrink-0">
                            @if($consultation->status === 'pending')
                                <span class="inline-flex px-2 py-1 text-xs font-semibold rounded-full bg-yellow-100 text-yellow-800">
                                    Pending
                                </span>
                            @elseif($consultation->status === 'contacted')
                                <span class="inline-flex px-2 py-1 text-xs font-semibold rounded-full bg-green-100 text-green-800">
                                    Contacted
                                </span>
                            @elseif($consultation->status === 'completed')
                                <span class="inline-flex px-2 py-1 text-xs font-semibold rounded-full bg-purple-100 text-purple-800">
                                    Completed
                                </span>
                            @else
                                <span class="inline-flex px-2 py-1 text-xs font-semibold rounded-full bg-red-100 text-red-800">
                                    Cancelled
                                </span>
                            @endif
                        </div>
                    </div>
                    @endforeach
                </div>
            </div>
        </div>

        <!-- Recent Contact Messages -->
        <div class="bg-white rounded-lg shadow-sm border border-gray-200">
            <div class="p-4 sm:p-6 border-b border-gray-200">
                <div class="flex items-center justify-between">
                    <h3 class="text-base sm:text-lg font-semibold text-gray-900">Recent Contact Messages</h3>
                    <a href="{{ route('admin.contacts.index') }}" class="text-blue-600 hover:text-blue-800 text-sm">View All</a>
                </div>
            </div>
            <div class="p-4 sm:p-6">
                <div class="space-y-3 sm:space-y-4">
                    @foreach(\App\Models\Contact::latest()->take(5)->get() as $contact)
                    <div class="flex items-center space-x-3">
                        <div class="w-8 h-8 bg-blue-100 rounded-full flex items-center justify-center">
                            <i class="fas fa-envelope text-blue-600 text-sm"></i>
                        </div>
                        <div class="flex-1 min-w-0">
                            <p class="text-xs sm:text-sm font-medium text-gray-900">{{ $contact->name }}</p>
                            <p class="text-xs text-gray-500">{{ Str::limit($contact->subject, 30) }} • {{ $contact->created_at->diffForHumans() }}</p>
                        </div>
                        <div class="flex-shrink-0">
                            @if($contact->status === 'unread')
                                <span class="inline-flex px-2 py-1 text-xs font-semibold rounded-full bg-red-100 text-red-800">
                                    Unread
                                </span>
                            @elseif($contact->status === 'read')
                                <span class="inline-flex px-2 py-1 text-xs font-semibold rounded-full bg-gray-100 text-gray-800">
                                    Read
                                </span>
                            @else
                                <span class="inline-flex px-2 py-1 text-xs font-semibold rounded-full bg-green-100 text-green-800">
                                    Replied
                                </span>
                            @endif
                        </div>
                    </div>
                    @endforeach
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
            <div class="grid grid-cols-1 sm:grid-cols-3 gap-3 sm:gap-4">
                <a href="{{ route('admin.consultations.index') }}" 
                   class="flex flex-col items-center p-3 sm:p-4 border border-gray-200 rounded-lg hover:bg-gray-50 transition-colors duration-200">
                    <div class="w-10 h-10 sm:w-12 sm:h-12 bg-green-100 rounded-lg flex items-center justify-center mb-2 sm:mb-3">
                        <i class="fas fa-comments text-green-600 text-sm sm:text-base"></i>
                    </div>
                    <span class="text-xs sm:text-sm font-medium text-gray-900 text-center">View Consultations</span>
                </a>
                
                <a href="{{ route('admin.contacts.index') }}" 
                   class="flex flex-col items-center p-3 sm:p-4 border border-gray-200 rounded-lg hover:bg-gray-50 transition-colors duration-200">
                    <div class="w-10 h-10 sm:w-12 sm:h-12 bg-blue-100 rounded-lg flex items-center justify-center mb-2 sm:mb-3">
                        <i class="fas fa-envelope text-blue-600 text-sm sm:text-base"></i>
                    </div>
                    <span class="text-xs sm:text-sm font-medium text-gray-900 text-center">View Messages</span>
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
@endsection


