<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Client extends Model
{
    protected $filliable = ['name', 'lastname','telephone'
        ,'email','slug'];
}
