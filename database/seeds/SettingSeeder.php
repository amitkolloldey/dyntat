<?php

use Illuminate\Database\Seeder;
use App\Setting;

class SettingSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $sat1 = new Setting();
        $sat1->key = 'siteLogo';
        $sat1->value = 'siteLogo'; 
        $sat1->save();
        
        $sat2 = new Setting();
        $sat2->key = 'footermsg';
        $sat2->value = 'footermsg';
        $sat2->save();
        
        $sat3 = new Setting();
        $sat3->key = 'facebook';
        $sat3->value = 'facebook';
        $sat3->save();
        
        $sat4 = new Setting();
        $sat4->key = 'twitter';
        $sat4->value = 'twitter';
        $sat4->save();
        
        $sat5 = new Setting();
        $sat5->key = 'instagram';
        $sat5->value = 'instagram';
        $sat5->save();  
    }
}
