<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class BookTest extends Model
{
    protected $table = 'book_tests';
    
    protected $fillable = [
        'name', 'email', 'mobile', 'address'
    ];//
    
    public function tests(){ 
        return $this->belongsToMany('App\Test', 'testabale', 'book_id', 'test_id');
    }
}
