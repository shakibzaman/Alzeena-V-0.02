<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Extra extends Model
{
    protected $fillable = [
        'vat', 'logo','favicon','phone','email','address'
    ];
}
