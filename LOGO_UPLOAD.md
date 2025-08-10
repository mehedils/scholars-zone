# Logo Upload Guide

## Overview

The logo upload functionality allows administrators to upload and manage the site logo through the admin dashboard settings.

## How It Works

### Storage Location
- **Directory**: `public/images/logos/`
- **URL Access**: Direct access via web server
- **File Naming**: `logo_{timestamp}.{extension}`

### Supported Formats
- JPEG (.jpg, .jpeg)
- PNG (.png)
- GIF (.gif)
- SVG (.svg)

### File Size Limit
- **Maximum**: 2MB
- **Validation**: Server-side validation

## Usage

### Upload Logo
1. Go to Admin Dashboard → Settings
2. Click "Upload Logo" button
3. Select an image file
4. File will be automatically uploaded and displayed

### Delete Logo
1. Go to Admin Dashboard → Settings
2. Click "Delete" button next to the logo
3. Confirm deletion

### View Logo
- **In Admin**: Settings page shows logo preview
- **In Code**: Use `@siteLogo` blade directive
- **In PHP**: Use `SettingsHelper::siteLogo()`

## File Management

### Directory Structure
```
public/
├── images/
│   └── logos/
│       ├── logo_1234567890.png
│       ├── logo_1234567891.jpg
│       └── ...
```

### Automatic Cleanup
- Old logos are automatically deleted when new ones are uploaded
- No orphaned files left in the system

## Troubleshooting

### Logo Not Displaying
1. Check if file exists: `ls -la public/images/logos/`
2. Verify file permissions: `chmod 755 public/images/logos/`
3. Check web server access to the directory

### Upload Fails
1. Check file size (must be under 2MB)
2. Verify file format (JPEG, PNG, GIF, SVG only)
3. Check directory permissions: `chmod 755 public/images/logos/`

### 404 Error
1. Ensure directory exists: `mkdir -p public/images/logos`
2. Check web server configuration
3. Verify file path in database

## Code Examples

### Blade Template
```blade
{{-- Display logo --}}
@if(@siteLogo)
    <img src="@siteLogo" alt="Site Logo">
@endif

{{-- Conditional display --}}
@if(@siteLogo)
    <img src="@siteLogo" alt="Site Logo">
@else
    <h1>@siteName</h1>
@endif
```

### PHP Controller
```php
use App\Helpers\SettingsHelper;

// Get logo URL
$logoUrl = SettingsHelper::siteLogo();

// Check if logo exists
if ($logoUrl) {
    // Logo is set
} else {
    // No logo uploaded
}
```

### JavaScript
```javascript
// Logo upload with AJAX
function handleLogoUpload(event) {
    const file = event.target.files[0];
    if (!file) return;
    
    const formData = new FormData();
    formData.append('logo', file);
    formData.append('_token', '{{ csrf_token() }}');
    
    fetch('/admin/settings/upload-logo', {
        method: 'POST',
        body: formData
    })
    .then(response => response.json())
    .then(data => {
        if (data.success) {
            // Update logo display
            document.querySelector('.logo-preview').src = data.path;
        }
    });
}
```

## Security Considerations

### File Validation
- File type validation (images only)
- File size validation (2MB limit)
- File extension validation

### Access Control
- Admin-only access to upload/delete
- CSRF protection on all forms
- Secure file naming (timestamp-based)

### File Permissions
- Directory: 755 (rwxr-xr-x)
- Files: 644 (rw-r--r--)

## Performance

### Optimization
- Images are stored directly in public directory
- No additional processing required
- Direct web server access

### Caching
- Logo URL is cached in settings
- Automatic cache invalidation on update
- Fast access through helper methods
