<?php

namespace App;

use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password', 'phone', 'room_id', 'picture', 'active',
    ];

    /**
     * The attributes excluded from the model's JSON form.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    public function bookings()
    {
        return $this->hasMany(Booking::class);
    }

    public function accounts()
    {
        return $this->hasMany(Account::class);
    }

    public function shops()
    {
        return $this->hasMany(Shop::class);
    }

    public function useraccounts()
    {
        return $this->hasMany(Useraccount::class);
    }

}
