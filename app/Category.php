<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    
    protected $table = 'categories';
    
    protected $fillable = [
        'name'
    ];
    
    public static function gatAll(){
        $cats = self::all();
        return $cats;
    }
    
    public function tests(){
        return $this->belongsToMany('App\Test', 'test_cats', 'cat_id', 'test_id');
    }  
}
