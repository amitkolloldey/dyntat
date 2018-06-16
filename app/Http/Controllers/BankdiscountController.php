<?php

namespace App\Http\Controllers;

use App\BankDiscount;
use Illuminate\Http\Request;

class BankdiscountController extends Controller
{
    public function index()
    {
        $banks = BankDiscount::all();
        return view('admin.others.bankdiscount')->with('banks', $banks);
    }

    public function update(Request $request)
    {
        $data = $request->all();
        if (!is_null($data)) {
            $active = BankDiscount::find($data['id']);
            if ($active) {
                $active->update([
                    'discount' => $data['dis']
                ]);
            }
        }
        return redirect()->back();
    }

    public function activeStatus($id)
    {
        if (!is_null($id)) {
            $active = BankDiscount::find($id);
            if ($active) {
                $active->update(['status' => 1]);
            }
        }
        return redirect()->back();
    }

    public function deactiveStatus($id)
    {
        if (!is_null($id)) {
            $active = BankDiscount::find($id);
            if ($active) {
                $active->update(['status' => 0]);
            }
        }
        return redirect()->back();
    }
}
