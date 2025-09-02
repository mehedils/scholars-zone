<table class="min-w-full divide-y divide-gray-200">
    <thead class="bg-gray-50">
        <tr>
            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Student</th>
            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Country</th>
            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Study Level</th>
            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Status</th>
            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Date</th>
            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Actions</th>
        </tr>
    </thead>
    <tbody class="bg-white divide-y divide-gray-200">
        @forelse($consultations as $consultation)
        <tr class="hover:bg-gray-50">
            <td class="px-6 py-4 whitespace-nowrap">
                <div class="flex items-center">
                    <div class="w-10 h-10 bg-blue-500 rounded-full flex items-center justify-center">
                        <i class="fas fa-user text-white"></i>
                    </div>
                    <div class="ml-4">
                        <div class="text-sm font-medium text-gray-900">{{ $consultation->full_name }}</div>
                        <div class="text-sm text-gray-500">{{ $consultation->email }}</div>
                        <div class="text-sm text-gray-500">{{ $consultation->phone }}</div>
                    </div>
                </div>
            </td>
            <td class="px-6 py-4 whitespace-nowrap">
                <span class="inline-flex px-2 py-1 text-xs font-semibold rounded-full bg-blue-100 text-blue-800">
                    {{ $consultation->preferred_country ?: 'Not specified' }}
                </span>
            </td>
            <td class="px-6 py-4 whitespace-nowrap">
                <div class="text-sm text-gray-900">{{ $consultation->study_level ?: 'Not specified' }}</div>
                <div class="text-sm text-gray-500">{{ $consultation->preferred_subject ?: 'Subject not specified' }}</div>
            </td>
            <td class="px-6 py-4 whitespace-nowrap">
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
            </td>
            <td class="px-6 py-4 whitespace-nowrap">
                <div class="text-sm text-gray-900">{{ $consultation->created_at->format('M d, Y') }}</div>
                <div class="text-sm text-gray-500">{{ $consultation->created_at->diffForHumans() }}</div>
            </td>
                                    <td class="px-6 py-4 whitespace-nowrap text-sm font-medium">
                            <div class="flex items-center space-x-2">
                                <a href="{{ route('admin.consultations.show', $consultation) }}" class="text-blue-600 hover:text-blue-900" title="View Details">
                                    <i class="fas fa-eye"></i>
                                </a>
                                <form method="POST" action="{{ route('admin.consultations.update-status', $consultation) }}" class="inline">
                                    @csrf
                                    <input type="hidden" name="status" value="contacted">
                                    <button type="submit" class="text-green-600 hover:text-green-900" title="Mark as Contacted" onclick="return confirm('Are you sure you want to mark this as contacted?')">
                                        <i class="fas fa-phone"></i>
                                    </button>
                                </form>
                                <form method="POST" action="{{ route('admin.consultations.update-status', $consultation) }}" class="inline">
                                    @csrf
                                    <input type="hidden" name="status" value="completed">
                                    <button type="submit" class="text-purple-600 hover:text-purple-900" title="Mark as Completed" onclick="return confirm('Are you sure you want to mark this as completed?')">
                                        <i class="fas fa-check"></i>
                                    </button>
                                </form>
                                <form method="POST" action="{{ route('admin.consultations.destroy', $consultation) }}" class="inline">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="text-red-600 hover:text-red-900" title="Delete" onclick="return confirm('Are you sure you want to delete this consultation?')">
                                        <i class="fas fa-trash"></i>
                                    </button>
                                </form>
                            </div>
                        </td>
        </tr>
        @empty
        <tr>
            <td colspan="6" class="px-6 py-4 text-center text-gray-500">
                No consultations found.
            </td>
        </tr>
        @endforelse
    </tbody>
</table>
