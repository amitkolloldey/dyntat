<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ServiceClient extends Model
{
    protected $table = 'service_clients';
    
    protected $fillable = [
       'serviceAreas_id', 'name'
    ];
}
