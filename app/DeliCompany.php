<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class DeliCompany extends Model
{
    protected $fillable = [
        'company_name', 'phone', 'address'
    ];
}
