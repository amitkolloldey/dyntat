<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class HealthScreen extends Model
{
    protected $table = 'health_screens';

    protected $fillable = [
        'title', 'link', 'type', 'meta_description', 'content', 'thumb', 'price', 'old_price'
    ];
}
