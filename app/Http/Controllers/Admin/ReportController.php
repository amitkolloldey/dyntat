<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Order;
use App\Report;

class ReportController extends Controller
{
    public function gatAll()
    {
        $Reports = Report::all();
        return view('admin.report.all', compact('Reports'));
    }

    public function add()
    {
        $orders = Order::where('status', '=', 'Processing')->get();
        return view('admin.report.create', compact('orders'));
    }

    public function getOderDetiels(Request $request)
    {
        $newData = array();
        $data = $request->all();
        if (isset($data['orderId']) && $data['orderId'] = (int)$data['orderId']) {
            $order = Order::find($data['orderId']);
            if ($tests = json_decode($order->products)) {
                $i = 0;
                foreach ($tests as $test) {
                    $newData[$i]['id'] = $test->id;
                    $newData[$i]['name'] = $test->name;
                    $i++;
                }
                return response()->json([
                    'status' => true,
                    'message' => 'Successfully...',
                    'data' => $newData
                ]);
            }
        }
    }

    public function create(Request $request)
    {
        //if ($request->get('form') == 'report') {
        $data = $request->all();
        $reportPath = $data['testReports'];
        $orderId = $data['orderID'];
        if (!empty($reportPath) && !empty($orderId)) {
            $Report = Report::create([
                'order_id' => $orderId,
                'reposts' => $reportPath
            ]);

            $Order = Order::find($data['orderID']);
            if ($Order) {
                $Order->report_id = $Report->id;
                $Order->status = 'Success';
                $Order->save();
            }

            if ($Order) {
                return redirect()->route('report.all');
            }
        }
        //}
        //return var_dump($data);
//        $newData = $this->bookFilter($data);
//        if (($newData !== false) && isset($data['orderID'])) {
//
//            $Report = Report::create([
//                'order_id' => $data['orderID'],
//                'reposts' => json_encode($newData)
//            ]);
//            $Order = Order::find($data['orderID']);
//            if ($Order && $Order->status == 'Processing') {
//                $Order->report_id = $Report->id;
//                $Order->status = 'Sucess';
//                $Order->save();
//            }
//            if ($Order) {
//                return redirect()->route('report.all');
//            }
//        }
    }

    public function edit($id)
    {
        $Reports = Report::where('id', $id)->first();
        return view('admin.report.edit')
            ->with('Reports', $Reports);
    }

    public function update(Request $request)
    {
        $data = $request->all();
        if ($data['reportID']) {

            $Report = Report::find($data['reportID']);
            if ($Report) {
                $Report->reposts = $data['testReports'];
                $Report->save();
            }

            $Order = Order::find($data['order_id']);
            if ($Order) {
                $Order->report_id = $Report->id;
                $Order->save();
            }
            if ($Report && $Order) {
                return redirect()->route('report.all');
            }
        } else {
            return redirect()->route('report.all');
        }
    }

    private function bookFilter($data)
    {
        $newData = array();
        if (isset($data['testReports'])) {
            $i = 0;
            foreach ($data['testReports'] as $key => $value) {
                $newData[$i]['testId'] = $key;
                $newData[$i]['report'] = $value;
                $i++;
            }
            return $newData;
        } else {
            return false;
        }
    }

}
