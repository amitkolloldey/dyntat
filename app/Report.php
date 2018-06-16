<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Report extends Model
{
    protected $table = 'reports';
    
    protected $fillable = [
        'order_id', 'reposts'
    ];

    public function order()
    {
        return $this->belongsTo('App\Order', 'order_id', 'id');
    }
}
