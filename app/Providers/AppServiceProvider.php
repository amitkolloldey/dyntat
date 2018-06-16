<?php

namespace App\Providers;

use App\Test;
use App\Category;
use App\ClientSays;
use App\Partner;
use App\Career;
use App\Order;
use App\User;
use App\Slider;
use Illuminate\Support\Facades\View;
use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Schema;


class AppServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        Schema::defaultStringLength(191);
        
        View::composer(['front.search', 'front.services', 'front.services-single'], function ($view) {
            $catAll = Category::gatAll();
            $view->with('catAll', $catAll);
        });
        
        View::composer(['front.home'], function ($view) {
            //$testAll            = Test::all()->random(12);
            $catAll             = Category::gatAll();
            $ClientSaysAll      = ClientSays::all();
            $PartnerAll         = Partner::all();
            
            //$view->with('testAll', $testAll);
            $view->with('catAll', $catAll);
            $view->with('ClientSaysAll', $ClientSaysAll);
            $view->with('PartnerAll', $PartnerAll);
        });
        View::composer(['front.layouts.slider'], function ($view) {
            $SliderAll          = Slider::all();
            $view->with('sliderAll', $SliderAll);
        });
        
//        View::composer(['front.career'], function ($view) {
//            $Careers           = Career::all();  
//            $view->with('Careers', $Careers);
//        });
        
        View::composer(['admin.index'], function ($view) {
            $TestCount  = Test::all()->count();  
            $OrderCount = Order::all()->count();  
            $UserCount  = User::all()->count();
            $Orders = Order::where('status', 'Pending')->orderBy('id', 'desc')->take(10)->get();
            //$Orders = Order::all()->take(10);
            $view->with('TestCount', $TestCount)
                ->with('OrderCount', $OrderCount)
                ->with('UserCount', $UserCount)
                ->with('Orders', $Orders);
        });
    }

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }
    public function taka_format($amount = 0)
    {
	    $tmp = explode('.', $amount); // for float or double values
	    $strMoney = '';
	    $divide = 1000;
	    $amount = $tmp[0];
	    $strMoney .= str_pad($amount % $divide, 3, '0', STR_PAD_LEFT);
	    $amount = (int)($amount / $divide);
	    while ($amount > 0) {
		    $divide = 100;
		    $strMoney = str_pad($amount % $divide, 2, '0', STR_PAD_LEFT) . ',' . $strMoney;
		    $amount = (int)($amount / $divide);
	    }
	    if (substr($strMoney, 0, 1) == '0')
		    $strMoney = substr($strMoney, 1);

	    if (isset($tmp[1])) // if float and double add the decimal digits here.
	    {
		    return $strMoney . '.' . $tmp[1];
	    }

	    return $strMoney;
    }
}
