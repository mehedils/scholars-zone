@if($consultations->hasPages())
<div class="bg-white px-4 py-3 border-t border-gray-200 sm:px-6">
    {{ $consultations->links() }}
</div>
@endif
