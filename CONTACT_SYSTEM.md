# Contact System

This document describes the contact system implementation for the Scholars Zone application.

## Overview

The contact system provides a comprehensive contact page with a contact form, contact information, and admin management for contact messages.

## Features

### Frontend Features
- **Contact Page**: Located at `resources/views/frontend/contact.blade.php`
- **Contact Form**: AJAX submission with validation
- **Contact Information**: Office details, phone, email, business hours
- **Social Media Links**: Facebook, Twitter, Instagram, LinkedIn
- **FAQ Section**: Common questions and answers
- **Map Section**: Placeholder for future map integration

### Admin Panel Features
- **Contact Messages Management**: View all contact form submissions
- **Status Management**: Update message status (unread, read, replied, archived)
- **Detailed View**: View individual contact message details
- **Admin Notes**: Add internal notes for each message
- **Statistics**: Dashboard with message statistics
- **Search & Filter**: Filter messages by status
- **Pagination**: Paginated results for better performance

## Database Schema

### Contacts Table
```sql
- id (Primary Key)
- name (Required)
- email (Required)
- phone (Optional)
- subject (Required)
- message (Required)
- status (Enum: unread, read, replied, archived)
- admin_notes (Optional)
- replied_at (Timestamp)
- created_at (Timestamp)
- updated_at (Timestamp)
```

## API Endpoints

### Frontend
- `GET /contact` - Display contact page
- `POST /contact` - Submit contact form

### Admin
- `GET /admin/contacts` - List all contact messages
- `GET /admin/contacts/{id}` - View contact message details
- `POST /admin/contacts/{id}/update-status` - Update message status
- `DELETE /admin/contacts/{id}` - Delete contact message

## Models

### Contact Model
- **Fillable Fields**: All contact fields
- **Scopes**: `unread()`, `read()`, `replied()`
- **Accessors**: `message_preview` (truncated message)
- **Casts**: `replied_at` as datetime

## Controllers

### ContactController (Frontend)
- `index()` - Display contact page
- `store()` - Handle contact form submission
- Validation and error handling
- JSON response for AJAX requests

### Admin\ContactController (Admin)
- `index()` - Display contact messages list
- `show()` - Display contact message details
- `updateStatus()` - Update message status and notes
- `destroy()` - Delete contact message

## Views

### Frontend Views
- `frontend/contact.blade.php` - Main contact page

### Admin Views
- `admin/contacts/index.blade.php` - Contact messages list
- `admin/contacts/show.blade.php` - Contact message details

## JavaScript

### Form Handling
- AJAX form submission
- Loading states
- Success/error message display
- Form reset functionality

### Admin Functions
- Status update via AJAX
- Notes saving
- Message deletion
- Email and phone integration

## Contact Information

### Office Details
- **Address**: 123 Education Street, Dhaka, Bangladesh
- **Phone**: +880 1234 567 890, +880 1234 567 891
- **Email**: info@scholarszone.com, support@scholarszone.com
- **Business Hours**: 
  - Monday - Friday: 9:00 AM - 6:00 PM
  - Saturday: 10:00 AM - 4:00 PM
  - Sunday: Closed

### Social Media
- Facebook
- Twitter
- Instagram
- LinkedIn

## FAQ Section

The contact page includes a FAQ section with common questions:
1. How can I schedule a consultation?
2. What documents do I need for study abroad?
3. How long does the visa process take?
4. Do you provide accommodation assistance?

## Status Workflow

1. **Unread** - New contact message (default)
2. **Read** - Admin has read the message
3. **Replied** - Admin has replied to the message
4. **Archived** - Message has been archived

## Installation

1. Run the migration:
   ```bash
   php artisan migrate
   ```

2. Ensure routes are properly configured in `routes/web.php`

3. Access the contact page at `/contact`

## Customization

### Adding New Fields
1. Update the migration file
2. Add field to Contact model's `$fillable` array
3. Update the form view
4. Update validation rules in controller
5. Update admin views if needed

### Modifying Contact Information
1. Update the contact information in `resources/views/frontend/contact.blade.php`
2. Update business hours, phone numbers, and email addresses
3. Update social media links

### Styling
- Contact page styling is handled via Tailwind CSS classes
- Admin panel uses consistent styling with the rest of the application
- Responsive design for mobile and desktop

## Security

- CSRF protection enabled
- Input validation and sanitization
- Admin authentication required for admin functions
- SQL injection protection via Eloquent ORM

## Future Enhancements

- Email notifications for new contact messages
- SMS notifications
- Interactive map integration
- File upload for attachments
- Contact message history tracking
- Export functionality for reports
- Email templates for automated responses
- Contact form spam protection (reCAPTCHA)

## Usage

### For Visitors
1. Navigate to the contact page
2. Fill in the contact form with required information
3. Submit the form
4. Receive confirmation message

### For Administrators
1. Access admin panel
2. Navigate to Contact Messages section
3. View all contact form submissions
4. Click on individual messages to view details
5. Update status and add notes as needed
6. Use quick actions to contact senders

## Integration

The contact system integrates with:
- **Navigation**: Contact link in header and footer
- **Admin Panel**: Contact messages management
- **Settings System**: Contact information can be managed through settings
- **Email System**: Ready for email notification integration
