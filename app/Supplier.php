<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Supplier extends Model
{
    protected $fillable = [
        'name', 'email', 'phone','shop','address','photo','city','accountholder','branchname','accountnumber','bankname','type'
    ];
}
