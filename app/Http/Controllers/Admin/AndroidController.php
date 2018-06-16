<?php

namespace App\Http\Controllers\Admin;

use App\Api;
use App\HealthScreen;
use App\HelthScreenDetails;
use App\Test;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Validator;
use App\User;
use App\Role;
use \Firebase\JWT\JWT;

class AndroidController extends Controller
{


    public function processRequest(Request $request)
    {
        $data = $request->all();
        $sqvalidator = Validator::make($request->all(), [
            'sqcode' => 'required',
            'rqcode' => 'required',
        ]);

        //Request code 1 for user creation
        if ($data['sqcode'] === "BB2017") {

            if ($data['rqcode'] == 1) {
                $user = $this->userCreate($request, $data);
                if ($user == "error.name") {
                    return "Error-1003";
                } elseif ($user == "error.email") {
                    return "Error-1004";
                } elseif ($user == "error.password") {
                    return "Error-1005";
                } elseif ($user == "error.mobile") {
                    return "Error-1006";
                } elseif ($user == "error.address") {
                    return "Error-1007";
                } elseif ($user == "error.unknown") {
                    return "Error-1008";
                } elseif ($user == "success.true") {
                    return response()->json([
                        'success' => true,
                        'message' => 'user Create Successfull'
                    ]);
                }
            } elseif ($data['rqcode'] == 2) {
                if ($data['useremail']) {
                    $usergetvalidator = Validator::make($request->all(), [
                        'useremail' => 'required',
                    ]);
                }
            } elseif ($data['rqcode'] == 3) {

            } else {
                return "Error-1002";
            }
        } else {
            return "Error-1001";
        }
    }

    private function userOrder($request, $data)
    {
        $userOrderValidator = Validator::make($request->all(), [
            'userId' => 'required|numeric|unique:users,id',
            'useremail' => 'required|max:190|unique:users,email',
            'payment_type' => ['required',
                Rule::in(['condetion', 'ssl']),
            ],
            'products' => 'required|json',
            'products' => 'required|json'
        ]);
    }

    private function userCreate($request, $data)
    {
        $uservalidator = Validator::make($request->all(), [
            'username' => 'required',
            'userpassword' => 'required|max:190',
            'useremail' => 'required|max:190|unique:users,email',
            'usermobile' => 'required|max:20',
            'useraddress' => 'required'
        ]);
        if ($uservalidator->fails()) {
            $errors = $uservalidator->errors()->all();
            if ($uservalidator->errors()->has('username')) {
                return "error.name";
            } elseif ($uservalidator->errors()->has('useremail')) {
                return "error.email";
            } elseif ($uservalidator->errors()->has('userpassword')) {
                return "error.password";
            } elseif ($uservalidator->errors()->has('usermobile')) {
                return "error.mobile";
            } elseif ($uservalidator->errors()->has('useraddress')) {
                return "error.address";
            } else {
                return "error.unknown";
            }
        } else {
            if (isset($data['picture']) && ($data['picture'] != "")) {
                $data['picture'] = $data['picture'];
            } else {
                $data['picture'] = "";
            }
            $user = User::create([
                'name' => $data['username'],
                'email' => $data['useremail'],
                'password' => bcrypt($data['userpassword']),
                'mobile' => $data['usermobile'],
                'address' => $data['useraddress'],
                'picture' => $data['picture'],
                'status' => '1'
            ]);
            $role_user = Role::where('name', 'User')->first();
            $user->roles()->attach($role_user);
            return "success.true";
        }
    }


    //http://localhost/dyntat/api/tests/key
    //I0JOsdko6sthydkSOjrodsCajd5mreklds6pok
    //http://localhost/dyntat/api/tests/I0JOsdko6sthydkSOjrodsCajd5mreklds6pok
    public function getTests($key)
    {
        $testsArray = array();
        $keyStatus = Api::where('api_key', $key)->get()->first();
        if ($keyStatus) {
            $tests = Test::orderBy('title', 'ASC')->get();
            foreach ($tests as $test) {
                $testImg = json_decode($test->picture);
                $temp = array(
                    'id' => $test->id,
                    'name' => $test->title,
                    'code' => $test->short_name,
                    'content' => strip_tags($test->content),
                    'price' => $test->price,
                    'thumb' => adminUrl($testImg->thumb),
                    'image' => adminUrl($testImg->large),
                );
                array_push($testsArray, $temp);
            }
            return json_encode($testsArray,JSON_PRETTY_PRINT);
        } else {
            return 404;
        }
    }

    //http://localhost/dyntat/api/packages/key
    //I0JOsdko6sthydkSOjrodsCajd5mreklds6pok
    public function getPackages($key)
    {
        $healthScreens = array();
        $keyStatus = Api::where('api_key', $key)->get()->first();
        if ($keyStatus) {
            $packages = HealthScreen::orderBy('title', 'ASC')->get();
            foreach ($packages as $package) {
                $id = $package->id;
                $tests = HelthScreenDetails::where('helth_sc_id', $id)->get();
                $temp_tests = array();
                foreach ($tests as $test) {
                    array_push($temp_tests, array('test_id'=>$test->test_id));
                }
                $temp = array(
                    'id' => $id,
                    'title' => $package->title,
                    'type' => $package->type,
                    'image' => adminUrl($package->thumb),
                    'price' => $package->price,
                    'test_ids' => ($temp_tests)
                );
                array_push($healthScreens, $temp);
            }
            return json_encode($healthScreens,JSON_PRETTY_PRINT);
        } else {
            return 404;
        }
    }


    //http://localhost/dyntat/api/order
    public function createOrder(Request $request)
    {
        $key = "example_key";
        $data = $request->all();
        $data = $data['value'];
        $decoded = JWT::decode($data, $key, array('HS256'));
        $info = json_decode($decoded);
        $app_user_mobile = $info->data->app_user_mobile;
        $patient_name = $info->data->patient_name;
        $patient_mobile_no = $info->data->patient_mobile_no;
        $patient_email = $info->data->patient_email;
        $patient_gender = $info->data->patient_gender;
        $patient_age = $info->data->patient_age;
        $patient_full_address = $info->data->patient_full_address;
        $coupon_code = $info->data->coupon_code;
        $afc_order_invoice_no = $info->data->afc_order_invoice_no;
        $discount_flag = $info->data->discount_flag;
        $discount_amount = $info->data->discount_amount;
        $tests = $info->data->requested_tests;
        $packages = $info->data->requested_packages;



        //after order placed
        $order_response = array(
            "app_user_mobile" => "sdfsf23232",
            "invoice_no" => "scasc32423",
            "afc_order_invoice_no" => "2343rw3r3r3"
        );

        $order_responce_json = json_encode($order_response,JSON_PRETTY_PRINT);
        return var_dump($order_responce_json);
    }

}