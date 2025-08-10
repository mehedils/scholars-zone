# Contact Settings Management

This document describes the contact settings system that has been implemented to make footer contact information editable from the admin panel.

## Overview

The contact settings system allows administrators to manage all contact information displayed in the footer through the admin panel, eliminating the need to edit code files.

## New Settings Added

### Contact Information Settings

| Setting Key | Type | Default Value | Description |
|-------------|------|---------------|-------------|
| `contact_address` | textarea | "123 Gulshan Avenue, Dhaka 1212, Bangladesh" | Full address for footer and contact pages |
| `business_hours` | text | "Mon - Sat: 9:00 AM - 6:00 PM" | Operating hours displayed in footer |
| `contact_email_footer` | text | "info@scholarszonebd.com" | Email address displayed in footer |
| `contact_phone_footer` | text | "+880 1234 567890" | Phone number displayed in footer |

### Existing Settings (Already Available)

| Setting Key | Type | Default Value | Description |
|-------------|------|---------------|-------------|
| `contact_email` | text | "contact@scholarszone.com" | General contact email |
| `contact_phone` | text | "+1 (555) 123-4567" | General contact phone |

## How to Update Contact Information

### Accessing Contact Settings

1. Log into the admin panel
2. Navigate to **Settings** → **General** in the sidebar
3. Scroll down to find the contact information fields
4. Update the desired information
5. Click **Save Changes**

### Available Fields

- **Contact Address**: Full physical address (supports multiple lines)
- **Business Hours**: Operating hours in any format
- **Footer Email**: Email address specifically for footer display
- **Footer Phone**: Phone number specifically for footer display

## Helper Methods

The `SettingsHelper` class now includes these methods for accessing contact information:

```php
use App\Helpers\SettingsHelper;

// Get contact address
$address = SettingsHelper::contactAddress();

// Get business hours
$hours = SettingsHelper::businessHours();

// Get footer email
$email = SettingsHelper::footerEmail();

// Get footer phone
$phone = SettingsHelper::footerPhone();

// Get general contact email
$contactEmail = SettingsHelper::contactEmail();

// Get general contact phone
$contactPhone = SettingsHelper::contactPhone();
```

## Frontend Integration

The footer component has been updated to use dynamic settings:

```php
// Before (hardcoded)
<span>123 Gulshan Avenue, Dhaka 1212, Bangladesh</span>

// After (dynamic)
<span>{{ SettingsHelper::contactAddress() }}</span>
```

## Database Changes

### Migration Applied
- **File**: `2025_08_10_131946_add_contact_settings_to_settings_table.php`
- **Purpose**: Adds new contact settings to the settings table
- **Status**: ✅ Applied successfully

### Settings Added
- `contact_address` (textarea)
- `business_hours` (text)
- `contact_email_footer` (text)
- `contact_phone_footer` (text)

## Benefits

1. **No Code Changes Required**: Update contact info without touching code files
2. **Real-time Updates**: Changes appear immediately on the website
3. **Admin-Friendly**: Simple form interface for non-technical users
4. **Consistent**: All contact info managed in one place
5. **Flexible**: Support for different formats and content types

## Usage Examples

### In Blade Templates
```php
@php
    use App\Helpers\SettingsHelper;
@endphp

<div class="contact-info">
    <p><i class="fas fa-map-marker-alt"></i> {{ SettingsHelper::contactAddress() }}</p>
    <p><i class="fas fa-phone"></i> {{ SettingsHelper::footerPhone() }}</p>
    <p><i class="fas fa-envelope"></i> {{ SettingsHelper::footerEmail() }}</p>
    <p><i class="fas fa-clock"></i> {{ SettingsHelper::businessHours() }}</p>
</div>
```

### In Controllers
```php
use App\Helpers\SettingsHelper;

public function contact()
{
    $contactInfo = [
        'address' => SettingsHelper::contactAddress(),
        'phone' => SettingsHelper::footerPhone(),
        'email' => SettingsHelper::footerEmail(),
        'hours' => SettingsHelper::businessHours(),
    ];
    
    return view('contact', compact('contactInfo'));
}
```

## Validation

The settings form includes validation for:
- Required fields (where applicable)
- Email format validation
- Maximum length restrictions
- Proper data types

## Caching

Contact settings are cached for performance:
- Settings are cached for 1 hour
- Cache is automatically cleared when settings are updated
- Fallback values are used if settings are not found

## Troubleshooting

### Common Issues

1. **Settings not appearing**: Clear application cache with `php artisan cache:clear`
2. **Changes not showing**: Check if the setting was saved correctly in admin panel
3. **Helper methods not working**: Ensure the SettingsHelper class is properly imported

### Cache Issues
```bash
# Clear all caches
php artisan cache:clear
php artisan config:clear
php artisan view:clear
```

## Future Enhancements

Potential improvements for the contact settings system:

- [ ] Multiple address support (branch offices)
- [ ] Contact form integration
- [ ] Social media links in contact section
- [ ] Map integration with address
- [ ] Contact information for different languages
- [ ] Emergency contact information
- [ ] WhatsApp/Telegram contact options

## Support

For technical support or questions about the contact settings system, please refer to the Laravel documentation or contact the development team.
