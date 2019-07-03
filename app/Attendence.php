<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Attendence extends Model
{
    protected $fillable = [
        'att_date', 'att_year', 'attendence','user_id','edit_date','month'
    ];
}
