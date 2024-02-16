<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\Badge;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class BadgeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Create 3 badges [Gold, Silver, Bronze] with a description for each one
        $bronze = Badge::create([
            'name' => 'Bronze',
            'description' => 'This is the bronze badge',
        ]);

        $silver = Badge::create([
            'name' => 'Silver',
            'description' => 'This is the silver badge',
        ]);

        $gold = Badge::create([
            'name' => 'Gold',
            'description' => 'This is the gold badge',
        ]);
    }
}
