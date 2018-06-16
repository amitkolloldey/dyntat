<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Coupon extends Model
{
    protected $table = 'coupon';
    protected $fillable = [
        'code', 'discount', 'from_date', 'to_date'
    ];
}
