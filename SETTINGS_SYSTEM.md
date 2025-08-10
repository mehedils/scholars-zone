# Settings System Documentation

## Overview

The Scholars Zone Global application includes a comprehensive settings management system that allows administrators to configure various aspects of the application through a user-friendly interface.

## Features

### 1. Dynamic Settings Management
- **Database Storage**: All settings are stored in the database for persistence
- **Caching**: Settings are cached for improved performance
- **Real-time Updates**: Changes are immediately reflected throughout the application
- **Validation**: Input validation for all setting types

### 2. Setting Types
- **Text**: Simple text input fields
- **Textarea**: Multi-line text areas
- **Select**: Dropdown selection options
- **Boolean**: Toggle switches (on/off)
- **Image**: File upload for images (logo, etc.)

### 3. Setting Groups
- **General**: Site name, title, description, logo, contact info
- **Email**: SMTP settings and notification preferences
- **Security**: Authentication and security settings
- **Notifications**: Notification preferences

## Database Structure

### Settings Table
```sql
CREATE TABLE settings (
    id BIGINT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    `key` VARCHAR(255) UNIQUE NOT NULL,
    value TEXT NULL,
    type VARCHAR(50) DEFAULT 'text',
    `group` VARCHAR(50) DEFAULT 'general',
    label VARCHAR(255) NOT NULL,
    description TEXT NULL,
    created_at TIMESTAMP NULL,
    updated_at TIMESTAMP NULL
);
```

## Usage

### In Controllers
```php
use App\Helpers\SettingsHelper;

// Get a setting value
$siteName = SettingsHelper::siteName();
$contactEmail = SettingsHelper::contactEmail();

// Set a setting value
SettingsHelper::set('site_name', 'New Site Name');
```

### In Blade Views
```blade
{{-- Using helper methods --}}
<h1>@siteName</h1>
<title>@siteTitle</title>

{{-- Using generic setting directive --}}
<p>@setting('contact_email')</p>

{{-- Using full helper class --}}
<p>{{ \App\Helpers\SettingsHelper::contactPhone() }}</p>
```

### In JavaScript
```javascript
// Settings are available through the admin dashboard
window.adminDashboard.showNotification('Setting updated!', 'success');
```

## API Endpoints

### Settings Management
- `GET /admin/settings` - View settings page
- `POST /admin/settings` - Update settings
- `POST /admin/settings/upload-logo` - Upload site logo
- `POST /admin/settings/delete-logo` - Delete site logo
- `GET /admin/settings/{key}` - Get specific setting value

## Available Settings

### General Settings
- `site_name` - Website name
- `site_title` - Browser tab title
- `site_description` - Website description
- `site_logo` - Website logo image
- `site_url` - Website URL
- `contact_email` - Contact email address
- `contact_phone` - Contact phone number
- `timezone` - Default timezone
- `date_format` - Date display format
- `maintenance_mode` - Enable/disable maintenance mode
- `user_registration` - Allow/deny user registration

### Email Settings
- `email_notifications` - Enable/disable email notifications
- `smtp_host` - SMTP server hostname
- `smtp_port` - SMTP server port
- `smtp_username` - SMTP username
- `smtp_password` - SMTP password

### Security Settings
- `two_factor_auth` - Enable/disable 2FA
- `session_timeout` - Session timeout in minutes
- `password_min_length` - Minimum password length

### Notification Settings
- `admin_notifications` - Enable/disable admin notifications
- `consultation_notifications` - Notify on new consultations
- `user_notifications` - Enable/disable user notifications

## File Upload

### Logo Upload
- **Supported Formats**: JPEG, PNG, JPG, GIF, SVG
- **Maximum Size**: 2MB
- **Storage Location**: `public/images/logos/`
- **Automatic Cleanup**: Old logos are deleted when new ones are uploaded

### Upload Process
1. File validation (type, size)
2. Old file deletion (if exists)
3. New file storage
4. Database update
5. Cache invalidation

## Caching

### Cache Strategy
- **Cache Duration**: 1 hour (3600 seconds)
- **Cache Keys**: `setting.{key}` and `settings.group.{group}`
- **Automatic Invalidation**: Cache is cleared when settings are updated

### Cache Management
```php
// Clear specific setting cache
Cache::forget("setting.site_name");

// Clear group cache
Cache::forget("settings.group.general");

// Clear all settings cache
Setting::clearCache();
```

## Security

### Access Control
- **Admin Only**: Settings can only be modified by admin users
- **CSRF Protection**: All forms include CSRF tokens
- **Input Validation**: Server-side validation for all inputs
- **File Upload Security**: Strict file type and size validation

### Data Protection
- **Encrypted Storage**: Sensitive data (passwords) should be encrypted
- **Audit Trail**: Settings changes can be logged for audit purposes
- **Backup**: Settings are included in database backups

## Performance Optimization

### Database Optimization
- **Indexed Keys**: The `key` column is indexed for fast lookups
- **Efficient Queries**: Settings are fetched by group to minimize queries
- **Lazy Loading**: Settings are loaded only when needed

### Frontend Optimization
- **Lazy Loading**: Settings forms are loaded on demand
- **AJAX Updates**: Logo uploads use AJAX for better UX
- **Client-side Validation**: Immediate feedback for user inputs

## Testing

### Test Coverage
- **Unit Tests**: Individual setting methods
- **Feature Tests**: Complete settings workflow
- **Integration Tests**: Settings with other components

### Test Commands
```bash
# Run all tests
php artisan test

# Run settings tests only
php artisan test --filter=SettingsTest
```

## Maintenance

### Database Maintenance
```bash
# Run migrations
php artisan migrate

# Seed default settings
php artisan db:seed --class=SettingsSeeder

# Clear settings cache
php artisan cache:clear
```

### File Maintenance
```bash
# Create logos directory
mkdir -p public/images/logos

# Clean up old logo files manually
rm -rf public/images/logos/*
```

## Troubleshooting

### Common Issues

1. **Settings Not Updating**
   - Clear cache: `php artisan cache:clear`
   - Check file permissions
   - Verify database connection

2. **Logo Not Displaying**
   - Check if file exists: `ls -la public/images/logos/`
   - Verify file permissions: `chmod 755 public/images/logos/`
   - Check if directory exists: `mkdir -p public/images/logos`

3. **Cache Issues**
   - Clear all caches: `php artisan cache:clear`
   - Restart queue workers if using queues
   - Check cache configuration

### Debug Commands
```bash
# Check settings in database
php artisan tinker
>>> App\Models\Setting::all();

# Check cache status
php artisan cache:table
php artisan cache:clear

# Test file upload
php artisan storage:link
```

## Future Enhancements

### Planned Features
- **Setting Categories**: More granular grouping
- **User Preferences**: Per-user settings
- **Setting Dependencies**: Conditional settings
- **Import/Export**: Settings backup and restore
- **Version Control**: Settings change history
- **API Access**: RESTful API for settings
- **Real-time Updates**: WebSocket notifications
- **Multi-language**: Localized setting labels
