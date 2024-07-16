<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Landlord extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'email',
        'phone_number',
    ];

    // Define relationship with Hostel model
    public function hostels()
    {
        return $this->hasMany(Hostel::class);
    }

    // Define the inverse of the polymorphic relationship
    public function user()
    {
        return $this->morphOne(User::class, 'userable');
    }
}
