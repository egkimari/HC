<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Admin extends Model
{
    protected $fillable = [

    ];

    public function user()
    {
        return $this->morphOne(User::class, 'userable');
    }
}
