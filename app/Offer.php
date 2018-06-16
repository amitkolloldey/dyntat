<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Offer extends Model
{
    protected $table = 'offers';
    
    protected $fillable = [
        'title', 'content', 'thumb','link','meta_description',
    ];
}
