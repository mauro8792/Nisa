<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class CurrentAccount extends Model
{
    protected $filliable = ['debit', 'assets','date'];
}
