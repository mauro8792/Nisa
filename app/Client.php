<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Client extends Model
{
    protected $filliable = ['name', 'lastname','telephone'
        ,'email','slug','numberOfOrder'];

    public function account()
    {
        return $this->hasOne('App\Account');
    }

    public function payments()
    {
        return $this->hasMany('App\Payment');
    }
    public function sales()
    {
        return $this->hasMany('App\Sale');
    }
}
