<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ClientSays extends Model
{
    protected $table = 'client_says';
    
    protected $fillable = [
        'name', 'subTitle', 'message', 'thumb'
    ];
}
