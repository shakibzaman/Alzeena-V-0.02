<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class SuuplierAccount extends Model
{
    protected $fillable = [
        'sup_id', 'amount', 'pay','due','entry_date','entry_month'
    ];
}
