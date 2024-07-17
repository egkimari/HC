<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log; // Import the Log facade
use App\Models\User;
use App\Models\Hostel;

class AssignLandlordsToHostels extends Migration {
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        // Find the landlords if they exist
        $landlord1 = User::where('email', 'karen.kavuu@strathmore.edu')->first();
        $landlord2 = User::where('email', 'quickmrt@gmail.com')->first();

        if ($landlord1 && $landlord2) {
            // Assign first hostel to the first landlord
            $hostel1 = Hostel::find(1);
            if ($hostel1) {
                $hostel1->landlord_id = $landlord1->id;
                $hostel1->save();
            } else {
                Log::error('Hostel with ID 1 not found.');
            }

            // Assign second hostel to the second landlord
            $hostel2 = Hostel::find(2);
            if ($hostel2) {
                $hostel2->landlord_id = $landlord2->id;
                $hostel2->save();
            } else {
                Log::error('Hostel with ID 2 not found.');
            }
        } else {
            // Log an error or handle the case where users are not found
            if (!$landlord1) {
                Log::error('Landlord with email karen.kavuu@strathmore.edu not found.');
            }
            if (!$landlord2) {
                Log::error('Landlord with email quickmrt@gmail.com not found.');
            }
        }
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        // Undo assignments if necessary
        $hostel1 = Hostel::find(1);
        if ($hostel1) {
            $hostel1->landlord_id = null;
            $hostel1->save();
        }

        $hostel2 = Hostel::find(2);
        if ($hostel2) {
            $hostel2->landlord_id = null;
            $hostel2->save();
        }
    }
}
