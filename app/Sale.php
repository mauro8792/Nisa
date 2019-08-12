<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Sale extends Model
{
    protected $filliable = ['description', 'date','senia','total'];

    public function client()
    {
        return $this->belongsTo('App\Client');
    }
    public function currents()
    {
        return $this->hasMany('App\CurrentAccount');
    }
}
