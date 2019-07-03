<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Employee extends Model
{
   protected $fillable = [
        'name', 'email', 'phone','salary','address','photo','city','experience','vacation','nid'
    ];
}
