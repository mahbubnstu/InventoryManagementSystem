<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $fillable = [
        'product_name', 'product_garage','product_code','buying_price','selling_price','buy_date','expire_date','cat_id','sup_id','product_route','product_image'
    ];
}
