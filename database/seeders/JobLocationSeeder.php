<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class JobLocationSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $locations = [
            'Cairo, Egypt',
            'Alexandria, Egypt',
            'Giza, Egypt',
            'Riyadh, Saudi Arabia',
            'Jeddah, Saudi Arabia',
            'Dubai, UAE',
            'Remote',
        ];

        foreach ($locations as $location) {
            \App\Models\JobLocation::firstOrCreate(['name' => $location]);
        }
    }
}
