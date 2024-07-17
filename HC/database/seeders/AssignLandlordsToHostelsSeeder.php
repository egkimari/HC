<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use App\Models\Landlord;
use App\Models\Hostel; // Import the Hostel model

class AssignLandlordsToHostelsSeeder extends Seeder
{
    public function run()
    {
        // Fetch or create landlords
        $landlord1 = Landlord::firstOrCreate(['name' => 'Landlord 1']);
        $landlord2 = Landlord::firstOrCreate(['name' => 'Landlord 2']);

        // Assign hostels to landlords
        $hostel1 = Hostel::find(1);
        if ($hostel1) {
            $hostel1->landlord_id = $landlord1->id;
            $hostel1->save();
        }

        $hostel2 = Hostel::find(2);
        if ($hostel2) {
            $hostel2->landlord_id = $landlord2->id;
            $hostel2->save();
        }
    }
}