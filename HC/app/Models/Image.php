<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Image extends Model
{
    use HasFactory;

    protected $fillable = [
        'hostel_id',
        'url',
    ];

    /**
     * Get the hostel that owns the image.
     */
    public function hostel()
    {
        return $this->belongsTo(Hostel::class);
    }
}
