<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class StoreProduct extends Model
{
    protected $fillable = [
        'category_id', 'supplier_id', 'product_name','product_code','size','image','buying_price','selling_price','buying_date','product_quantity','mulimage','details','discount_price'
    ];
}
