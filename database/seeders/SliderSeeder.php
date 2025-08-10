<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Slider;

class SliderSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $sliders = [
            [
                'title' => 'Welcome to ScholarZone',
                'subtitle' => 'Your Gateway to Academic Excellence',
                'description' => 'Discover comprehensive educational resources, expert guidance, and personalized support to help you achieve your academic goals.',
                'button_text' => 'Get Started',
                'button_url' => '#services',
                'image' => null, // You can add actual image paths here
                'order' => 0,
                'is_active' => true,
            ],
            [
                'title' => 'Expert Consultation Services',
                'subtitle' => 'Professional Academic Guidance',
                'description' => 'Connect with experienced educators and consultants who can provide personalized advice for your educational journey.',
                'button_text' => 'Book Consultation',
                'button_url' => '#consultation',
                'image' => null,
                'order' => 1,
                'is_active' => true,
            ],
            [
                'title' => 'Study Abroad Opportunities',
                'subtitle' => 'Explore Global Education',
                'description' => 'Find the perfect study abroad program with our comprehensive database of international universities and courses.',
                'button_text' => 'Explore Programs',
                'button_url' => '#programs',
                'image' => null,
                'order' => 2,
                'is_active' => true,
            ],
        ];

        foreach ($sliders as $slider) {
            Slider::create($slider);
        }
    }
}
