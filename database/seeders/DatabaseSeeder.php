<?php

namespace Database\Seeders;

use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // Seed admin user
        User::updateOrCreate(
            ["email" => "admin@admin.com"],
            [
                "name" => "Administrator",
                "password" => Hash::make("password"),
                "is_admin" => true,
            ],
        );

        // Seed settings
        $this->call([
            SettingsSeeder::class,
            FeatureSeeder::class,
            SliderSeeder::class,
        ]);
    }
}
