@extends('layouts.admin')

@section('content')
<div class="space-y-6">
    <!-- Page Header -->
    <div class="flex items-center justify-between">
        <div>
            <h1 class="text-2xl font-bold text-gray-900">Consultation Details</h1>
            <p class="text-gray-600">View and manage consultation request details.</p>
        </div>
        <div class="flex space-x-3">
            <a href="{{ route('admin.consultations.index') }}" class="bg-gray-600 text-white px-4 py-2 rounded-lg hover:bg-gray-700 transition-colors duration-200">
                <i class="fas fa-arrow-left mr-2"></i>Back to List
            </a>
        </div>
    </div>

    <!-- Consultation Information -->
    <div class="grid grid-cols-1 lg:grid-cols-3 gap-6">
        <!-- Main Information -->
        <div class="lg:col-span-2 space-y-6">
            <!-- Student Information -->
            <div class="bg-white rounded-lg shadow-sm border border-gray-200 p-6">
                <h2 class="text-lg font-semibold text-gray-900 mb-4">Student Information</h2>
                <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                    <div>
                        <label class="block text-sm font-medium text-gray-700">Full Name</label>
                        <p class="mt-1 text-sm text-gray-900">{{ $consultation->full_name }}</p>
                    </div>
                    <div>
                        <label class="block text-sm font-medium text-gray-700">Email</label>
                        <p class="mt-1 text-sm text-gray-900">{{ $consultation->email }}</p>
                    </div>
                    <div>
                        <label class="block text-sm font-medium text-gray-700">Phone</label>
                        <p class="mt-1 text-sm text-gray-900">{{ $consultation->phone }}</p>
                    </div>
                    <div>
                        <label class="block text-sm font-medium text-gray-700">Status</label>
                        <p class="mt-1">
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
                        </p>
                    </div>
                </div>
            </div>

            <!-- Study Preferences -->
            <div class="bg-white rounded-lg shadow-sm border border-gray-200 p-6">
                <h2 class="text-lg font-semibold text-gray-900 mb-4">Study Preferences</h2>
                <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                    <div>
                        <label class="block text-sm font-medium text-gray-700">Preferred Country</label>
                        <p class="mt-1 text-sm text-gray-900">{{ $consultation->preferred_country ?: 'Not specified' }}</p>
                    </div>
                    <div>
                        <label class="block text-sm font-medium text-gray-700">Study Level</label>
                        <p class="mt-1 text-sm text-gray-900">{{ $consultation->study_level ?: 'Not specified' }}</p>
                    </div>
                    <div>
                        <label class="block text-sm font-medium text-gray-700">Preferred Subject</label>
                        <p class="mt-1 text-sm text-gray-900">{{ $consultation->preferred_subject ?: 'Not specified' }}</p>
                    </div>
                    <div>
                        <label class="block text-sm font-medium text-gray-700">Preferred Intake</label>
                        <p class="mt-1 text-sm text-gray-900">{{ $consultation->preferred_intake ?: 'Not specified' }}</p>
                    </div>
                </div>
            </div>

            <!-- Message -->
            @if($consultation->message)
            <div class="bg-white rounded-lg shadow-sm border border-gray-200 p-6">
                <h2 class="text-lg font-semibold text-gray-900 mb-4">Message</h2>
                <div class="bg-gray-50 rounded-lg p-4">
                    <p class="text-sm text-gray-900 whitespace-pre-wrap">{{ $consultation->message }}</p>
                </div>
            </div>
            @endif

            <!-- Admin Notes -->
            <div class="bg-white rounded-lg shadow-sm border border-gray-200 p-6">
                <h2 class="text-lg font-semibold text-gray-900 mb-4">Admin Notes</h2>
                <form id="admin-notes-form">
                    <textarea 
                        id="admin-notes" 
                        rows="4" 
                        class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-transparent"
                        placeholder="Add notes about this consultation..."
                    >{{ $consultation->admin_notes }}</textarea>
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
                    <button onclick="updateStatus('pending')" class="w-full text-left px-3 py-2 rounded-lg border {{ $consultation->status === 'pending' ? 'bg-yellow-100 border-yellow-300' : 'bg-white border-gray-300 hover:bg-gray-50' }}">
                        <div class="flex items-center">
                            <div class="w-3 h-3 bg-yellow-500 rounded-full mr-3"></div>
                            <span class="text-sm font-medium">Pending</span>
                        </div>
                    </button>
                    <button onclick="updateStatus('contacted')" class="w-full text-left px-3 py-2 rounded-lg border {{ $consultation->status === 'contacted' ? 'bg-green-100 border-green-300' : 'bg-white border-gray-300 hover:bg-gray-50' }}">
                        <div class="flex items-center">
                            <div class="w-3 h-3 bg-green-500 rounded-full mr-3"></div>
                            <span class="text-sm font-medium">Contacted</span>
                        </div>
                    </button>
                    <button onclick="updateStatus('completed')" class="w-full text-left px-3 py-2 rounded-lg border {{ $consultation->status === 'completed' ? 'bg-purple-100 border-purple-300' : 'bg-white border-gray-300 hover:bg-gray-50' }}">
                        <div class="flex items-center">
                            <div class="w-3 h-3 bg-purple-500 rounded-full mr-3"></div>
                            <span class="text-sm font-medium">Completed</span>
                        </div>
                    </button>
                    <button onclick="updateStatus('cancelled')" class="w-full text-left px-3 py-2 rounded-lg border {{ $consultation->status === 'cancelled' ? 'bg-red-100 border-red-300' : 'bg-white border-gray-300 hover:bg-gray-50' }}">
                        <div class="flex items-center">
                            <div class="w-3 h-3 bg-red-500 rounded-full mr-3"></div>
                            <span class="text-sm font-medium">Cancelled</span>
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
                            <p class="text-sm font-medium text-gray-900">Consultation Requested</p>
                            <p class="text-xs text-gray-500">{{ $consultation->created_at->format('M d, Y g:i A') }}</p>
                        </div>
                    </div>
                    @if($consultation->contacted_at)
                    <div class="flex items-start">
                        <div class="w-3 h-3 bg-green-500 rounded-full mt-2 mr-3"></div>
                        <div>
                            <p class="text-sm font-medium text-gray-900">Contacted</p>
                            <p class="text-xs text-gray-500">{{ $consultation->contacted_at->format('M d, Y g:i A') }}</p>
                        </div>
                    </div>
                    @endif
                    @if($consultation->updated_at && $consultation->updated_at != $consultation->created_at)
                    <div class="flex items-start">
                        <div class="w-3 h-3 bg-gray-500 rounded-full mt-2 mr-3"></div>
                        <div>
                            <p class="text-sm font-medium text-gray-900">Last Updated</p>
                            <p class="text-xs text-gray-500">{{ $consultation->updated_at->format('M d, Y g:i A') }}</p>
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
                    <button onclick="callStudent()" class="w-full bg-green-600 text-white px-4 py-2 rounded-lg hover:bg-green-700 transition-colors duration-200">
                        <i class="fas fa-phone mr-2"></i>Call Student
                    </button>
                    <button onclick="deleteConsultation()" class="w-full bg-red-600 text-white px-4 py-2 rounded-lg hover:bg-red-700 transition-colors duration-200">
                        <i class="fas fa-trash mr-2"></i>Delete Consultation
                    </button>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
function updateStatus(status) {
    if (confirm('Are you sure you want to update the status to ' + status + '?')) {
        fetch(`{{ route('admin.consultations.update-status', $consultation) }}`, {
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
    
    fetch(`{{ route('admin.consultations.update-status', $consultation) }}`, {
        method: 'POST',
        headers: {
            'Content-Type': 'application/json',
            'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content'),
            'Accept': 'application/json',
        },
        body: JSON.stringify({ 
            status: '{{ $consultation->status }}',
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
    const email = '{{ $consultation->email }}';
    window.open(`mailto:${email}?subject=Consultation Request - Scholars Zone`);
}

function callStudent() {
    const phone = '{{ $consultation->phone }}';
    window.open(`tel:${phone}`);
}

function deleteConsultation() {
    if (confirm('Are you sure you want to delete this consultation? This action cannot be undone.')) {
        fetch(`{{ route('admin.consultations.destroy', $consultation) }}`, {
            method: 'DELETE',
            headers: {
                'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content'),
                'Accept': 'application/json',
            }
        })
        .then(response => response.json())
        .then(data => {
            if (data.success) {
                window.location.href = '{{ route("admin.consultations.index") }}';
            } else {
                alert('Error deleting consultation');
            }
        })
        .catch(error => {
            console.error('Error:', error);
            alert('Error deleting consultation');
        });
    }
}
</script>
@endsection
