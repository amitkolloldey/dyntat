<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Healthcare extends Model
{
    protected $table = 'healthcares';
    
    protected $fillable = [
        'mobile', 'firstname', 'lastname', 'registerAs', 
        'qualification', 'specialization', 'email', 'phone', 
        'homeAddress', 'chamberAddress'
    ]; 
}
