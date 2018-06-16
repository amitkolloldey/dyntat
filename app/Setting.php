<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;
class Setting extends Model
{
    protected $table = 'settings';
    
    protected $fillable = [
        'key', 'value'
    ]; 
    
    public static function getData(){
        $settings = DB::table('settings')->get();
        return $settings;
    }
}
