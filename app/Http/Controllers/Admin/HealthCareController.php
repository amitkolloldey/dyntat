<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Healthcare;
class HealthCareController extends Controller
{
    public function doctor(){
        $customers = Healthcare::where('registerAs', 'Doctor')->get();
        return view('admin.others.doctor')
                        ->with('customers', $customers);
    }
    public function healthcare(){
        $customers = Healthcare::whereNotIn('registerAs', array('Doctor')) 
                                ->get();
        return view('admin.others.doctor')
                        ->with('customers', $customers);
    }
}
