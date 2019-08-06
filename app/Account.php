<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Account extends Model
{
    protected $filliable = ['accountTotal'];

    public function client()
    {
        return $this->belongsTo('App\Client');
    }
}
