<?php

namespace App\Http\Controllers\Admin;
use Validator;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Category;
use App\User;
use App\Test;

class CategoryController extends Controller
{
    public function gatAll(){
        $cats = Category::all();
        //$users = User::with('roles')->get();
        return view('admin.test.cat', compact('cats'));
    }
    
    public function create(Request $request){ 
        
        $validator = Validator::make($request->all(), [
            'name' => 'required|max:190', 
        ]);

        if ($validator->fails()) {
            return redirect()
                        ->route('cats.all')
                        ->withErrors($validator)
                        ->withInput();
        }else{
            $data = $request->all(); 
            //var_dump($data); 
            $user = Category::create([
                        'name'      => $data['name'], 
                    ]); 
            return redirect()->route('cats.all');
        } 
    }
    
    public function edit($id){
        $cats   = Category::where('id', $id)->get();   
        return view('admin.test.cat') 
                ->with('cats', $cats);
    }
    
    public function update(Request $request){ 
        
        $validator = Validator::make($request->all(), [
            'name' => 'required|max:190', 
            'catName' => 'required|numeric', 
        ]);

        if ($validator->fails()) {
            return redirect()
                        ->route('cats.all')
                        ->withErrors($validator)
                        ->withInput();
        }else{
            $data = $request->all(); 
            $cat = Category::find($data['catName']); 
            if($cat){
                $cat->name = $data['name'];
                $cat->save();
                return redirect()->route('cats.all');
            }  
        } 
    }
    
    public function delete($id){ 
        $cat   = Category::where('id', $id)->first();
        if($cat){ 
            $cat->delete();
            return redirect()->route('cats.all');
        }else{
            return redirect()->route('cats.all');
        }
    }
    
    
}
