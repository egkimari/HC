<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
use App\Models\Student;
use App\Models\Landlord;
use App\Models\Admin;
use App\Models\User;

class AdminUserSeeder extends Seeder
{
    public function run()
    {
        // Create an admin user
        $admin = Admin::create([
            'name' => 'Admin Name',
            'email' => 'admin@example.com',
            'phone' => '1234567890', // Add phone number for admin
            'address' => '123 Admin Street', // Add address for admin
        ]);

        User::create([
            'name' => 'Admin User',
            'email' => 'admin@example.com',
            'email_verified_at' => now(),
            'password' => Hash::make('HC@Reject'), // Admin password
            'remember_token' => Str::random(10),
            'created_at' => now(),
            'updated_at' => now(),
            'is_admin' => true,  // Admin user flag
            'userable_type' => Admin::class,  // Fully qualified class name
            'userable_id' => $admin->id,  // ID of the created Admin
        ]);

        // Create a student user
        $student = Student::create([
            'name' => 'Jane Doe',
            'email' => 'janedoe@example.com',
            'phone' => '1234567890',
            'address' => '123 Student Lane',
        ]);

        User::create([
            'name' => 'Jane Doe',
            'email' => 'janedoe@example.com',
            'email_verified_at' => now(),
            'password' => Hash::make('password'), // Student password
            'remember_token' => Str::random(10),
            'created_at' => now(),
            'updated_at' => now(),
            'is_admin' => false,
            'userable_type' => Student::class,  // Fully qualified class name
            'userable_id' => $student->id,  // ID of the created Student
        ]);

        // Create a landlord user
        $landlord = Landlord::create([
            'name' => 'John Doe',
            'email' => 'johndoe@example.com',
            'phone' => '0987654321',
            'address' => '456 Landlord Road',
        ]);

        User::create([
            'name' => 'John Doe',
            'email' => 'johndoe@example.com',
            'email_verified_at' => now(),
            'password' => Hash::make('password'), // Landlord password
            'remember_token' => Str::random(10),
            'created_at' => now(),
            'updated_at' => now(),
            'is_admin' => false,
            'userable_type' => Landlord::class,  // Fully qualified class name
            'userable_id' => $landlord->id,  // ID of the created Landlord
        ]);
    }
}
