<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Employee extends Model
{
    protected $fillable = ['name', 'lastname','telephone','adress','starDate', 'salary'];
    public function getRouteKeyName()
    {
        return 'slug';
    }
}
