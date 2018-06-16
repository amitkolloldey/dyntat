<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\ServiceClient;
class ServiceArea extends Model
{
    protected $table = 'service_areas';
    
    protected $fillable = [
        'name'
    ];
    
    public function client(){ 
        return $this->hasMany('App\ServiceClient', 'serviceAreas_id'); 
    }
}
