<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    protected $fillable = ['name', 'description','slug'];

    public function expenses()
    {
        return $this->hasMany('App\Expense');
    }
    public function getRouteKeyName()
    {
        return 'slug';
    }
}
