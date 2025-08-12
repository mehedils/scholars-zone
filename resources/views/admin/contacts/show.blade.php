@extends('layouts.admin')

@section('content')
<div class="space-y-6">
    <!-- Page Header -->
    <div class="flex items-center justify-between">
        <div>
            <h1 class="text-2xl font-bold text-gray-900">Contact Message Details</h1>
            <p class="text-gray-600">View and manage contact message details.</p>
        </div>
        <div class="flex space-x-3">
            <a href="{{ route('admin.contacts.index') }}" class="bg-gray-600 text-white px-4 py-2 rounded-lg hover:bg-gray-700 transition-colors duration-200">
                <i class="fas fa-arrow-left mr-2"></i>Back to List
            </a>
        </div>
    </div>

    <!-- Contact Information -->
    <div class="grid grid-cols-1 lg:grid-cols-3 gap-6">
        <!-- Main Information -->
        <div class="lg:col-span-2 space-y-6">
            <!-- Sender Information -->
            <div class="bg-white rounded-lg shadow-sm border border-gray-200 p-6">
                <h2 class="text-lg font-semibold text-gray-900 mb-4">Sender Information</h2>
                <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                    <div>
                        <label class="block text-sm font-medium text-gray-700">Full Name</label>
                        <p class="mt-1 text-sm text-gray-900">{{ $contact->name }}</p>
                    </div>
                    <div>
                        <label class="block text-sm font-medium text-gray-700">Email</label>
                        <p class="mt-1 text-sm text-gray-900">{{ $contact->email }}</p>
                    </div>
                    <div>
                        <label class="block text-sm font-medium text-gray-700">Phone</label>
                        <p class="mt-1 text-sm text-gray-900">{{ $contact->phone ?: 'Not provided' }}</p>
                    </div>
                    <div>
                        <label class="block text-sm font-medium text-gray-700">Status</label>
                        <p class="mt-1">
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
                        </p>
                    </div>
                </div>
            </div>

            <!-- Message Details -->
            <div class="bg-white rounded-lg shadow-sm border border-gray-200 p-6">
                <h2 class="text-lg font-semibold text-gray-900 mb-4">Message Details</h2>
                <div class="space-y-4">
                    <div>
                        <label class="block text-sm font-medium text-gray-700">Subject</label>
                        <p class="mt-1 text-sm text-gray-900">{{ $contact->subject }}</p>
                    </div>
                    <div>
                        <label class="block text-sm font-medium text-gray-700">Message</label>
                        <div class="mt-1 bg-gray-50 rounded-lg p-4">
                            <p class="text-sm text-gray-900 whitespace-pre-wrap">{{ $contact->message }}</p>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Admin Notes -->
            <div class="bg-white rounded-lg shadow-sm border border-gray-200 p-6">
                <h2 class="text-lg font-semibold text-gray-900 mb-4">Admin Notes</h2>
                <form id="admin-notes-form">
                    <textarea 
                        id="admin-notes" 
                        rows="4" 
                        class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-transparent"
                        placeholder="Add notes about this contact message..."
                    >{{ $contact->admin_notes }}</textarea>
                    <div class="mt-4 flex space-x-3">
                        <button type="button" onclick="saveNotes()" class="bg-blue-600 text-white px-4 py-2 rounded-lg hover:bg-blue-700 transition-colors duration-200">
                            <i class="fas fa-save mr-2"></i>Save Notes
                        </button>
                    </div>
                </form>
            </div>
        </div>

        <!-- Sidebar -->
        <div class="space-y-6">
            <!-- Status Management -->
            <div class="bg-white rounded-lg shadow-sm border border-gray-200 p-6">
                <h2 class="text-lg font-semibold text-gray-900 mb-4">Status Management</h2>
                <div class="space-y-3">
                    <button onclick="updateStatus('unread')" class="w-full text-left px-3 py-2 rounded-lg border {{ $contact->status === 'unread' ? 'bg-red-100 border-red-300' : 'bg-white border-gray-300 hover:bg-gray-50' }}">
                        <div class="flex items-center">
                            <div class="w-3 h-3 bg-red-500 rounded-full mr-3"></div>
                            <span class="text-sm font-medium">Unread</span>
                        </div>
                    </button>
                    <button onclick="updateStatus('read')" class="w-full text-left px-3 py-2 rounded-lg border {{ $contact->status === 'read' ? 'bg-yellow-100 border-yellow-300' : 'bg-white border-gray-300 hover:bg-gray-50' }}">
                        <div class="flex items-center">
                            <div class="w-3 h-3 bg-yellow-500 rounded-full mr-3"></div>
                            <span class="text-sm font-medium">Read</span>
                        </div>
                    </button>
                    <button onclick="updateStatus('replied')" class="w-full text-left px-3 py-2 rounded-lg border {{ $contact->status === 'replied' ? 'bg-green-100 border-green-300' : 'bg-white border-gray-300 hover:bg-gray-50' }}">
                        <div class="flex items-center">
                            <div class="w-3 h-3 bg-green-500 rounded-full mr-3"></div>
                            <span class="text-sm font-medium">Replied</span>
                        </div>
                    </button>
                    <button onclick="updateStatus('archived')" class="w-full text-left px-3 py-2 rounded-lg border {{ $contact->status === 'archived' ? 'bg-gray-100 border-gray-300' : 'bg-white border-gray-300 hover:bg-gray-50' }}">
                        <div class="flex items-center">
                            <div class="w-3 h-3 bg-gray-500 rounded-full mr-3"></div>
                            <span class="text-sm font-medium">Archived</span>
                        </div>
                    </button>
                </div>
            </div>

            <!-- Timeline -->
            <div class="bg-white rounded-lg shadow-sm border border-gray-200 p-6">
                <h2 class="text-lg font-semibold text-gray-900 mb-4">Timeline</h2>
                <div class="space-y-4">
                    <div class="flex items-start">
                        <div class="w-3 h-3 bg-blue-500 rounded-full mt-2 mr-3"></div>
                        <div>
                            <p class="text-sm font-medium text-gray-900">Message Received</p>
                            <p class="text-xs text-gray-500">{{ $contact->created_at->format('M d, Y g:i A') }}</p>
                        </div>
                    </div>
                    @if($contact->replied_at)
                    <div class="flex items-start">
                        <div class="w-3 h-3 bg-green-500 rounded-full mt-2 mr-3"></div>
                        <div>
                            <p class="text-sm font-medium text-gray-900">Replied</p>
                            <p class="text-xs text-gray-500">{{ $contact->replied_at->format('M d, Y g:i A') }}</p>
                        </div>
                    </div>
                    @endif
                    @if($contact->updated_at && $contact->updated_at != $contact->created_at)
                    <div class="flex items-start">
                        <div class="w-3 h-3 bg-gray-500 rounded-full mt-2 mr-3"></div>
                        <div>
                            <p class="text-sm font-medium text-gray-900">Last Updated</p>
                            <p class="text-xs text-gray-500">{{ $contact->updated_at->format('M d, Y g:i A') }}</p>
                        </div>
                    </div>
                    @endif
                </div>
            </div>

            <!-- Actions -->
            <div class="bg-white rounded-lg shadow-sm border border-gray-200 p-6">
                <h2 class="text-lg font-semibold text-gray-900 mb-4">Actions</h2>
                <div class="space-y-3">
                    <button onclick="sendEmail()" class="w-full bg-blue-600 text-white px-4 py-2 rounded-lg hover:bg-blue-700 transition-colors duration-200">
                        <i class="fas fa-envelope mr-2"></i>Send Email
                    </button>
                    @if($contact->phone)
                    <button onclick="callSender()" class="w-full bg-green-600 text-white px-4 py-2 rounded-lg hover:bg-green-700 transition-colors duration-200">
                        <i class="fas fa-phone mr-2"></i>Call Sender
                    </button>
                    @endif
                    <button onclick="deleteContact()" class="w-full bg-red-600 text-white px-4 py-2 rounded-lg hover:bg-red-700 transition-colors duration-200">
                        <i class="fas fa-trash mr-2"></i>Delete Message
                    </button>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
function updateStatus(status) {
    if (confirm('Are you sure you want to update the status to ' + status + '?')) {
        fetch(`{{ route('admin.contacts.update-status', $contact) }}`, {
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

function saveNotes() {
    const notes = document.getElementById('admin-notes').value;
    
    fetch(`{{ route('admin.contacts.update-status', $contact) }}`, {
        method: 'POST',
        headers: {
            'Content-Type': 'application/json',
            'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content'),
            'Accept': 'application/json',
        },
        body: JSON.stringify({ 
            status: '{{ $contact->status }}',
            admin_notes: notes 
        })
    })
    .then(response => response.json())
    .then(data => {
        if (data.success) {
            alert('Notes saved successfully');
        } else {
            alert('Error saving notes');
        }
    })
    .catch(error => {
        console.error('Error:', error);
        alert('Error saving notes');
    });
}

function sendEmail() {
    const email = '{{ $contact->email }}';
    const subject = 'Re: {{ $contact->subject }}';
    window.open(`mailto:${email}?subject=${encodeURIComponent(subject)}`);
}

function callSender() {
    const phone = '{{ $contact->phone }}';
    if (phone) {
        window.open(`tel:${phone}`);
    }
}

function deleteContact() {
    if (confirm('Are you sure you want to delete this contact message? This action cannot be undone.')) {
        fetch(`{{ route('admin.contacts.destroy', $contact) }}`, {
            method: 'DELETE',
            headers: {
                'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content'),
                'Accept': 'application/json',
            }
        })
        .then(response => response.json())
        .then(data => {
            if (data.success) {
                window.location.href = '{{ route("admin.contacts.index") }}';
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
