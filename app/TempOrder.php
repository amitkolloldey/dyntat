<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TempOrder extends Model {
	protected $table = 'temp_orders';

	protected $fillable = [
		'id',
		'session_id',
		'status',
		'user_info',
		'order_details'
	];
}
