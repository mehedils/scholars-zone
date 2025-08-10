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
                'value' => '123 Gulshan Avenue, Dhaka 1212, Bangladesh',
                'type' => 'textarea',
                'group' => 'general',
                'label' => 'Contact Address',
                'description' => 'Full address for the footer and contact pages'
            ],
            [
                'key' => 'business_hours',
                'value' => 'Mon - Sat: 9:00 AM - 6:00 PM',
                'type' => 'text',
                'group' => 'general',
                'label' => 'Business Hours',
                'description' => 'Operating hours displayed in footer'
            ],
            [
                'key' => 'contact_email_footer',
                'value' => 'info@scholarszonebd.com',
                'type' => 'text',
                'group' => 'general',
                'label' => 'Footer Email',
                'description' => 'Email address displayed in footer'
            ],
            [
                'key' => 'contact_phone_footer',
                'value' => '+880 1234 567890',
                'type' => 'text',
                'group' => 'general',
                'label' => 'Footer Phone',
                'description' => 'Phone number displayed in footer'
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
        $keys = ['contact_address', 'business_hours', 'contact_email_footer', 'contact_phone_footer'];
        
        foreach ($keys as $key) {
            Setting::where('key', $key)->delete();
        }
    }
};
