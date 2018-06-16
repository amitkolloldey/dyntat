<?php

use Illuminate\Database\Seeder;
use App\Test;
use App\Category;
class TestSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $cat1 = Category::where('id', 1)->first();
        $cat2 = Category::where('id', 2)->first();
        $cat3 = Category::where('id', 3)->first();
        
        $test1 = new Test(); 
        $test1->title      = 'Blood Test';
        $test1->link      = 'blood_test';
        $test1->meta_description = 'Test description';
        $test1->short_name = 'MBC';
        $test1->price      = '500'; 
        $test1->sale_price = '400'; 
        $test1->content    = 'this is some content'; 
        $test1->picture    = 'tests/service-4.png';
        $test1->save();
        $test1->categories()->attach($cat1);
        
        $test2 = new Test(); 
        $test2->title      = 'Xray';
        $test2->link      = 'xray_test';
        $test2->meta_description = 'Test description';
        $test2->short_name = 'OBC'; 
        $test2->price      = '500'; 
        $test2->sale_price = '400'; 
        $test2->content    = 'this is some content'; 
        $test2->picture    = 'tests/service-4.png';
        $test2->save();
        $test2->categories()->attach($cat2);
        
        $test3 = new Test(); 
        $test3->title      = 'Urine Test';
        $test3->link      = 'urine_test';
        $test3->meta_description = 'Test description';
        $test3->short_name = 'SBC'; 
        $test3->price      = '500'; 
        $test3->sale_price = '400'; 
        $test3->content    = 'this is some content'; 
        $test3->picture    = 'tests/service-4.png';
        $test3->save();
        $test3->categories()->attach($cat3);
        
    }
}
