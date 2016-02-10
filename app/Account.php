<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Account extends Model
{
    protected $fillable = [
        'accountdate', 'description', 'amount',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
