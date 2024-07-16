<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Hostel extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'location',
        'rent',
        'image',
        'ratings',
        'description',
    ];

    // Define relationship with Booking model
    public function bookings()
    {
        return $this->hasMany(Booking::class);
    }

    // Define relationship with Review model (if applicable)
    public function reviews()
    {
        return $this->hasMany(Review::class);
    }
}
