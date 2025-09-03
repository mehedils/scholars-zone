@extends('layouts.admin')

@section('content')
<div class="px-4 sm:px-6 lg:px-8">
    <div class="flex items-center justify-between mb-6">
        <h1 class="text-2xl font-bold text-gray-900">Edit Success Story</h1>
        <a href="{{ route('admin.success-stories.index') }}" class="text-gray-600 hover:underline">Back</a>
    </div>

    <form action="{{ route('admin.success-stories.update', $story) }}" method="POST" enctype="multipart/form-data" class="bg-white rounded-lg shadow p-6 space-y-6">
        @csrf
        @method('PUT')
        <div>
            <label class="block text-sm font-medium text-gray-700 mb-1">Title *</label>
            <input type="text" name="title" value="{{ old('title', $story->title) }}" class="w-full px-4 py-2 border rounded-lg" required>
        </div>
        <div>
            <label class="block text-sm font-medium text-gray-700 mb-1">Excerpt</label>
            <textarea name="excerpt" class="w-full px-4 py-2 border rounded-lg" rows="2">{{ old('excerpt', $story->excerpt) }}</textarea>
        </div>
        <div>
            <label class="block text-sm font-medium text-gray-700 mb-1">Content</label>
            <textarea id="content" name="content" class="w-full px-4 py-2 border rounded-lg" rows="6">{{ old('content', $story->content) }}</textarea>
        </div>
        <div class="grid md:grid-cols-2 gap-4">
            <div>
                <label class="block text-sm font-medium text-gray-700 mb-1">Student Name</label>
                <input type="text" name="student_name" value="{{ old('student_name', $story->student_name) }}" class="w-full px-4 py-2 border rounded-lg">
            </div>
            <div>
                <label class="block text-sm font-medium text-gray-700 mb-1">Destination</label>
                <input type="text" name="destination" value="{{ old('destination', $story->destination) }}" class="w-full px-4 py-2 border rounded-lg">
            </div>
        </div>
        <div class="grid md:grid-cols-2 gap-4">
            <div>
                <label class="block text-sm font-medium text-gray-700 mb-1">Published At</label>
                <input type="datetime-local" name="published_at" value="{{ old('published_at', optional($story->published_at)->format('Y-m-d\TH:i')) }}" class="w-full px-4 py-2 border rounded-lg">
            </div>
            <div>
                <label class="block text-sm font-medium text-gray-700 mb-1">Order</label>
                <input type="number" min="0" name="order" value="{{ old('order', $story->order) }}" class="w-full px-4 py-2 border rounded-lg">
            </div>
        </div>
        <div class="grid md:grid-cols-2 gap-4">
            <div>
                <label class="block text-sm font-medium text-gray-700 mb-1">Image</label>
                <input type="file" name="image" accept="image/*" class="w-full">
                @if($story->image_path)
                    <img src="{{ Storage::url($story->image_path) }}" class="w-32 h-20 object-cover rounded mt-2" />
                @endif
            </div>
            <div class="flex items-center space-x-2">
                <input type="checkbox" name="is_active" value="1" id="is_active" {{ old('is_active', $story->is_active) ? 'checked' : '' }}>
                <label for="is_active" class="text-sm text-gray-700">Active</label>
            </div>
        </div>
        <div>
            <button type="submit" class="bg-primary text-white px-6 py-2 rounded-lg hover:bg-primary-dark">Update</button>
        </div>
    </form>
</div>
@endsection

@push('scripts')
<script src="https://cdnjs.cloudflare.com/ajax/libs/tinymce/6.7.2/tinymce.min.js" referrerpolicy="origin"></script>
<script>
tinymce.init({
  selector: '#content',
  plugins: 'anchor autolink charmap codesample emoticons image link lists media searchreplace table visualblocks wordcount',
  toolbar: 'undo redo | blocks fontfamily fontsize | bold italic underline strikethrough | link image media table | align lineheight | numlist bullist indent outdent | emoticons charmap | removeformat',
  height: 500,
  menubar: false,
  branding: false,
  promotion: false,
  file_picker_types: 'image',
  images_upload_url: '{{ route("admin.destinations.upload-file") }}',
  automatic_uploads: true,
  images_reuse_filename: true,
  setup(editor){ editor.on('change',()=>editor.save()); },
  images_upload_handler: function (blobInfo, success, failure) {
    var xhr = new XMLHttpRequest();
    xhr.withCredentials = false;
    xhr.open('POST', '{{ route("admin.destinations.upload-file") }}');
    xhr.setRequestHeader('X-CSRF-TOKEN', '{{ csrf_token() }}');
    xhr.onload = function() {
      if (xhr.status != 200) { failure('HTTP Error: ' + xhr.status); return; }
      var json = JSON.parse(xhr.responseText);
      if (!json || typeof json.location != 'string') { failure('Invalid JSON: ' + xhr.responseText); return; }
      success(json.location);
    };
    var formData = new FormData();
    formData.append('file', blobInfo.blob(), blobInfo.filename());
    xhr.send(formData);
  }
});
</script>
@endpush


