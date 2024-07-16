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
        'ratings',
        'description',
    ];

    /**
     * Get the images associated with the hostel.
     */
    public function images()
    {
        return $this->hasMany(Image::class);
    }

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
