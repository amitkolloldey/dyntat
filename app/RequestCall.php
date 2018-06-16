<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class RequestCall extends Model
{
    protected $table = 'request_calls';
    
    protected $fillable = [
        'test_id', 'number'
    ];
}
