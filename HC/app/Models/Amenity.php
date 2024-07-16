<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Amenity extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
    ];

    // Define relationship with Hostel model
    public function hostels()
    {
        return $this->belongsToMany(Hostel::class);
    }
}
