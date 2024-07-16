<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class HostelsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Insert multiple hostels into the 'hostels' table
        DB::table('hostels')->insert([
            [
                'name' => 'Hazina Hostel', // Name of the hostel
                'location' => 'Madaraka Shopping Complex', // Location of the hostel
                'rent' => 12000, // Rent amount
                'ratings' => 4.5, // Ratings out of 5
                'description' => 'Description A', // Description of the hostel
                'image' => 'images/hostel_a.jpg', // Image filename relative to public directory
                'created_at' => now(), // Timestamp when the record was created
                'updated_at' => now(), // Timestamp when the record was last updated
            ],
            [
                'name' => 'Kwetu PK Hostel', // Name of the hostel
                'location' => 'Siwaka', // Location of the hostel
                'rent' => 15000, // Rent amount
                'ratings' => 4.7, // Ratings out of 5
                'description' => 'Description B', // Description of the hostel
                'image' => 'images/hostel_b.jpg', // Image filename relative to public directory
                'created_at' => now(), // Timestamp when the record was created
                'updated_at' => now(), // Timestamp when the record was last updated
            ],
            // Add more hostel entries here as needed
        ]);
    }
}
