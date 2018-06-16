<?php

namespace App\Http\Controllers;

use App\Coupon;
use function GuzzleHttp\Promise\all;
use Illuminate\Http\Request;

class CouponController extends Controller
{
    public function index()
    {
        $coupon = Coupon::all();
        return view('admin.others.coupon')->with('coupon', $coupon);
    }

    public function addCoupon(Request $request)
    {
        $data = $request->all();
        if (!is_null($data)) {
            $coupon = Coupon::create([
                'code' => $data['coupon_code'],
                'discount' => $data['coupon_dis'],
                'from_date' => $data['from_date'],
                'to_date' => $data['to_date']
            ]);
        }
        return redirect()->back();
    }

    public function removeCoupon($id)
    {
        if (!is_null($id)) {
            $coupon = Coupon::find($id);
            if ($coupon) {
                $coupon->delete();
            }
        }
        return redirect()->back();
    }
}
