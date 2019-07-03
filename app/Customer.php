<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Customer extends Model
{
     protected $fillable = [
        'name', 'email', 'phone','shop_name','address','photo','city','account_holder','account_branch','account_number','bank_name'
    ];
}
