<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class DeliveryCharge extends Controller
{
    function deliveryCharge()
    {
        $deliverycharge = DB::table('deliverycharge')->where('deliverycharge', '>=', '0')->first();
        if ($deliverycharge) {
            return view('admin.others.deliverycharge')->with('deliverycharge', $deliverycharge->deliverycharge);
        } else {
            return view('admin.others.deliverycharge');
        }
    }

    function updateDeliveryCharge(Request $request)
    {
        $data = $request->all();
        $deliverycharge = \App\DeliveryCharge::where('deliverycharge', '>=', '0')->first();
        $deliverycharge->deliverycharge = $data['deliverycharge'];
        $deliverycharge->save();
        if ($deliverycharge) {
            return redirect()->route('deliveryCharge');
        } else {
            return redirect()->route('deliveryCharge');

        }
    }
}
