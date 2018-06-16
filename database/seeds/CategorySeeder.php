<?php

use Illuminate\Database\Seeder;
use App\Category;
class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $cat1 = new Category();
        $cat1->name = 'Medicen';
        $cat1->save();
        
        $cat2 = new Category();
        $cat2->name = 'Ourthopadic';
        $cat2->save();
        
        $cat3 = new Category();
        $cat3->name = 'Sicologist';
        $cat3->save();
    }
}
