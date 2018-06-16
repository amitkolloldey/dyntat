<?php

namespace App\Http\Controllers\Admin;

use App\HelthScreenDetails;
use App\Test;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\HealthScreen;
use Validator;

class HealthScreenController extends Controller
{
    public function gatAll()
    {
        $HealthScreens = HealthScreen::all();
        //$users = User::with('roles')->get();
        return view('admin.health.all', compact('HealthScreens'));
    }

    public function add()
    {
        $tests = Test::orderBy('title', 'asc')->get();
        return view('admin.health.create')
            ->with('tests', $tests);
    }

    public function create(Request $request)
    {
        $data = $request->all();
        $validator = Validator::make($request->all(), [
            'title' => 'required|max:255',
            'price' => 'required'
        ]);
        if ($validator->fails()) {
            return redirect()
                ->back()
                ->withErrors($validator)
                ->withInput();
        } else {
            if (isset($data['testsId'])) {
                $link = $this->clean($data['title']);
                //$data['thumb'] = $data['thumb'] != null ? $data['thumb'] : "";
                //$data['old_price'] = $data['old_price'] != null ? $data['old_price'] : "";
                $HealthScreen = HealthScreen::create([
                    'title' => $data['title'],
                    'meta_description' => $data['meta_description'],
                    'link' => strtolower($link),
                    'old_price' => $data['old_price'],
                    'type' => $data['package_type'],
                    'price' => $data['price'],
                    'content' => $data['content'],
                    'thumb' => $data['thumb']
                ]);
                $id = $HealthScreen->id;
                foreach ($data['testsId'] as $test_id) {
                    HelthScreenDetails::create([
                        'helth_sc_id' => $id,
                        'test_id' => $test_id
                    ]);
                }
                return redirect()->route('health.all');
            } else {
                return redirect()->route('health.all');
            }
        }
        return redirect()->route('health.all');
    }

    public function edit($id)
    {
        $HealthScreens = HealthScreen::where('id', $id)->get();
        $selected_tests = HelthScreenDetails::where('helth_sc_id', $id)->get();
        $tests = Test::orderBy('title', 'asc')->get();
        $ids = array();
        foreach ($selected_tests as $test) {
            array_push($ids, $test->test->id);
        }
        return view('admin.health.edit')
            ->with('HealthScreens', $HealthScreens)
            ->with('selected_tests', $selected_tests)
            ->with('ids', $ids)
            ->with('tests', $tests);
    }

    public function update(Request $request)
    {
        $data = $request->all();
        //return $data;
        if (isset($data['testsId'])) {
            if ($data['healthId']) {
                $HealthScreen = HealthScreen::find($data['healthId']);
                if ($HealthScreen) {
                    $link = $this->clean($data['title']);
                    //$data['thumb'] = $data['thumb'] != null ? $data['thumb'] : "";
                    //$data['old_price'] = $data['old_price'] != null ? $data['old_price'] : "";
                    $HealthScreen->title = $data['title'];
                    $HealthScreen->link = strtolower($link);
                    $HealthScreen->meta_description = $data['meta_description'];
                    $HealthScreen->old_price = $data['old_price'];
                    $HealthScreen->price = $data['price'];
                    $HealthScreen->type = $data['package_type'];
                    $HealthScreen->content = $data['content'];
                    $HealthScreen->thumb = $data['thumb'];
                    $HealthScreen->save();

                    $id = $HealthScreen->id;
                    HelthScreenDetails::where('helth_sc_id', $id)->delete();
                    foreach ($data['testsId'] as $test_id) {
                        HelthScreenDetails::create([
                            'helth_sc_id' => $id,
                            'test_id' => $test_id
                        ]);
                    }
                }
            }
        }
        return redirect()->route('health.all');
    }

    public function delete($id)
    {

        $HealthScreen = HealthScreen::where('id', $id)->first();
        if ($HealthScreen) {
            /*
            $file = str_replace( "/","\/", 'adminStroage/'.$HealthScreen->thumb );
            $filePath = public_path($file);
            unlink($filePath); 
             */
            $HealthScreen->delete();
            return redirect()->route('health.all');
        } else {
            return redirect()->route('health.all');
        }
    }

    function clean($string)
    {
        $string = str_replace(' ', '-', $string); // Replaces all spaces with hyphens.
        $string = str_replace('.', '-', $string); // Replaces all spaces with hyphens.
        $value = preg_replace('/[^A-Za-z0-9\-]/', '', $string); // Removes special chars.
        $temp = "";
        $flag = true;
        foreach (str_split($value) as $ch) {
            if ($ch == '-') {
                if (!$flag) {
                    continue;
                }
                $temp .= $ch;
                $flag = false;
            } else {
                $temp .= $ch;
                $flag = true;
            }
        }
        return $temp;
    }
}
