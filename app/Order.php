<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    protected $table = 'orders';

    protected $fillable = [
        'user_id', 'status', 'report_id', 'delivery_charge', 'total', 'barcode', 'discount_price', 'shipping_address'
        , 'ref_info', 'invoice_no','other_invoice_no'
    ];

    public function user()
    {
        return $this->belongsTo('App\User', 'user_id', 'id');
    }

    public function guest()
    {
        return $this->belongsTo('App\Guest', 'user_id', 'id');
    }

//    todo::parvez
//    public function payment()
//    {
//        return $this->belongsTo('App\Payment', 'payment_id', 'id');
//    }

    public function report()
    {
        return $this->belongsTo('App\Report', 'report_id', 'id');
    }

//    public function test()
//    {
//        return $this->belongsTo('App\Payment', 'payment_id', 'id');
//    }

}
