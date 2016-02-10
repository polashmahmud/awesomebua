<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Booking extends Model
{
    protected $fillable = [
        'bookingdate', 'breakfast', 'lunch', 'dinner'
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
