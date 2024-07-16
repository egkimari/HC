<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use App\Models\User;

class AdminUserSeeder extends Seeder
{
    public function run()
    {
        // Seed Admin
        User::updateOrCreate(
            ['email' => 'egkimari@gmail.com'],  // Search for the admin user by email
            [
                'name' => 'Erick Githinji',
                'password' => Hash::make('HC@reject'),  // Hash the password
                'is_admin' => true,  // Set user as admin
                'is_landlord' => false,  // Set user as not a landlord
                'remember_token' => null,  // Ensure remember_token is null
            ]
        );
    }
}
