<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UsersTableSeeder extends Seeder
{
    // Run the database seeds.
    public function run()
    {
        // Clear the users table
        DB::table('users')->truncate();

        // Create an admin user
        DB::table('users')->insert([
            'name' => 'Erick Githinji',
            'email' => 'egkimari@gmail.com',
            'password' => Hash::make('HC@reject'),  // Hash the password
            'is_admin' => true,  // Set is_admin to true
            'remember_token' => null,
        ]);

        // Add more users or seed other data as needed
    }
}
