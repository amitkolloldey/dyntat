<?php

namespace App\Http\Controllers;

use App\Category;
use App\HealthScreen;
use App\HelthScreenDetails;
use App\Test;
use Cart;
use App\TestMenuModel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class TestMenu extends Controller
{
    public function index()
    {
        $tests = Test::all();
        $category = Category::all();
        if ($tests) {
            if (Auth::check() && Cart::isEmpty()) {
                $id = Auth::user()->id;
                $old = DB::table('wishlist')->where('user_id', $id)->get();
                if ($old) {
                    foreach ($old as $old_test) {
                        if (!is_null($old_test->test_id)) {
                            $test = Test::find($old_test->test_id);
                            if ($test) {
                                $data = array();
                                $data['id'] = $test->id;
                                $data['name'] = $test->title;
                                $data['price'] = $test->sale_price != "" ? $test->sale_price : $test->price;
                                $data['quantity'] = 1;
                                $data['attributes'] = array(
                                    'product_type' => 'Test',
                                );
                                Cart::add($data);
                            }
                        } elseif (!is_null($old_test->health_sc_id)) {
                            $health = HealthScreen::find($old_test->health_sc_id);
                            $helth_tests = HelthScreenDetails::where('helth_sc_id', $old_test->health_sc_id)->get();
                            foreach ($helth_tests as $test) {
                                Cart::remove($test->test_id);
                                if (Auth::check()) {
                                    $user_id = Auth::user()->id;
                                    $old = DB::table('wishlist')->where([['user_id', '=', $user_id], ['test_id', '=', $test->test_id]])->first();
                                    if ($old) {
                                        DB::table('wishlist')
                                            ->where([['user_id', '=', $user_id], ['test_id', '=', $test->test_id]])
                                            ->delete();
                                    }
                                }
                            }
                            if ($health) {
                                $data = array();
                                $data['id'] = (4550 + $health->id);
                                $data['name'] = $health->title;
                                $data['price'] = $health->old_price != "" ? $health->old_price : $health->price;
                                $data['quantity'] = 1;
                                $data['attributes'] = array(
                                    'product_type' => 'Health',
                                );
                                Cart::add($data);
                            }
                        } else {

                        }
                    }
                }
            }
            $cart_list = Cart::getContent();
            $ids = array();
            foreach ($cart_list as $cart) {
                if ($cart->attributes->product_type == 'Health') {
                    $id = (int)$cart->id - 4550;
                    $helth_test = HelthScreenDetails::where('helth_sc_id', $id)->get();
                    foreach ($helth_test as $test_id) {
                        array_push($ids, $test_id->test_id);
                    }
                }
            }
            $healths = HealthScreen::all();
            return view('front.testmenu', compact('tests'))
                ->with('selected_id', $ids)
                ->with('healths', $healths)
                ->with('catAll', $category);
        } else {
            return view('front.404');
        }
    }

}
