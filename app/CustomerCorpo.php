<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class CustomerCorpo extends Model
{
    protected $table = 'customer_corpos';
    
    protected $fillable = [
        'personName', 'companyName', 'personMobile', 'email', 
        'remarks', 'userType'
    ];
}
