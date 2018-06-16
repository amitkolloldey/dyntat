<?php

namespace App\Http\Controllers\Admin;

use App\RequestCall;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Validator;
use App\Test;
use App\BookTest;

class BookTestController extends Controller
{
    public function bookTestall()
    {
        $testall = BookTest::all();
        return view('admin.order.booktests')
            ->with('testall', $testall);
    }

    public function bookTestSingle($id)
    {
        $testall = BookTest::find($id);
        return view('admin.order.booktest')
            ->with('testall', $testall);
    }

    public function bookTest()
    {
        $testall = Test::all();
        return view('front.booktest')
            ->with('testall', $testall);
    }

    public function createBookTest(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required|max:190',
            'email' => 'required|max:190',
            'mobile' => 'required|max:20',
            'address' => 'required',
            'testList' => 'required',
        ]);
        if ($validator->fails()) {
            return redirect()
                ->back()
                ->withErrors($validator)
                ->withInput();
        } else {
            $data = $request->all();
            $BookTest = BookTest::create([
                'name' => $data['name'],
                'email' => $data['email'],
                'mobile' => $data['mobile'],
                'address' => $data['address']
            ]);
            if ($BookTest) {
                $BookTest->tests()->attach($data['testList']);
                return redirect()
                    ->back()
                    ->with('message', 'Booking Test successfully');
            }
        }
    }

    public function requestCall()
    {
        $requestCalls = RequestCall::all();
        return view('admin.others.requestcall')
            ->with('requestCalls', $requestCalls);
    }
}
