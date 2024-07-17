<?php

namespace App\Models;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Support\Facades\Hash;

class User extends Authenticatable
{
    use Notifiable;

    protected $fillable = [
        'name', 'email', 'password', 'is_admin', 'is_landlord', 'userable_type', 'userable_id',
    ];

    protected $hidden = [
        'password', 'remember_token',
    ];

    public function isAdmin()
    {
        return (bool) $this->is_admin;
    }

    public function isLandlord()
    {
        return (bool) $this->is_landlord;
    }

    public function isStudent()
    {
        return $this->userable instanceof \App\Models\Student;
    }

    public function updateProfile($name, $email, $password = null)
    {
        $updateData = [
            'name' => $name,
            'email' => $email,
        ];

        if ($password) {
            $updateData['password'] = Hash::make($password);
        }

        $this->update($updateData);
    }

    // Polymorphic relationship
    public function userable()
    {
        return $this->morphTo();
    }
}
