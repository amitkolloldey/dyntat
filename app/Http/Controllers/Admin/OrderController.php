<?php

namespace App\Http\Controllers\Admin;

use App\Category;
use App\TempOrder;
use Cart;
use App\HealthScreen;
use App\OrderDetail;
use App\Payment;
use App\Test;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use Validator;
use App\Order;
use App\Report;
use Illuminate\Support\Facades\DB;

class OrderController extends Controller
{

    public function gatAll()
    {
        $Orders = Order::orderBy('id', 'desc')->get();

        return view('admin.order.orders', compact('Orders'));
    }

    public function gatPendingAll()
    {
        $Orders = Order::where('status', 'Pending')->get();

        return view('admin.order.orders', compact('Orders'));
    }

    public function gatProcessingAll()
    {
        $Orders = array();

        $Orderss = Order::all();
        foreach ($Orderss as $order) {
            if ($order['status'] != "Pending" && $order['status'] != "Success" && $order['status'] != "Cancel") {
                array_push($Orders, $order);
            }
        }
        //'Pending','Processing','Sample Collection Processing','Sample Collection Done','Lab Processing','Success','Cancel'
        //$Orders = Order::all()->where('status', '=', 'Processing');
        //$sql = "SELECT * FROM `orders` WHERE status = 'Processing' OR status = 'Sample Collection Processing' OR status = 'Sample Collection Done' OR status = 'Lab Processing'";
        //$Orders = \DB::table('orders')->get();
        return view('admin.order.orders', compact('Orders'));
    }

    public function orderProcessingUp($id)
    {

        if (Auth::check()) {
            $order = Order::where('id', $id)->first();

            $tests = OrderDetail::where('order_id', $id)->get();

            $sum = Payment::where('order_id', $id)->sum('currency_amount');
            $payment = Payment::where('order_id', $id)->get();
            if ($order) {
                return view('admin.order.processing')
                    ->with('order', $order)
                    ->with('tests', $tests)
                    ->with('sum', $sum)
                    ->with('payment', $payment);
            } else {
                return redirect('/');
            }
        } else {
            return redirect('/');
        }

    }

    public function OrderProcessEdit($id)
    {
        $this->clearCondition();
        $tests = Test::all();
        $category = Category::all();
        $old_order = Order::find($id);
        $tests_order = OrderDetail::where('order_id', $old_order->id)->get();
        if ($tests_order) {
            foreach ($tests_order as $old_test) {
                if (!is_null($old_test->test_id)) {
                    $test = Test::find($old_test->test_id);
                    if ($test) {
                        $data = array();
                        $images = json_decode($test->picture);
                        $data['id'] = $test->id;
                        $data['name'] = $test->title;
                        $data['price'] = $old_test->test_price;
                        $data['quantity'] = 1;
                        $data['attributes'] = array(
                            'short_name' => $test->short_name,
                            'product_type' => 'Test',
                            'imgPath' => adminUrl($images->thumb)
                        );
                        Cart::add($data);
                    }
                } elseif (!is_null($old_test->health_sc_id)) {
                    $health = HealthScreen::find($old_test->health_sc_id);
                    $helth_tests = HelthScreenDetails::where('helth_sc_id', $old_test->health_sc_id)->get();
                    foreach ($helth_tests as $test) {
                        Cart::remove($test->test_id);
                    }
                    if ($health) {
                        $data = array();
                        $data['id'] = (4550 + $health->id);
                        $data['name'] = $health->title;
                        $data['price'] = $old_test->health_sc_price;
                        $data['quantity'] = 1;
                        $data['attributes'] = array(
                            'product_type' => 'Health',
                            'imgPath' => adminUrl($health->thumb)
                        );
                        Cart::add($data);
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
        return view('admin.order.editorder', compact('tests'))
            ->with('selected_id', $ids)
            ->with('healths', $healths)
            ->with('old_order', $old_order)
            ->with('catAll', $category);


//        $tests = Test::all();
//        $old_order = Order::find($id);
//        $tests_order = OrderDetail::where()->get();
//        if ($old_order && ($old_order->status == "Pending" || $old_order->status == "Processing")) {
//            $old_order_id = $old_order->id;
//            $payment = Payment::where('order_id', $old_order_id)->get();
//            $sum = 0;
//            foreach ($payment as $pay) {
//                $sum += $pay['currency_amount'];
//            }
//
//            return view('admin.order.editorder', compact('old_order'))
//                ->with('sum', $sum)
//                ->with('tests', $tests);
//        } else {
//            return redirect()->route('order.processing');
//        }
    }

    public function gatSucessAll()
    {
        $Orders = Order::where('status', 'Success')->get();

        return view('admin.order.orders', compact('Orders'));
    }

    public function gatCancelAll()
    {
        $Orders = Order::where('status', 'Cancel')->get();

        return view('admin.order.orders', compact('Orders'));
    }

    public function gatSingleOrder($id)
    {


        if (Auth::check()) {
            $order = Order::where('id', $id)->first();

            $tests = OrderDetail::where('order_id', $id)->get();

            $sum = Payment::where('order_id', $id)->sum('currency_amount');
            $payment = Payment::where('order_id', $id)->get();
            if ($order) {
                return view('admin.order.order')
                    ->with('order', $order)
                    ->with('tests', $tests)
                    ->with('sum', $sum)
                    ->with('payment', $payment);
            } else {
                return redirect('/');
            }
        } else {
            return redirect('/');
        }
    }

    public function OrderPendingUp($id)
    {

        if (Auth::check()) {
            $order = Order::where('id', $id)->first();

            $tests = OrderDetail::where('order_id', $id)->get();

            $sum = Payment::where('order_id', $id)->sum('currency_amount');
            $payment = Payment::where('order_id', $id)->get();
            if ($order) {
                return view('admin.order.pending')
                    ->with('order', $order)
                    ->with('tests', $tests)
                    ->with('sum', $sum)
                    ->with('payment', $payment);
            } else {
                return redirect('/');
            }
        } else {
            return redirect('/');
        }

    }

    public function OrderPendingUpdate(Request $request)
    {
        $data = $request->all();
        $validator = Validator::make($request->all(), [
            'orderId' => 'required|max:190',
            'barcode' => 'required|max:190'
        ]);

        if ($validator->fails()) {
            return redirect()
                ->route('order.panding.up', array($data['orderId']))
                ->withErrors($validator)
                ->withInput();
        } else {
            $ord = Order::where('barcode', $data['barcode'])->get();
            if ($ord->count() == 0) {
                $Orders = Order::find($data['orderId']);
                if ($Orders && $Orders->status == 'Pending') {
                    $Orders->barcode = $data['barcode'];
                    $Orders->status = 'Processing';
                    $Orders->save();
                }

                return redirect()->route('orders');
            } else {
                $validator->errors()->add('barcode', 'Duplicate Barcode.');

                return redirect()
                    ->route('order.panding.up', array($data['orderId']))
                    ->withErrors($validator)
                    ->withInput();


                return redirect()->route('order.panding.up', array($data['orderId']))->withErrors($validator, 'barcode');
            }

        }
    }

    public function OrderPendingCencel($id)
    {
        $Orders = Order::find($id);
        if ($Orders && $Orders->status == 'Pending') {
            $Orders->status = 'Cancel';
            $Orders->save();
        }

        return redirect()->route('order.panding');
    }

    public function gatByUserAll()
    {
        if (Auth::check()) {
            $Orders = Order::where('user_id', Auth::user()->id)
                ->orderBy('id', 'desc')
                ->get();

            return view('front.orders', compact('Orders'));
        }
    }

    public function gatByUserOrderDetiels($id)
    {
        if (Auth::check()) {
            $user_id = Auth::user()->id;
            $order = Order::where([
                'id' => $id,
                'user_id' => $user_id,
            ])->first();

            $tests = OrderDetail::where([
                'user_id' => $user_id,
                'order_id' => $id,
            ])->get();

            $payment = Payment::where([
                'user_id' => $user_id,
                'order_id' => $id,
            ])->sum('currency_amount');
            //todo:: helthscreen
            if ($order) {
                return view('front.order')
                    ->with('order', $order)
                    ->with('tests', $tests)
                    ->with('payment', $payment);
            } else {
                return redirect('/');
            }
        } else {
            return redirect('/');
        }
    }

    public function gatByUserId($id)
    {
        if (Auth::check()) {
            $Orders = Order::where(['user_id' => Auth::user()->id, 'id' => $id])
                ->orderBy('id', 'desc')
                ->first();

            return view('front.order', compact('Orders'));
        }
    }

    public function updateStatus(Request $request)
    {
        $data = $request->all();
        $id = $data['orderID'];
        $status = $data['status_par'];
        $Order = Order::find($id);

        if ($Order) {
            $Order->status = $status;
            $Order->save();
        }

        return redirect()->route('order.processing.up', array($id));
    }

    public function tempOrders()
    {

        $temp_orders = TempOrder::orderBy('id', 'desc')->orderBy('status', 'asc')->get();

        return view('admin.order.temp_orders')
            ->with('tempOrders', $temp_orders);
    }

    public function tempOrderCancel($id)
    {
        $temp_orders = TempOrder::where('id', $id)->where('status', 'active')->first();
        if ($temp_orders) {
            $temp_orders->status = "cancel";
            $temp_orders->save();
        }

        return redirect()->route('temp.orders');
    }

    public function gatByUserOrderEdit($id)
    {

        if (Auth::check()) {

            $tests = Test::all();
            $category = Category::all();

            if (!Cart::isEmpty()) {
                $this->clearCondition();
            }

            $user_id = Auth::user()->id;
            $old_tests = OrderDetail::where([
                'user_id' => $user_id,
                'order_id' => $id,
            ])->get();

            foreach ($old_tests as $old_test) {
                $test = Test::find($old_test->test_id);
                if ($test) {
                    $data = array();
                    $images = json_decode($test->picture);
                    $data['id'] = $test->id;
                    $data['name'] = $test->title;
                    $data['price'] = $old_test->test_price;
                    $data['quantity'] = 1;
                    $data['attributes'] = array(
                        'short_name' => $test->short_name,
                        'product_type' => 'Test',
                        'imgPath' => adminUrl($images->thumb)
                    );
                    Cart::add($data);
                }
            }

            return view('front.orderedit')
                ->with('tests', $tests)
                ->with('order_id', $id)
                ->with('catAll', $category);
        }

        return view('front.404');
    }

    public function clearCondition()
    {
        Cart::clear();
        Session::forget('discount');
        Session::forget('homeService');
    }
}
