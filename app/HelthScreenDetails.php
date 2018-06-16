<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class HelthScreenDetails extends Model
{
    protected $table = 'helth_screen_details';

    protected $fillable = [
        'test_id', 'helth_sc_id'
    ];

    public function test()
    {
        return $this->belongsTo('App\Test', 'test_id', 'id');
    }
}
