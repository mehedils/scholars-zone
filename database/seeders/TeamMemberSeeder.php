<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\TeamMember;

class TeamMemberSeeder extends Seeder
{
    public function run(): void
    {
        if (TeamMember::count() > 0) {
            return;
        }

        $rows = [
            [
                'name' => 'Rahim Uddin',
                'designation' => 'Senior Education Counselor',
                'about' => '10+ years helping students achieve their study abroad goals.',
                'facebook_url' => 'https://facebook.com/',
                'twitter_url' => null,
                'linkedin_url' => 'https://linkedin.com/',
                'instagram_url' => null,
                'photo_path' => null,
                'order' => 1,
                'is_active' => true,
            ],
            [
                'name' => 'Fatema Akter',
                'designation' => 'Visa & Application Specialist',
                'about' => 'Expert in visa guidance and documentation review.',
                'facebook_url' => null,
                'twitter_url' => 'https://twitter.com/',
                'linkedin_url' => 'https://linkedin.com/',
                'instagram_url' => null,
                'photo_path' => null,
                'order' => 2,
                'is_active' => true,
            ],
            [
                'name' => 'Mehedi Hasan',
                'designation' => 'Student Support Lead',
                'about' => 'Dedicated to student success with responsive support.',
                'facebook_url' => null,
                'twitter_url' => null,
                'linkedin_url' => null,
                'instagram_url' => 'https://instagram.com/',
                'photo_path' => null,
                'order' => 3,
                'is_active' => true,
            ],
        ];

        TeamMember::insert($rows);
    }
}


