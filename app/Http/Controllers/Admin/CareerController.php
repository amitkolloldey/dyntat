<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Validator;
use App\Career;
class CareerController extends Controller
{
    public function gatAll(){
        $Careers = Career::all();
        //$users = User::with('roles')->get();
        return view('admin.career.all', compact('Careers'));
    }
    
    public function add(){ 
        return view('admin.career.create');
    }
    
    public function create(Request $request){ 
        $validator = Validator::make($request->all(), [
            'title'    => 'required|max:190', 
            'email'    => 'required|max:190', 
            'endDate'  => 'required|max:190'   
        ]);
        if ($validator->fails()) { 
            return redirect()
                        ->route('career.create')
                        ->withErrors($validator)
                        ->withInput(); 
        }else{
            $data = $request->all(); 
            $Career = Career::create([ 
                'title'    => $data['title'],  
                'email'    => $data['email'], 
                'endDate'  => $data['endDate'],  
                'content'  => $data['content']   
            ]);
            if($Career){
                return redirect()->route('career.all');
            }
        } 
        return redirect()->route('career.all');
    }
    
    public function edit($id){
        $Careers  = Career::where('id', $id)->get();  
        return view('admin.career.edit')   
                ->with('Careers', $Careers);
    }
    
    public function update(Request $request){ 
        $data = $request->all(); 
        if($data['careerId']){
            $validator = Validator::make($request->all(), [
                'careerId' => 'required',   
                'title'    => 'required|max:190', 
                'email'    => 'required|max:190', 
                'endDate'  => 'required|max:190'   
            ]);
            if ($validator->fails()) { 
                return redirect()
                            ->route('career.all')
                            ->withErrors($validator)
                            ->withInput(); 
            }else{
                $Career = Career::find($data['careerId']); 
                if($Career){   
                    $Career->title     = $data['title'];   
                    $Career->email     = $data['email'];
                    $Career->endDate   = $data['endDate'];
                    $Career->content   = $data['content'];
                    $Career->save(); 
                    if ($Career){ 
                        return redirect()->route('career.all');
                    }
                }
            }
        }else{
            return redirect()->route('career.all');
        }
    }
    
    public function delete($id){ 
        $Career   = Career::where('id', $id)->first();
        if($Career){  
            $Career->delete();
            return redirect()->route('career.all');
        }else{
            return redirect()->route('career.all');
        }
    }
}
