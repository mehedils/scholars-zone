# Consultation System

This document describes the consultation system implementation for the Scholars Zone application.

## Overview

The consultation system allows students to submit consultation requests through a form on the frontend, and administrators to manage these requests through the admin panel.

## Features

### Frontend Features
- **Consultation Form**: Located at `resources/views/components/frontend/consultation-form.blade.php`
- **AJAX Submission**: Form submits via AJAX to prevent page reload
- **Real-time Validation**: Client-side and server-side validation
- **Success/Error Messages**: User-friendly feedback messages
- **Form Reset**: Automatically resets form after successful submission

### Admin Panel Features
- **Consultation Management**: View all consultation requests
- **Status Management**: Update consultation status (pending, contacted, completed, cancelled)
- **Detailed View**: View individual consultation details
- **Admin Notes**: Add internal notes for each consultation
- **Statistics**: Dashboard with consultation statistics
- **Search & Filter**: Filter consultations by status
- **Pagination**: Paginated results for better performance

## Database Schema

### Consultations Table
```sql
- id (Primary Key)
- first_name (Required)
- last_name (Required)
- email (Required)
- phone (Required)
- preferred_country (Optional)
- study_level (Optional)
- preferred_subject (Optional)
- preferred_intake (Optional)
- message (Optional)
- status (Enum: pending, contacted, completed, cancelled)
- admin_notes (Optional)
- contacted_at (Timestamp)
- created_at (Timestamp)
- updated_at (Timestamp)
```

## API Endpoints

### Frontend
- `POST /consultation` - Submit consultation request

### Admin
- `GET /admin/consultations` - List all consultations
- `GET /admin/consultations/{id}` - View consultation details
- `POST /admin/consultations/{id}/update-status` - Update consultation status
- `DELETE /admin/consultations/{id}` - Delete consultation

## Models

### Consultation Model
- **Fillable Fields**: All consultation fields
- **Accessors**: `full_name` (combines first_name + last_name)
- **Scopes**: `pending()`, `active()`
- **Casts**: `contacted_at` as datetime

## Controllers

### ConsultationController (Frontend)
- `store()` - Handle consultation form submission
- Validation and error handling
- JSON response for AJAX requests

### Admin\ConsultationController (Admin)
- `index()` - Display consultations list
- `show()` - Display consultation details
- `updateStatus()` - Update consultation status and notes
- `destroy()` - Delete consultation

## Views

### Frontend Views
- `consultation-form.blade.php` - Main consultation form component

### Admin Views
- `admin/consultations/index.blade.php` - Consultations list
- `admin/consultations/show.blade.php` - Consultation details

## JavaScript

### Form Handling
- AJAX form submission
- Loading states
- Success/error message display
- Form reset functionality

### Admin Functions
- Status update via AJAX
- Notes saving
- Consultation deletion
- Email and phone integration

## Usage

### For Students
1. Navigate to the consultation form on the website
2. Fill in required fields (name, email, phone)
3. Optionally fill in study preferences
4. Add a message describing your needs
5. Submit the form
6. Receive confirmation message

### For Administrators
1. Access admin panel
2. Navigate to Consultations section
3. View all consultation requests
4. Click on individual consultations to view details
5. Update status and add notes as needed
6. Use quick actions to contact students

## Status Workflow

1. **Pending** - New consultation request (default)
2. **Contacted** - Admin has contacted the student
3. **Completed** - Consultation has been completed
4. **Cancelled** - Consultation has been cancelled

## Installation

1. Run the migration:
   ```bash
   php artisan migrate
   ```

2. Seed sample data (optional):
   ```bash
   php artisan db:seed --class=ConsultationSeeder
   ```

3. Ensure routes are properly configured in `routes/web.php`

## Customization

### Adding New Fields
1. Update the migration file
2. Add field to Consultation model's `$fillable` array
3. Update the form view
4. Update validation rules in controller
5. Update admin views if needed

### Modifying Status Options
1. Update the migration enum values
2. Update the model and controllers
3. Update the admin views to reflect new statuses

### Styling
- Form styling is handled via Tailwind CSS classes
- Admin panel uses consistent styling with the rest of the application
- Responsive design for mobile and desktop

## Security

- CSRF protection enabled
- Input validation and sanitization
- Admin authentication required for admin functions
- SQL injection protection via Eloquent ORM

## Future Enhancements

- Email notifications for new consultations
- SMS notifications
- Calendar integration for scheduling
- File upload for documents
- Consultation history tracking
- Export functionality for reports
