<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class HostelsTableSeeder extends Seeder
{
    // Run the database seeds.
    public function run()
    {
        // Insert multiple hostels into the 'hostels' table
        DB::table('hostels')->insert([
            [
                'name' => 'Hazina Hostel',
                'location' => 'Madaraka Shopping Complex',
                'rent' => 12000,
                'ratings' => 4.5,
                'description' => 'Description A',
                'image' => 'images/hostel_a.jpg',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Kwetu PK Hostel',
                'location' => 'Siwaka',
                'rent' => 15000,
                'ratings' => 4.7,
                'description' => 'Description B',
                'image' => 'images/hostel_b.jpg',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            // Add more hostels as needed
        ]);
    }
}
