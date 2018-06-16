<?php

namespace App\Http\Controllers\Admin;

use Validator;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller; 
use App\ServiceArea;
class ServiceAreaController extends Controller
{
    public function gatAll(){
        $serviceAreas = ServiceArea::all();
        //$users = User::with('roles')->get();
        return view('admin.service.area', compact('serviceAreas'));
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
            $ServiceArea = ServiceArea::create([
                        'name'      => $data['name'], 
                    ]); 
            return redirect()->route('serviceArea.all');
        } 
    }
    
    public function edit($id){
        $serviceAreas   = ServiceArea::where('id', $id)->get();   
        return view('admin.service.area') 
                ->with('serviceAreas', $serviceAreas);
    }
    
    public function update(Request $request){ 
        
        $validator = Validator::make($request->all(), [
            'name' => 'required|max:190', 
            'ServiceAreaID' => 'required|numeric', 
        ]);

        if ($validator->fails()) {
            return redirect()
                        ->route('serviceArea.all')
                        ->withErrors($validator)
                        ->withInput();
        }else{
            $data = $request->all(); 
            $cat = ServiceArea::find($data['ServiceAreaID']); 
            if($cat){
                $cat->name = $data['name'];
                $cat->save();
                return redirect()->route('serviceArea.all');
            }  
        } 
    }
    
    public function delete($id){ 
        $ServiceArea   = ServiceArea::where('id', $id)->first();
        if($ServiceArea){ 
            $ServiceArea->delete();
            return redirect()->route('serviceArea.all');
        }else{
            return redirect()->route('serviceArea.all');
        }
    }
    
}
