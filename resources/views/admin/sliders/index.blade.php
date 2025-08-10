@extends('layouts.admin')

@section('content')
<div class="space-y-6">
    <!-- Page Header -->
    <div class="flex items-center justify-between">
        <div>
            <h1 class="text-2xl font-bold text-gray-900">Sliders</h1>
            <p class="text-gray-600">Manage your website sliders with text and button options.</p>
        </div>
        <a href="{{ route('admin.sliders.create') }}" 
           class="bg-blue-600 text-white px-4 py-2 rounded-lg hover:bg-blue-700 transition-colors duration-200">
            <i class="fas fa-plus mr-2"></i>Add Slider
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

    <!-- Sliders List -->
    <div class="bg-white rounded-lg shadow-sm border border-gray-200">
        @if(count($sliders) > 0)
            <div class="overflow-x-auto">
                <table class="min-w-full divide-y divide-gray-200">
                    <thead class="bg-gray-50">
                        <tr>
                            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Image</th>
                            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Title</th>
                            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Subtitle</th>
                            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Button</th>
                            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Order</th>
                            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Status</th>
                            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Actions</th>
                        </tr>
                    </thead>
                    <tbody class="bg-white divide-y divide-gray-200" id="sliders-tbody">
                        @foreach($sliders as $slider)
                        <tr data-id="{{ $slider->id }}" class="cursor-move">
                            <td class="px-6 py-4 whitespace-nowrap">
                                @if($slider->image)
                                    <img src="{{ $slider->image_url }}" alt="{{ $slider->title }}" 
                                         class="w-16 h-12 object-cover rounded-lg">
                                @else
                                    <div class="w-16 h-12 bg-gray-200 rounded-lg flex items-center justify-center">
                                        <i class="fas fa-image text-gray-400"></i>
                                    </div>
                                @endif
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap">
                                <div class="text-sm font-medium text-gray-900">
                                    {{ $slider->title ?: 'No title' }}
                                </div>
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap">
                                <div class="text-sm text-gray-900">
                                    {{ $slider->subtitle ?: 'No subtitle' }}
                                </div>
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap">
                                <div class="text-sm text-gray-900">
                                    @if($slider->button_text && $slider->button_url)
                                        <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium bg-blue-100 text-blue-800">
                                            {{ $slider->button_text }}
                                        </span>
                                    @else
                                        <span class="text-gray-400">No button</span>
                                    @endif
                                </div>
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap">
                                <div class="text-sm text-gray-900">{{ $slider->order }}</div>
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap">
                                <button onclick="toggleSlider({{ $slider->id }})" 
                                        class="toggle-btn inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium transition-colors duration-200"
                                        data-id="{{ $slider->id }}"
                                        data-active="{{ $slider->is_active ? 'true' : 'false' }}">
                                    @if($slider->is_active)
                                        <span class="bg-green-100 text-green-800">Active</span>
                                    @else
                                        <span class="bg-red-100 text-red-800">Inactive</span>
                                    @endif
                                </button>
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap text-sm font-medium">
                                <div class="flex space-x-2">
                                    <a href="{{ route('admin.sliders.show', $slider->id) }}" 
                                       class="text-blue-600 hover:text-blue-900">
                                        <i class="fas fa-eye"></i>
                                    </a>
                                    <a href="{{ route('admin.sliders.edit', $slider->id) }}" 
                                       class="text-indigo-600 hover:text-indigo-900">
                                        <i class="fas fa-edit"></i>
                                    </a>
                                    <form action="{{ route('admin.sliders.destroy', $slider->id) }}" 
                                          method="POST" class="inline" 
                                          onsubmit="return confirm('Are you sure you want to delete this slider?')">
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
                <i class="fas fa-images text-4xl text-gray-300 mb-4"></i>
                <h3 class="text-lg font-medium text-gray-900 mb-2">No sliders found</h3>
                <p class="text-gray-600 mb-6">Get started by creating your first slider.</p>
                <a href="{{ route('admin.sliders.create') }}" 
                   class="bg-blue-600 text-white px-4 py-2 rounded-lg hover:bg-blue-700 transition-colors duration-200">
                    <i class="fas fa-plus mr-2"></i>Create First Slider
                </a>
            </div>
        @endif
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/sortablejs@1.15.0/Sortable.min.js"></script>
<script>
// Drag and drop functionality
new Sortable(document.getElementById('sliders-tbody'), {
    animation: 150,
    onEnd: function(evt) {
        const sliders = [];
        document.querySelectorAll('#sliders-tbody tr').forEach((row, index) => {
            sliders.push({
                id: row.dataset.id,
                order: index
            });
        });
        
        fetch('{{ route("admin.sliders.update-order") }}', {
            method: 'POST',
            headers: {
                'Content-Type': 'application/json',
                'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content')
            },
            body: JSON.stringify({ sliders: sliders })
        })
        .then(response => response.json())
        .then(data => {
            if (data.success) {
                // Update order numbers in the table
                document.querySelectorAll('#sliders-tbody tr').forEach((row, index) => {
                    row.querySelector('td:nth-child(5) .text-sm').textContent = index;
                });
            }
        });
    }
});

// Toggle slider status
function toggleSlider(id) {
    fetch(`/admin/sliders/${id}/toggle`, {
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
