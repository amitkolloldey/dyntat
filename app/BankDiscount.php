<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class BankDiscount extends Model
{
    protected $table = 'bank_discount';
    protected $fillable = [
        'name','field_name','discount','status'
    ];
}
