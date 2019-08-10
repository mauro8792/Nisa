<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Expense extends Model
{
    protected $fillable =['description','totalAmount','totalPayment']   ;

    public function categories()
    {
        return $this->belongsTo('App\Category');
    }

}
