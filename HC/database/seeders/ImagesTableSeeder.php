<?php
namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Image;
use App\Models\Hostel;

class ImagesTableSeeder extends Seeder
{
    public function run()
    {
        $hostel = Hostel::first();

        if ($hostel) {
            Image::create([
                'hostel_id' => $hostel->id,
                'path' => 'images/hostel_a.jpg'
            ]);
        }
    }
}
