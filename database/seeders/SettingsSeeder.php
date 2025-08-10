<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Setting;

class SettingsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $settings = [
            // General Settings
            [
                'key' => 'site_name',
                'value' => 'Scholars Zone Global',
                'type' => 'text',
                'group' => 'general',
                'label' => 'Site Name',
                'description' => 'The name of your website'
            ],
            [
                'key' => 'site_title',
                'value' => 'Scholars Zone Global - Your Trusted Study Abroad Partner',
                'type' => 'text',
                'group' => 'general',
                'label' => 'Site Title',
                'description' => 'The title that appears in browser tabs'
            ],
            [
                'key' => 'site_description',
                'value' => 'Your trusted partner for international education consulting and study abroad guidance.',
                'type' => 'textarea',
                'group' => 'general',
                'label' => 'Site Description',
                'description' => 'Brief description of your website'
            ],
            [
                'key' => 'site_logo',
                'value' => null,
                'type' => 'image',
                'group' => 'general',
                'label' => 'Site Logo',
                'description' => 'Upload your website logo'
            ],
            [
                'key' => 'site_url',
                'value' => 'https://scholarszone.com',
                'type' => 'text',
                'group' => 'general',
                'label' => 'Site URL',
                'description' => 'Your website URL'
            ],
            [
                'key' => 'contact_email',
                'value' => 'contact@scholarszone.com',
                'type' => 'text',
                'group' => 'general',
                'label' => 'Contact Email',
                'description' => 'Primary contact email address'
            ],
            [
                'key' => 'contact_phone',
                'value' => '+1 (555) 123-4567',
                'type' => 'text',
                'group' => 'general',
                'label' => 'Contact Phone',
                'description' => 'Primary contact phone number'
            ],
            [
                'key' => 'timezone',
                'value' => 'America/New_York',
                'type' => 'select',
                'group' => 'general',
                'label' => 'Timezone',
                'description' => 'Default timezone for the application'
            ],
            [
                'key' => 'date_format',
                'value' => 'm/d/Y',
                'type' => 'select',
                'group' => 'general',
                'label' => 'Date Format',
                'description' => 'Default date format'
            ],
            [
                'key' => 'maintenance_mode',
                'value' => '0',
                'type' => 'boolean',
                'group' => 'general',
                'label' => 'Maintenance Mode',
                'description' => 'Temporarily disable the site for maintenance'
            ],
            [
                'key' => 'user_registration',
                'value' => '1',
                'type' => 'boolean',
                'group' => 'general',
                'label' => 'User Registration',
                'description' => 'Allow new user registrations'
            ],

            // Email Settings
            [
                'key' => 'email_notifications',
                'value' => '1',
                'type' => 'boolean',
                'group' => 'email',
                'label' => 'Email Notifications',
                'description' => 'Send email notifications for new consultations'
            ],
            [
                'key' => 'smtp_host',
                'value' => 'smtp.mailtrap.io',
                'type' => 'text',
                'group' => 'email',
                'label' => 'SMTP Host',
                'description' => 'SMTP server hostname'
            ],
            [
                'key' => 'smtp_port',
                'value' => '2525',
                'type' => 'text',
                'group' => 'email',
                'label' => 'SMTP Port',
                'description' => 'SMTP server port'
            ],
            [
                'key' => 'smtp_username',
                'value' => '',
                'type' => 'text',
                'group' => 'email',
                'label' => 'SMTP Username',
                'description' => 'SMTP authentication username'
            ],
            [
                'key' => 'smtp_password',
                'value' => '',
                'type' => 'text',
                'group' => 'email',
                'label' => 'SMTP Password',
                'description' => 'SMTP authentication password'
            ],

            // Security Settings
            [
                'key' => 'two_factor_auth',
                'value' => '0',
                'type' => 'boolean',
                'group' => 'security',
                'label' => 'Two-Factor Authentication',
                'description' => 'Enable two-factor authentication for admin accounts'
            ],
            [
                'key' => 'session_timeout',
                'value' => '120',
                'type' => 'text',
                'group' => 'security',
                'label' => 'Session Timeout (minutes)',
                'description' => 'Session timeout in minutes'
            ],
            [
                'key' => 'password_min_length',
                'value' => '8',
                'type' => 'text',
                'group' => 'security',
                'label' => 'Minimum Password Length',
                'description' => 'Minimum required password length'
            ],

            // Notification Settings
            [
                'key' => 'admin_notifications',
                'value' => '1',
                'type' => 'boolean',
                'group' => 'notifications',
                'label' => 'Admin Notifications',
                'description' => 'Send notifications to admin users'
            ],
            [
                'key' => 'consultation_notifications',
                'value' => '1',
                'type' => 'boolean',
                'group' => 'notifications',
                'label' => 'Consultation Notifications',
                'description' => 'Notify admins of new consultation requests'
            ],
            [
                'key' => 'user_notifications',
                'value' => '1',
                'type' => 'boolean',
                'group' => 'notifications',
                'label' => 'User Notifications',
                'description' => 'Send notifications to regular users'
            ],

            // Social Media Settings
            [
                'key' => 'social_enabled',
                'value' => '1',
                'type' => 'boolean',
                'group' => 'social',
                'label' => 'Enable Social Media',
                'description' => 'Show social media links in topbar'
            ],
            [
                'key' => 'social_platforms',
                'value' => json_encode([
                    [
                        'name' => 'Facebook',
                        'icon' => 'fab fa-facebook',
                        'url' => 'https://facebook.com/scholarszone',
                        'color' => 'text-blue-600',
                        'hover_color' => 'hover:text-blue-800',
                        'enabled' => true
                    ],
                    [
                        'name' => 'Twitter',
                        'icon' => 'fab fa-twitter',
                        'url' => 'https://twitter.com/scholarszone',
                        'color' => 'text-blue-400',
                        'hover_color' => 'hover:text-blue-600',
                        'enabled' => true
                    ],
                    [
                        'name' => 'LinkedIn',
                        'icon' => 'fab fa-linkedin',
                        'url' => 'https://linkedin.com/company/scholarszone',
                        'color' => 'text-blue-700',
                        'hover_color' => 'hover:text-blue-900',
                        'enabled' => true
                    ],
                    [
                        'name' => 'Instagram',
                        'icon' => 'fab fa-instagram',
                        'url' => 'https://instagram.com/scholarszone',
                        'color' => 'text-pink-600',
                        'hover_color' => 'hover:text-pink-800',
                        'enabled' => true
                    ],
                    [
                        'name' => 'YouTube',
                        'icon' => 'fab fa-youtube',
                        'url' => 'https://youtube.com/@scholarszone',
                        'color' => 'text-red-600',
                        'hover_color' => 'hover:text-red-800',
                        'enabled' => true
                    ],
                    [
                        'name' => 'WhatsApp',
                        'icon' => 'fab fa-whatsapp',
                        'url' => '+1234567890',
                        'color' => 'text-green-600',
                        'hover_color' => 'hover:text-green-800',
                        'enabled' => true,
                        'is_phone' => true
                    ],
                    [
                        'name' => 'Telegram',
                        'icon' => 'fab fa-telegram',
                        'url' => '@scholarszone',
                        'color' => 'text-blue-500',
                        'hover_color' => 'hover:text-blue-700',
                        'enabled' => true,
                        'is_username' => true
                    ]
                ]),
                'type' => 'json',
                'group' => 'social',
                'label' => 'Social Media Platforms',
                'description' => 'Configure your social media platforms'
            ]
        ];

        foreach ($settings as $setting) {
            Setting::updateOrCreate(
                ['key' => $setting['key']],
                $setting
            );
        }
    }
}
