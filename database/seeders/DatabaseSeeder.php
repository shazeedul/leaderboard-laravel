<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\User;
use Illuminate\Database\Seeder;
use Database\Seeders\BadgeSeeder;
use Database\Seeders\CountrySeeder;
use Database\Seeders\AffiliationSeeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // \App\Models\User::factory(10)->create();

        \App\Models\User::create([
            'name' => 'Test User',
            'email' => 'test@example.com',
            'phone_number' => '1234567890',
            'password' => bcrypt('12345'),
            'role' => 'admin',
        ]);
        $this->call([
            BadgeSeeder::class,
            AffiliationSeeder::class,
            CountrySeeder::class,
        ]);
    }
}
