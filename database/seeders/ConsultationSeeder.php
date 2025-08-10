<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Consultation;

class ConsultationSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $consultations = [
            [
                'first_name' => 'Sarah',
                'last_name' => 'Johnson',
                'email' => 'sarah.johnson@email.com',
                'phone' => '+1 555-0123',
                'preferred_country' => 'Canada',
                'study_level' => 'Master\'s Degree',
                'preferred_subject' => 'Computer Science',
                'preferred_intake' => 'Fall 2025',
                'message' => 'I am interested in pursuing a Master\'s degree in Computer Science in Canada. I would like to know about the admission requirements and available scholarships.',
                'status' => 'pending',
                'created_at' => now()->subDays(2),
            ],
            [
                'first_name' => 'Mike',
                'last_name' => 'Chen',
                'email' => 'mike.chen@email.com',
                'phone' => '+1 555-0456',
                'preferred_country' => 'Germany',
                'study_level' => 'Bachelor\'s Degree',
                'preferred_subject' => 'Engineering',
                'preferred_intake' => 'Spring 2025',
                'message' => 'Looking for guidance on studying Engineering in Germany. Need help with visa requirements and language preparation.',
                'status' => 'contacted',
                'contacted_at' => now()->subDay(),
                'admin_notes' => 'Called student. Provided information about German universities and visa process.',
                'created_at' => now()->subDays(5),
            ],
            [
                'first_name' => 'Emma',
                'last_name' => 'Wilson',
                'email' => 'emma.wilson@email.com',
                'phone' => '+1 555-0789',
                'preferred_country' => 'United Kingdom',
                'study_level' => 'PhD',
                'preferred_subject' => 'Business & Management',
                'preferred_intake' => 'Fall 2025',
                'message' => 'I want to pursue a PhD in Business Management in the UK. Need assistance with research proposal and university selection.',
                'status' => 'completed',
                'contacted_at' => now()->subDays(3),
                'admin_notes' => 'Successfully helped student with research proposal. Student accepted at University of Oxford.',
                'created_at' => now()->subDays(10),
            ],
            [
                'first_name' => 'David',
                'last_name' => 'Brown',
                'email' => 'david.brown@email.com',
                'phone' => '+1 555-0321',
                'preferred_country' => 'Australia',
                'study_level' => 'Diploma',
                'preferred_subject' => 'Arts & Design',
                'preferred_intake' => 'Summer 2025',
                'message' => 'Interested in studying Arts and Design in Australia. Looking for affordable options and accommodation guidance.',
                'status' => 'pending',
                'created_at' => now()->subHours(6),
            ],
        ];

        foreach ($consultations as $consultation) {
            Consultation::create($consultation);
        }
    }
}
