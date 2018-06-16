<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class OrderDetail extends Model
{
    protected $table = 'order_details';

    protected $fillable = [
        'order_id', 'user_id', 'test_id', 'test_price', 'helth_sc_id', 'helth_sc_price'
    ];

    public function test()
    {
        return $this->belongsTo('App\Test', 'test_id', 'id');
    }

    public function health()
    {
        return $this->belongsTo('App\HealthScreen', 'helth_sc_id', 'id');
    }
}
