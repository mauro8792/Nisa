<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Sale extends Model
{
    protected $filliable = ['description', 'date','senia','total'];
}
