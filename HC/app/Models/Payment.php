<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Payment extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'booking_id',
        'amount',
        'payment_method',
        'transaction_id',
        'payment_date',
    ];

    // Define relationship with User model
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    // Define relationship with Booking model
    public function booking()
    {
        return $this->belongsTo(Booking::class);
    }
}
