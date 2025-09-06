@extends('layouts.admin')

@section('content')
<div class="space-y-6">
    <!-- Page Header -->
    <div class="flex items-center justify-between">
        <div>
            <h1 class="text-2xl font-bold text-gray-900">Consultations Management</h1>
            <p class="text-gray-600">Manage student consultation requests and appointments.</p>
        </div>
        <div class="flex space-x-3">
            <a href="{{ route('admin.consultations.export.csv', request()->query()) }}" 
               class="bg-green-600 text-white px-4 py-2 rounded-lg hover:bg-green-700 transition-colors duration-200 inline-flex items-center">
                <i class="fas fa-download mr-2"></i>Export CSV
            </a>
            <button class="bg-blue-600 text-white px-4 py-2 rounded-lg hover:bg-blue-700 transition-colors duration-200">
                <i class="fas fa-calendar-plus mr-2"></i>Schedule Meeting
            </button>
        </div>
    </div>

    <!-- Statistics Cards -->
    <div class="grid grid-cols-1 md:grid-cols-4 gap-6" id="statsContainer">
        <div class="bg-white rounded-lg shadow-sm p-6 border border-gray-200">
            <div class="flex items-center justify-between">
                <div>
                    <p class="text-sm font-medium text-gray-600">Total Requests</p>
                    <p class="text-3xl font-bold text-gray-900" id="totalCount">{{ $totalCount ?? $consultations->total() }}</p>
                </div>
                <div class="w-12 h-12 bg-blue-100 rounded-lg flex items-center justify-center">
                    <i class="fas fa-comments text-blue-600 text-xl"></i>
                </div>
            </div>
        </div>

        <div class="bg-white rounded-lg shadow-sm p-6 border border-gray-200">
            <div class="flex items-center justify-between">
                <div>
                    <p class="text-sm font-medium text-gray-600">Pending</p>
                    <p class="text-3xl font-bold text-gray-900" id="pendingCount">{{ $pendingCount ?? $consultations->where('status', 'pending')->count() }}</p>
                </div>
                <div class="w-12 h-12 bg-yellow-100 rounded-lg flex items-center justify-center">
                    <i class="fas fa-clock text-yellow-600 text-xl"></i>
                </div>
            </div>
        </div>

        <div class="bg-white rounded-lg shadow-sm p-6 border border-gray-200">
            <div class="flex items-center justify-between">
                <div>
                    <p class="text-sm font-medium text-gray-600">Contacted</p>
                    <p class="text-3xl font-bold text-gray-900" id="contactedCount">{{ $contactedCount ?? $consultations->where('status', 'contacted')->count() }}</p>
                </div>
                <div class="w-12 h-12 bg-green-100 rounded-lg flex items-center justify-center">
                    <i class="fas fa-calendar-check text-green-600 text-xl"></i>
                </div>
            </div>
        </div>

        <div class="bg-white rounded-lg shadow-sm p-6 border border-gray-200">
            <div class="flex items-center justify-between">
                <div>
                    <p class="text-sm font-medium text-gray-600">Completed</p>
                    <p class="text-3xl font-bold text-gray-900" id="completedCount">{{ $completedCount ?? $consultations->where('status', 'completed')->count() }}</p>
                </div>
                <div class="w-12 h-12 bg-purple-100 rounded-lg flex items-center justify-center">
                    <i class="fas fa-check-circle text-purple-600 text-xl"></i>
                </div>
            </div>
        </div>
    </div>

    <!-- Filters and Search -->
    <div class="bg-white rounded-lg shadow-sm border border-gray-200 p-6">
        <form id="filterForm" method="GET" action="{{ route('admin.consultations.index') }}">
            <div class="flex flex-col md:flex-row md:items-center md:justify-between space-y-4 md:space-y-0">
                <div class="flex items-center space-x-4">
                    <div class="relative">
                        <input type="text" 
                               name="search"
                               value="{{ request('search') }}"
                               placeholder="Search consultations..." 
                               class="w-64 pl-10 pr-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-transparent">
                        <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                            <i class="fas fa-search text-gray-400"></i>
                        </div>
                    </div>
                    
                    <select name="status" class="border border-gray-300 rounded-lg px-3 py-2 focus:ring-2 focus:ring-blue-500 focus:border-transparent">
                        <option value="">All Status</option>
                        <option value="pending" {{ request('status') == 'pending' ? 'selected' : '' }}>Pending</option>
                        <option value="contacted" {{ request('status') == 'contacted' ? 'selected' : '' }}>Contacted</option>
                        <option value="completed" {{ request('status') == 'completed' ? 'selected' : '' }}>Completed</option>
                        <option value="cancelled" {{ request('status') == 'cancelled' ? 'selected' : '' }}>Cancelled</option>
                    </select>

                    <div class="flex items-center space-x-2">
                        <input type="date" 
                               name="date_from" 
                               value="{{ request('date_from') }}"
                               class="border border-gray-300 rounded-lg px-3 py-2 focus:ring-2 focus:ring-blue-500 focus:border-transparent"
                               placeholder="From Date">
                        <span class="text-gray-500">to</span>
                        <input type="date" 
                               name="date_to" 
                               value="{{ request('date_to') }}"
                               class="border border-gray-300 rounded-lg px-3 py-2 focus:ring-2 focus:ring-blue-500 focus:border-transparent"
                               placeholder="To Date">
                    </div>
                </div>
                
                <div class="flex items-center space-x-2">
                    <span class="text-sm text-gray-600">Show:</span>
                    <select name="per_page" class="border border-gray-300 rounded-lg px-3 py-2 focus:ring-2 focus:ring-blue-500 focus:border-transparent">
                        <option value="10" {{ request('per_page') == '10' ? 'selected' : '' }}>10</option>
                        <option value="25" {{ request('per_page') == '25' ? 'selected' : '' }}>25</option>
                        <option value="50" {{ request('per_page') == '50' ? 'selected' : '' }}>50</option>
                    </select>
                    
                    <button type="submit" class="bg-blue-600 text-white px-4 py-2 rounded-lg hover:bg-blue-700 transition-colors duration-200">
                        <i class="fas fa-filter mr-2"></i>Filter
                    </button>
                    
                    <a href="{{ route('admin.consultations.index') }}" class="bg-gray-600 text-white px-4 py-2 rounded-lg hover:bg-gray-700 transition-colors duration-200">
                        <i class="fas fa-times mr-2"></i>Clear
                    </a>
                </div>
            </div>
        </form>
    </div>

    <!-- Consultations Table -->
    <div class="bg-white rounded-lg shadow-sm border border-gray-200">
        <div class="overflow-x-auto" id="tableContainer">
            @include('admin.consultations.partials.table')
        </div>
        
        <!-- Pagination -->
        <div id="paginationContainer">
            @include('admin.consultations.partials.pagination')
        </div>
    </div>
</div>

<script>
// AJAX filtering and pagination
document.addEventListener('DOMContentLoaded', function() {
    const filterForm = document.getElementById('filterForm');
    const searchInput = document.querySelector('input[name="search"]');
    const statusSelect = document.querySelector('select[name="status"]');
    const perPageSelect = document.querySelector('select[name="per_page"]');
    const dateFromInput = document.querySelector('input[name="date_from"]');
    const dateToInput = document.querySelector('input[name="date_to"]');
    
    // Check if we're on the consultations page
    if (!filterForm) {
        console.log('Not on consultations page, skipping AJAX setup');
        return;
    }
    
    // Debounce function for search
    function debounce(func, wait) {
        let timeout;
        return function executedFunction(...args) {
            const later = () => {
                clearTimeout(timeout);
                func(...args);
            };
            clearTimeout(timeout);
            timeout = setTimeout(later, wait);
        };
    }
    
    // Load consultations via AJAX
    window.loadConsultations = function(url = null) {
        if (!filterForm) return;
        
        const formData = new FormData(filterForm);
        const params = new URLSearchParams(formData);
        
        if (url) {
            params.set('page', new URL(url).searchParams.get('page'));
        }
        
        fetch(`${filterForm.action}?${params.toString()}`, {
            headers: {
                'X-Requested-With': 'XMLHttpRequest',
                'Accept': 'application/json',
            }
        })
        .then(response => response.json())
        .then(data => {
            const tableContainer = document.getElementById('tableContainer');
            const paginationContainer = document.getElementById('paginationContainer');
            
            if (tableContainer) tableContainer.innerHTML = data.html;
            if (paginationContainer) paginationContainer.innerHTML = data.pagination;
            
            // Update statistics if provided
            if (data.stats) {
                const totalCount = document.getElementById('totalCount');
                const pendingCount = document.getElementById('pendingCount');
                const contactedCount = document.getElementById('contactedCount');
                const completedCount = document.getElementById('completedCount');
                
                if (totalCount) totalCount.textContent = data.stats.total;
                if (pendingCount) pendingCount.textContent = data.stats.pending;
                if (contactedCount) contactedCount.textContent = data.stats.contacted;
                if (completedCount) completedCount.textContent = data.stats.completed;
            }
            
            // Update URL without page reload
            const newUrl = `${filterForm.action}?${params.toString()}`;
            window.history.pushState({}, '', newUrl);
        })
        .catch(error => {
            console.error('Error loading consultations:', error);
        });
    }
    
    // Search with debounce
    const debouncedSearch = debounce(() => {
        loadConsultations();
    }, 500);
    
    // Event listeners - only add if elements exist
    if (searchInput) {
        searchInput.addEventListener('input', debouncedSearch);
    }
    if (statusSelect) {
        statusSelect.addEventListener('change', loadConsultations);
    }
    if (perPageSelect) {
        perPageSelect.addEventListener('change', loadConsultations);
    }
    if (dateFromInput) {
        dateFromInput.addEventListener('change', loadConsultations);
    }
    if (dateToInput) {
        dateToInput.addEventListener('change', loadConsultations);
    }
    
    // Handle pagination clicks
    document.addEventListener('click', function(e) {
        if (e.target.matches('.pagination a')) {
            e.preventDefault();
            loadConsultations(e.target.href);
        }
    });
    
    // Handle form submission
    if (filterForm) {
        filterForm.addEventListener('submit', function(e) {
            e.preventDefault();
            loadConsultations();
        });
    }
});


</script>
@endsection
