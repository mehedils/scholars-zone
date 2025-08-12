@extends('layouts.admin')

@section('content')
<div class="space-y-6">
    <!-- Page Header -->
    <div class="flex items-center justify-between">
        <div>
            <h1 class="text-2xl font-bold text-gray-900">Contact Messages</h1>
            <p class="text-gray-600">Manage contact form submissions and inquiries.</p>
        </div>
    </div>

    <!-- Statistics Cards -->
    <div class="grid grid-cols-1 md:grid-cols-4 gap-6">
        <div class="bg-white rounded-lg shadow-sm p-6 border border-gray-200">
            <div class="flex items-center justify-between">
                <div>
                    <p class="text-sm font-medium text-gray-600">Total Messages</p>
                    <p class="text-3xl font-bold text-gray-900">{{ $contacts->total() }}</p>
                </div>
                <div class="w-12 h-12 bg-blue-100 rounded-lg flex items-center justify-center">
                    <i class="fas fa-envelope text-blue-600 text-xl"></i>
                </div>
            </div>
        </div>

        <div class="bg-white rounded-lg shadow-sm p-6 border border-gray-200">
            <div class="flex items-center justify-between">
                <div>
                    <p class="text-sm font-medium text-gray-600">Unread</p>
                    <p class="text-3xl font-bold text-gray-900">{{ $contacts->where('status', 'unread')->count() }}</p>
                </div>
                <div class="w-12 h-12 bg-red-100 rounded-lg flex items-center justify-center">
                    <i class="fas fa-envelope-open text-red-600 text-xl"></i>
                </div>
            </div>
        </div>

        <div class="bg-white rounded-lg shadow-sm p-6 border border-gray-200">
            <div class="flex items-center justify-between">
                <div>
                    <p class="text-sm font-medium text-gray-600">Read</p>
                    <p class="text-3xl font-bold text-gray-900">{{ $contacts->where('status', 'read')->count() }}</p>
                </div>
                <div class="w-12 h-12 bg-yellow-100 rounded-lg flex items-center justify-center">
                    <i class="fas fa-envelope-open text-yellow-600 text-xl"></i>
                </div>
            </div>
        </div>

        <div class="bg-white rounded-lg shadow-sm p-6 border border-gray-200">
            <div class="flex items-center justify-between">
                <div>
                    <p class="text-sm font-medium text-gray-600">Replied</p>
                    <p class="text-3xl font-bold text-gray-900">{{ $contacts->where('status', 'replied')->count() }}</p>
                </div>
                <div class="w-12 h-12 bg-green-100 rounded-lg flex items-center justify-center">
                    <i class="fas fa-reply text-green-600 text-xl"></i>
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
                           placeholder="Search messages..." 
                           class="w-64 pl-10 pr-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-transparent">
                    <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                        <i class="fas fa-search text-gray-400"></i>
                    </div>
                </div>
                
                <select class="border border-gray-300 rounded-lg px-3 py-2 focus:ring-2 focus:ring-blue-500 focus:border-transparent">
                    <option value="">All Status</option>
                    <option value="unread">Unread</option>
                    <option value="read">Read</option>
                    <option value="replied">Replied</option>
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

    <!-- Contact Messages Table -->
    <div class="bg-white rounded-lg shadow-sm border border-gray-200">
        <div class="overflow-x-auto">
            <table class="min-w-full divide-y divide-gray-200">
                <thead class="bg-gray-50">
                    <tr>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Sender</th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Subject</th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Message</th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Status</th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Date</th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Actions</th>
                    </tr>
                </thead>
                <tbody class="bg-white divide-y divide-gray-200">
                    @forelse($contacts as $contact)
                    <tr class="hover:bg-gray-50 {{ $contact->status === 'unread' ? 'bg-blue-50' : '' }}">
                        <td class="px-6 py-4 whitespace-nowrap">
                            <div class="flex items-center">
                                <div class="w-10 h-10 bg-purple-500 rounded-full flex items-center justify-center">
                                    <i class="fas fa-user text-white"></i>
                                </div>
                                <div class="ml-4">
                                    <div class="text-sm font-medium text-gray-900">{{ $contact->name }}</div>
                                    <div class="text-sm text-gray-500">{{ $contact->email }}</div>
                                    @if($contact->phone)
                                        <div class="text-sm text-gray-500">{{ $contact->phone }}</div>
                                    @endif
                                </div>
                            </div>
                        </td>
                        <td class="px-6 py-4 whitespace-nowrap">
                            <div class="text-sm font-medium text-gray-900">{{ $contact->subject }}</div>
                        </td>
                        <td class="px-6 py-4">
                            <div class="text-sm text-gray-900 max-w-xs truncate">
                                {{ $contact->message_preview }}
                            </div>
                        </td>
                        <td class="px-6 py-4 whitespace-nowrap">
                            @if($contact->status === 'unread')
                                <span class="inline-flex px-2 py-1 text-xs font-semibold rounded-full bg-red-100 text-red-800">
                                    Unread
                                </span>
                            @elseif($contact->status === 'read')
                                <span class="inline-flex px-2 py-1 text-xs font-semibold rounded-full bg-yellow-100 text-yellow-800">
                                    Read
                                </span>
                            @elseif($contact->status === 'replied')
                                <span class="inline-flex px-2 py-1 text-xs font-semibold rounded-full bg-green-100 text-green-800">
                                    Replied
                                </span>
                            @else
                                <span class="inline-flex px-2 py-1 text-xs font-semibold rounded-full bg-gray-100 text-gray-800">
                                    Archived
                                </span>
                            @endif
                        </td>
                        <td class="px-6 py-4 whitespace-nowrap">
                            <div class="text-sm text-gray-900">{{ $contact->created_at->format('M d, Y') }}</div>
                            <div class="text-sm text-gray-500">{{ $contact->created_at->diffForHumans() }}</div>
                        </td>
                        <td class="px-6 py-4 whitespace-nowrap text-sm font-medium">
                            <div class="flex items-center space-x-2">
                                <a href="{{ route('admin.contacts.show', $contact) }}" class="text-blue-600 hover:text-blue-900" title="View Details">
                                    <i class="fas fa-eye"></i>
                                </a>
                                <button onclick="updateContactStatus({{ $contact->id }}, 'read')" class="text-yellow-600 hover:text-yellow-900" title="Mark as Read">
                                    <i class="fas fa-envelope-open"></i>
                                </button>
                                <button onclick="updateContactStatus({{ $contact->id }}, 'replied')" class="text-green-600 hover:text-green-900" title="Mark as Replied">
                                    <i class="fas fa-reply"></i>
                                </button>
                                <button onclick="deleteContact({{ $contact->id }})" class="text-red-600 hover:text-red-900" title="Delete">
                                    <i class="fas fa-trash"></i>
                                </button>
                            </div>
                        </td>
                    </tr>
                    @empty
                    <tr>
                        <td colspan="6" class="px-6 py-4 text-center text-gray-500">
                            No contact messages found.
                        </td>
                    </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
        
        <!-- Pagination -->
        @if($contacts->hasPages())
        <div class="bg-white px-4 py-3 border-t border-gray-200 sm:px-6">
            {{ $contacts->links() }}
        </div>
        @endif
    </div>
</div>

<script>
function updateContactStatus(contactId, status) {
    if (confirm('Are you sure you want to update the status?')) {
        fetch(`/admin/contacts/${contactId}/update-status`, {
            method: 'POST',
            headers: {
                'Content-Type': 'application/json',
                'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content'),
                'Accept': 'application/json',
            },
            body: JSON.stringify({ status: status })
        })
        .then(response => response.json())
        .then(data => {
            if (data.success) {
                location.reload();
            } else {
                alert('Error updating status');
            }
        })
        .catch(error => {
            console.error('Error:', error);
            alert('Error updating status');
        });
    }
}

function deleteContact(contactId) {
    if (confirm('Are you sure you want to delete this contact message?')) {
        fetch(`/admin/contacts/${contactId}`, {
            method: 'DELETE',
            headers: {
                'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content'),
                'Accept': 'application/json',
            }
        })
        .then(response => response.json())
        .then(data => {
            if (data.success) {
                location.reload();
            } else {
                alert('Error deleting contact message');
            }
        })
        .catch(error => {
            console.error('Error:', error);
            alert('Error deleting contact message');
        });
    }
}
</script>
@endsection
