<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\CustomerCorpo;
class CustomerCorpoController extends Controller
{
    public function customer(){
        $customers = CustomerCorpo::where('userType', 'Customer')->get();
        return view('admin.others.customer')
                        ->with('customers', $customers);
    }
    
    public function corporate(){
        $customers = CustomerCorpo::where('userType', 'Corporate')->get();
        return view('admin.others.corporate')
                        ->with('customers', $customers);
    }
}
