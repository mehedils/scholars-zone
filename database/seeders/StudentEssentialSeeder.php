<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\StudentEssential;

class StudentEssentialSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $essentials = [
            [
                'title' => 'Education Loan',
                'description' => 'Easy access to finances so you don\'t delay your dreams.',
                'icon' => 'fas fa-university',
                'learn_more_url' => null,
                'show_learn_more' => true,
                'order' => 0,
                'is_active' => true,
            ],
            [
                'title' => 'Money Transfer',
                'description' => 'Safe, secure and fast payments to your institution and other key services.',
                'icon' => 'fas fa-exchange-alt',
                'learn_more_url' => null,
                'show_learn_more' => true,
                'order' => 1,
                'is_active' => true,
            ],
            [
                'title' => 'Student Health Cover',
                'description' => 'Your choice, your health cover, your peace of mind abroad.',
                'icon' => 'fas fa-shield-alt',
                'learn_more_url' => null,
                'show_learn_more' => true,
                'order' => 2,
                'is_active' => true,
            ],
            [
                'title' => 'Student Banking',
                'description' => 'Open a bank account before you arrive.',
                'icon' => 'fas fa-credit-card',
                'learn_more_url' => null,
                'show_learn_more' => true,
                'order' => 3,
                'is_active' => true,
            ],
            [
                'title' => 'Accommodation',
                'description' => 'Student apartment or homestay, the choice is yours.',
                'icon' => 'fas fa-home',
                'learn_more_url' => null,
                'show_learn_more' => true,
                'order' => 4,
                'is_active' => true,
            ],
            [
                'title' => 'SIM Cards',
                'description' => 'No SIM? No problem – We\'ve got it covered.',
                'icon' => 'fas fa-sim-card',
                'learn_more_url' => null,
                'show_learn_more' => true,
                'order' => 5,
                'is_active' => true,
            ],
            [
                'title' => 'Guardianship',
                'description' => 'If you\'re under 18, we\'ll find you a guardian.',
                'icon' => 'fas fa-user-shield',
                'learn_more_url' => null,
                'show_learn_more' => true,
                'order' => 6,
                'is_active' => true,
            ],
            [
                'title' => 'Student Identity Card',
                'description' => 'Start enjoying global student discounts on food, fashion, travel, and more.',
                'icon' => 'fas fa-id-card',
                'learn_more_url' => null,
                'show_learn_more' => true,
                'order' => 7,
                'is_active' => true,
            ],
        ];

        foreach ($essentials as $essential) {
            StudentEssential::create($essential);
        }
    }
}
