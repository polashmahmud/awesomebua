<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Useraccount extends Model
{
    protected $fillable = ['user_id', 'fooddate', 'foodamount', 'houserentdate', 'houserent', 'internetbill', 'utlitybill', 'buabill', 'pay'];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
