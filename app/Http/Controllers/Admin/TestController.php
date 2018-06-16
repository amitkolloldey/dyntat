<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Requests\TestRequest;
use App\Http\Controllers\Controller;
use App\Test;
use App\Category;

class TestController extends Controller
{

    public function gatAll()
    {
        $tests = Test::all();
        //$users = User::with('roles')->get();
        return view('admin.test.all', compact('tests'));
    }

    public function add()
    {
        $cats = Category::all();
        return view('admin.test.create', compact('cats'));
    }

    public function create(TestRequest $request)
    {
        $data = $request->all();
        //var_dump($data); 
        //$data['content'] != null ? $data['content'] : "";
       // $data['picture'] != null ? $data['picture'] : "";
        $link = $this->clean($data['title']);
        //var_dump($data['cats']) ;
        $test = Test::create([
            'sl_no' => $data['sl_no'],
            'title' => $data['title'],
            'short_name' => $data['short_name'],
            'meta_description' => $data['meta_description'],
            'link' => strtolower($link),
            'price' => $data['price'],
            'sale_price' => $data['sale_price'],
            'content' => $data['content'],
            'picture' => $data['picture']
        ]);
        if ($data['cats']) {
            foreach ($data['cats'] as $cat) {
                $test->categories()->attach($cat);
            }
            return redirect()->route('test.all');
        }
        return redirect()->route('test.all');
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

    public function edit($id)
    {
        $tests = Test::where('id', $id)->get();
        $cats = Category::all();
        return view('admin.test.edit')
            ->with('tests', $tests)
            ->with('cats', $cats);
    }

    public function update(TestRequest $request)
    {
        $data = $request->all();

        if ($data['testId']) {
            $test = Test::find($data['testId']);
            if ($test) {
                $link = $this->clean($data['title']);
                //$data['content'] != null ? $data['content'] : "";
                //$data['picture'] != null ? $data['picture'] : "";
                $test->sl_no = $data['sl_no'];
                $test->title = $data['title'];
                $test->link = strtolower($link);
                $test->short_name = $data['short_name'];
                $test->meta_description = $data['meta_description'];
                $test->price = $data['price'];
                $test->sale_price = $data['sale_price'];
                $test->content = $data['content'];
                $test->picture = $data['picture'];
                $test->save();
                $test->categories()->detach();
                if (isset($data['cats'])) {
                    foreach ($data['cats'] as $cat) {
                        $test->categories()->attach($cat);
                    }
                    return redirect()->route('test.all');
                } else {
                    return redirect()->route('test.all');
                }
            }
        } else {
            return redirect()->route('test.all');
        }
    }

    public function delete($id)
    {

        $test = Test::where('id', $id)->first();
        if ($test) {
            $test->categories()->detach();
            $test->delete();
            return redirect()->route('test.all');
        } else {
            return redirect()->route('test.all');
        }
    }

}
