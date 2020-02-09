<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Expense extends Model
{
    protected $fillable =['description','totalPayment','numberOfTicket','date','category_id']   ;

    public function category()
    {
        return $this->belongsTo('App\Category');
    }

}
