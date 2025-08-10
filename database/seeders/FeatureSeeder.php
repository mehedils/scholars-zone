<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Feature;

class FeatureSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $features = [
            [
                'title' => 'University Selection',
                'description' => 'Expert guidance to choose the right university and program that matches your goals and budget.',
                'icon' => 'fas fa-university',
                'order' => 0,
                'is_active' => true,
            ],
            [
                'title' => 'Visa Processing',
                'description' => 'Complete visa application support with 100% success rate and interview preparation.',
                'icon' => 'fas fa-passport',
                'order' => 1,
                'is_active' => true,
            ],
            [
                'title' => 'Application Support',
                'description' => 'Professional assistance with application forms, essays, and documentation requirements.',
                'icon' => 'fas fa-file-alt',
                'order' => 2,
                'is_active' => true,
            ],
            [
                'title' => 'Scholarship Guidance',
                'description' => 'Help you find and apply for scholarships to reduce your education costs significantly.',
                'icon' => 'fas fa-dollar-sign',
                'order' => 3,
                'is_active' => true,
            ],
            [
                'title' => 'Pre-departure Support',
                'description' => 'Comprehensive briefing about accommodation, travel, and settling in your new country.',
                'icon' => 'fas fa-plane',
                'order' => 4,
                'is_active' => true,
            ],
            [
                'title' => '24/7 Support',
                'description' => 'Round-the-clock assistance even after you reach your destination country.',
                'icon' => 'fas fa-headset',
                'order' => 5,
                'is_active' => true,
            ],
        ];

        foreach ($features as $feature) {
            Feature::create($feature);
        }
    }
}
