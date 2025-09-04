<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use App\Models\Setting;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        $contactSettings = [
            [
                'key' => 'contact_address',
                'value' => 'Level-12, RUPAYAN Latifa Shamsuddin Square, Mirpur-1, Dhaka-1216, Bangladesh',
                'type' => 'textarea',
                'group' => 'general',
                'label' => 'Contact Address',
                'description' => 'Full address for the footer and contact pages'
            ],
            [
                'key' => 'contact_address_usa',
                'value' => '585 East 16th Street, Brooklyn, New York 11226, USA',
                'type' => 'textarea',
                'group' => 'general',
                'label' => 'USA Office Address',
                'description' => 'USA office address'
            ],
            [
                'key' => 'business_hours',
                'value' => 'From Sunday to Saturday: 10:00 A.M. To 7:00 P.M. (Friday: Closed)',
                'type' => 'text',
                'group' => 'general',
                'label' => 'Business Hours',
                'description' => 'Operating hours displayed in footer'
            ],
            [
                'key' => 'contact_email_footer',
                'value' => 'info@scholarsglobalnetwork.com',
                'type' => 'text',
                'group' => 'general',
                'label' => 'Footer Email',
                'description' => 'Email address displayed in footer'
            ],
            [
                'key' => 'contact_email_secondary',
                'value' => 'scholarsglobalnetwork@gmail.com',
                'type' => 'text',
                'group' => 'general',
                'label' => 'Secondary Email',
                'description' => 'Secondary email address'
            ],
            [
                'key' => 'contact_phone_footer',
                'value' => '+88 01344-823701',
                'type' => 'text',
                'group' => 'general',
                'label' => 'Footer Phone',
                'description' => 'Phone number displayed in footer'
            ],
            [
                'key' => 'contact_phone_secondary',
                'value' => '+88 01344-823702',
                'type' => 'text',
                'group' => 'general',
                'label' => 'Secondary Phone',
                'description' => 'Secondary phone number'
            ],
            [
                'key' => 'contact_phone_tertiary',
                'value' => '+88 01344-823703',
                'type' => 'text',
                'group' => 'general',
                'label' => 'Tertiary Phone',
                'description' => 'Tertiary phone number'
            ],
            [
                'key' => 'google_maps_url',
                'value' => 'https://maps.app.goo.gl/uy7u4SBxvnTJMN2f6',
                'type' => 'text',
                'group' => 'general',
                'label' => 'Google Maps URL',
                'description' => 'Google Maps link for the office location'
            ]
        ];

        foreach ($contactSettings as $setting) {
            Setting::create($setting);
        }
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        $keys = [
            'contact_address', 
            'contact_address_usa',
            'business_hours', 
            'contact_email_footer', 
            'contact_email_secondary',
            'contact_phone_footer',
            'contact_phone_secondary',
            'contact_phone_tertiary',
            'google_maps_url'
        ];
        
        foreach ($keys as $key) {
            Setting::where('key', $key)->delete();
        }
    }
};
