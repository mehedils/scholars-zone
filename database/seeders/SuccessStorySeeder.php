<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\SuccessStory;
use Illuminate\Support\Str;

class SuccessStorySeeder extends Seeder
{
    public function run(): void
    {
        if (SuccessStory::count() > 0) {
            return;
        }

        $stories = [
            [
                'title' => 'From Dhaka to Toronto: Scholarship Success',
                'excerpt' => 'How Aisha secured a full scholarship to study Computer Science in Canada.',
                'content' => '<p>Aisha prepared a strong application with our guidance and received a full scholarship at a top Canadian university.</p>',
                'student_name' => 'Aisha Karim',
                'destination' => 'Canada',
                'published_at' => now()->subDays(10),
                'order' => 1,
                'is_active' => true,
            ],
            [
                'title' => 'UK Dream Achieved: Master’s in Data Science',
                'excerpt' => 'Tanvir shares his experience of getting into a top UK university.',
                'content' => '<p>With tailored SOP and documentation support, Tanvir received multiple offers and chose a top UK program.</p>',
                'student_name' => 'Tanvir Ahmed',
                'destination' => 'United Kingdom',
                'published_at' => now()->subDays(5),
                'order' => 2,
                'is_active' => true,
            ],
            [
                'title' => 'Australia Bound: Visa Success on First Attempt',
                'excerpt' => 'Riya obtained her study visa to Australia without delays.',
                'content' => '<p>Our visa specialists ensured error-free documentation and timely submission leading to a smooth approval.</p>',
                'student_name' => 'Riya Sultana',
                'destination' => 'Australia',
                'published_at' => now()->subDays(2),
                'order' => 3,
                'is_active' => true,
            ],
        ];

        foreach ($stories as $data) {
            $data['slug'] = Str::slug($data['title']);
            SuccessStory::create($data);
        }
    }
}


