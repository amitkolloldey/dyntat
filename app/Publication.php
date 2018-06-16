<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Publication extends Model
{
    protected $table = 'publications';
    
    protected $fillable = [
        'name', 'date', 'thumb', 'book'
    ]; 
}
