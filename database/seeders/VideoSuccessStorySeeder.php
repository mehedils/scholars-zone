<?php

namespace Database\Seeders;

use App\Models\VideoSuccessStory;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class VideoSuccessStorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        VideoSuccessStory::create([
            'title' => 'From Bangladesh to Canada',
            'student_name' => 'Ahmed Rahman',
            'university' => 'University of Toronto',
            'country' => 'Canada',
            'description' => 'Ahmed shares his journey from Dhaka to pursuing his Master\'s in Computer Science at UofT.',
            'youtube_video_id' => 'dQw4w9WgXcQ',
            'order' => 1,
            'is_active' => true,
        ]);

        VideoSuccessStory::create([
            'title' => 'UK Dream Realized',
            'student_name' => 'Fatema Akter',
            'university' => 'University of Manchester',
            'country' => 'United Kingdom',
            'description' => 'Fatema talks about her experience studying Data Science in the UK and securing a job.',
            'youtube_video_id' => 'dQw4w9WgXcQ',
            'order' => 2,
            'is_active' => true,
        ]);

        VideoSuccessStory::create([
            'title' => 'Australian Adventure',
            'student_name' => 'Mehedi Hasan',
            'university' => 'University of Sydney',
            'country' => 'Australia',
            'description' => 'Mehedi shares his journey to Australia and how he adapted to the new culture.',
            'youtube_video_id' => 'dQw4w9WgXcQ',
            'order' => 3,
            'is_active' => true,
        ]);

        VideoSuccessStory::create([
            'title' => 'Engineering Excellence in Germany',
            'student_name' => 'Rahim Uddin',
            'university' => 'TU Munich',
            'country' => 'Germany',
            'description' => 'Rahim discusses his experience studying Mechanical Engineering in Germany.',
            'youtube_video_id' => 'dQw4w9WgXcQ',
            'order' => 4,
            'is_active' => true,
        ]);

        VideoSuccessStory::create([
            'title' => 'American Dream Achieved',
            'student_name' => 'Nusrat Jahan',
            'university' => 'Stanford University',
            'country' => 'United States',
            'description' => 'Nusrat shares her journey to Stanford and her research in Artificial Intelligence.',
            'youtube_video_id' => 'dQw4w9WgXcQ',
            'order' => 5,
            'is_active' => true,
        ]);

        VideoSuccessStory::create([
            'title' => 'Dutch Education Experience',
            'student_name' => 'Karim Ahmed',
            'university' => 'University of Amsterdam',
            'country' => 'Netherlands',
            'description' => 'Karim talks about his experience studying Business Administration in the Netherlands.',
            'youtube_video_id' => 'dQw4w9WgXcQ',
            'order' => 6,
            'is_active' => true,
        ]);
    }
}
