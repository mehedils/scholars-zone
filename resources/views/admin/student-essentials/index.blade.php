@extends('layouts.admin')

@section('content')
<div class="space-y-6">
    <!-- Page Header -->
    <div class="flex items-center justify-between">
        <div>
            <h1 class="text-2xl font-bold text-gray-900">Student Essentials</h1>
            <p class="text-gray-600">Manage your student essential services displayed on the our-services page.</p>
        </div>
        <a href="{{ route('admin.student-essentials.create') }}" 
           class="bg-blue-600 text-white px-4 py-2 rounded-lg hover:bg-blue-700 transition-colors duration-200">
            <i class="fas fa-plus mr-2"></i>Add Student Essential
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

    <!-- Student Essentials List -->
    <div class="bg-white rounded-lg shadow-sm border border-gray-200">
        @if(count($studentEssentials) > 0)
            <div class="overflow-x-auto">
                <table class="min-w-full divide-y divide-gray-200">
                    <thead class="bg-gray-50">
                        <tr>
                            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Icon</th>
                            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Title</th>
                            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Description</th>
                            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Learn More</th>
                            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Order</th>
                            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Status</th>
                            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Actions</th>
                        </tr>
                    </thead>
                    <tbody class="bg-white divide-y divide-gray-200" id="student-essentials-tbody">
                        @foreach($studentEssentials as $essential)
                        <tr data-id="{{ $essential->id }}" class="cursor-move">
                            <td class="px-6 py-4 whitespace-nowrap">
                                <div class="w-12 h-12 bg-purple-100 rounded-full flex items-center justify-center">
                                    <i class="{{ $essential->icon }} text-purple-600 text-xl"></i>
                                </div>
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap">
                                <div class="text-sm font-medium text-gray-900">{{ $essential->title }}</div>
                            </td>
                            <td class="px-6 py-4">
                                <div class="text-sm text-gray-900">
                                    {{ Str::limit($essential->description, 80) }}
                                </div>
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap">
                                @if($essential->show_learn_more)
                                    <span class="bg-green-100 text-green-800 px-2 py-1 rounded-full text-xs">Enabled</span>
                                    @if($essential->learn_more_url)
                                        <div class="text-xs text-gray-500 mt-1">
                                            {{ Str::limit($essential->learn_more_url, 30) }}
                                        </div>
                                    @endif
                                @else
                                    <span class="bg-gray-100 text-gray-800 px-2 py-1 rounded-full text-xs">Disabled</span>
                                @endif
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap">
                                <div class="text-sm text-gray-900">{{ $essential->order }}</div>
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap">
                                <button onclick="toggleEssential({{ $essential->id }})" 
                                        class="toggle-btn inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium transition-colors duration-200"
                                        data-id="{{ $essential->id }}"
                                        data-active="{{ $essential->is_active ? 'true' : 'false' }}">
                                    @if($essential->is_active)
                                        <span class="bg-green-100 text-green-800">Active</span>
                                    @else
                                        <span class="bg-red-100 text-red-800">Inactive</span>
                                    @endif
                                </button>
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap text-sm font-medium">
                                <div class="flex space-x-2">
                                    <a href="{{ route('admin.student-essentials.show', $essential->id) }}" 
                                       class="text-blue-600 hover:text-blue-900">
                                        <i class="fas fa-eye"></i>
                                    </a>
                                    <a href="{{ route('admin.student-essentials.edit', $essential->id) }}" 
                                       class="text-indigo-600 hover:text-indigo-900">
                                        <i class="fas fa-edit"></i>
                                    </a>
                                    <form action="{{ route('admin.student-essentials.destroy', $essential->id) }}" 
                                          method="POST" class="inline" 
                                          onsubmit="return confirm('Are you sure you want to delete this student essential?')">
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
                <i class="fas fa-graduation-cap text-4xl text-gray-300 mb-4"></i>
                <h3 class="text-lg font-medium text-gray-900 mb-2">No student essentials found</h3>
                <p class="text-gray-600 mb-6">Get started by creating your first student essential service.</p>
                <a href="{{ route('admin.student-essentials.create') }}" 
                   class="bg-blue-600 text-white px-4 py-2 rounded-lg hover:bg-blue-700 transition-colors duration-200">
                    <i class="fas fa-plus mr-2"></i>Create First Student Essential
                </a>
            </div>
        @endif
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/sortablejs@1.15.0/Sortable.min.js"></script>
<script>
// Drag and drop functionality
new Sortable(document.getElementById('student-essentials-tbody'), {
    animation: 150,
    onEnd: function(evt) {
        const essentials = [];
        document.querySelectorAll('#student-essentials-tbody tr').forEach((row, index) => {
            essentials.push({
                id: row.dataset.id,
                order: index
            });
        });
        
        fetch('{{ route("admin.student-essentials.update-order") }}', {
            method: 'POST',
            headers: {
                'Content-Type': 'application/json',
                'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content')
            },
            body: JSON.stringify({ orders: essentials })
        })
        .then(response => response.json())
        .then(data => {
            if (data.success) {
                // Update order numbers in the table
                document.querySelectorAll('#student-essentials-tbody tr').forEach((row, index) => {
                    row.querySelector('td:nth-child(5) .text-sm').textContent = index;
                });
            }
        });
    }
});

// Toggle essential status
function toggleEssential(id) {
    fetch(`/admin/student-essentials/${id}/toggle`, {
        method: 'POST',
        headers: {
            'Content-Type': 'application/json',
            'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content')
        }
    })
    .then(response => response.json())
    .then(data => {
        if (data.success) {
            const button = document.querySelector(`[data-id="${id}"]`);
            const span = button.querySelector('span');
            
            if (data.is_active) {
                span.className = 'bg-green-100 text-green-800';
                span.textContent = 'Active';
            } else {
                span.className = 'bg-red-100 text-red-800';
                span.textContent = 'Inactive';
            }
            
            button.dataset.active = data.is_active.toString();
        }
    });
}
</script>
@endsection
