<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UsersTableSeeder extends Seeder
{
    public function run()
    {


        // Seed your users table
        DB::table('users')->insert([
            'name' => 'Erick Githinji',
            'email' => 'egkimari@gmail.com',
            'password' => Hash::make('HC@reject'),
            'is_admin' => true,
            'is_landlord' => false,
            'remember_token' => null,
        ]);

        // Add more users as needed
    }
}
