<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Payment extends Model
{
    protected $table = 'payments';

    protected $fillable = [
        'user_id', 'order_id', 'payment_type', 'tran_id', 'val_id', 'bank_tran_id',
        'card_type', 'card_issuer_country',
        'currency_amount', 'tran_date'
    ];
}
