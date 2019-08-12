<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Payment extends Model
{
    protected $filliable = ['description', 'payment','date','paymentForm'];

    public function client()
    {
        return $this->belongsTo('App\Client');
    }
    public function currents()
    {
        return $this->hasMany('App\CurrentAccount');
    }
}
