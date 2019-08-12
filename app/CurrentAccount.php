<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class CurrentAccount extends Model
{
    protected $filliable = ['debit', 'assets','date'];

    public function payment()
    {
        return $this->belongsTo('App\Payment');
    }
    public function sale()
    {
        return $this->belongsTo('App\Sale');
    }
}
