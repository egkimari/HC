<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run()
    {
        // Seed the users table
        $this->call(UsersTableSeeder::class);

        // Seed the hostels table
        $this->call(HostelsTableSeeder::class);
         //Admin
        $this->call(AdminUserSeeder::class);
    }
}
