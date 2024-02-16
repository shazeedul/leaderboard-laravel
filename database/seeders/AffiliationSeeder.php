<?php

namespace Database\Seeders;

use App\Models\Affiliation;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class AffiliationSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Edendale Football Association
        Affiliation::create([
            'name' => 'Edendale Football Association',
            'description' => 'Edendale Football Association is a football association in Edendale, South Africa.',
        ]);

        // Northdale Football Association
        Affiliation::create([
            'name' => 'Northdale Football Association',
            'description' => 'Northdale Football Association is a football association in Northdale, South Africa.',
        ]);
    }
}
