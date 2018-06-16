<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Test extends Model
{
    
    protected $table = 'tests';
    
    protected $fillable = [
        'id','sl_no','title', 'link','short_name', 'price', 'sale_price', 'content', 'picture'
    ];
    
    public static function getCategoriesIdOnly($test){
        $dara = array();
        if(is_object($test)){
            foreach ($test->categories as $cats){
                $dara[] = $cats->id;
            }
            return $dara;
        } 
        return false;
    }

    public function categories(){
        return $this->belongsToMany('App\Category', 'test_cats', 'test_id', 'cat_id');
    } 
}
