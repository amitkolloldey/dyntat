<?php

namespace App\Http\Controllers\Admin;


use Validator;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\ServiceArea;
use App\ServiceClient;

class ServiceClientController extends Controller
{
    public function gatAll(){
        $ServiceClients = ServiceClient::all();
        $ServiceAreas = ServiceArea::all();
        //$users = User::with('roles')->get();
        return view('admin.service.client')
                    ->with('ServiceClients', $ServiceClients)
                    ->with('ServiceAreas', $ServiceAreas);
    }
    
    public function create(Request $request){ 
        
        $validator = Validator::make($request->all(), [
            'name'              => 'required|max:190', 
            'serviceAreas_id'   => 'required|numeric'
        ]);

        if ($validator->fails()) {
            return redirect()
                        ->route('serviceClient.all')
                        ->withErrors($validator)
                        ->withInput();
        }else{
            $data = $request->all(); 
            //var_dump($data); 
            $ServiceClients = ServiceClient::create([
                        'serviceAreas_id'   => $data['serviceAreas_id'], 
                        'name'              => $data['name'], 
                    ]);
            return redirect()->route('serviceClient.all');
        } 
    }
    
    public function edit($id){
        $ServiceClients   = ServiceClient::where('id', $id)->get();
        $ServiceAreas = ServiceArea::all();
        return view('admin.service.client') 
                ->with('ServiceClients', $ServiceClients)
                ->with('ServiceAreas', $ServiceAreas);
    }
    
    public function update(Request $request){ 
        
        $validator = Validator::make($request->all(), [
            'ServiceClientID'   => 'required|numeric',
            'serviceAreas_id'   => 'required|numeric',
            'name'              => 'required|max:190'  
        ]);

        if ($validator->fails()) {
            return redirect()
                        ->route('serviceClient.all')
                        ->withErrors($validator)
                        ->withInput();
        }else{
            $data = $request->all(); 
            $ServiceClients = ServiceClient::find($data['ServiceClientID']);  
            if($ServiceClients){ 
                $ServiceClients->serviceAreas_id   = $data['serviceAreas_id'];
                $ServiceClients->name              = $data['name'];
                $ServiceClients->save();
                return redirect()->route('serviceClient.all');
            }  
        } 
    }
    
    public function delete($id){ 
        $ServiceClients   = ServiceClient::where('id', $id)->first();
        if($ServiceClients){ 
            $ServiceClients->delete();
            return redirect()->route('serviceClient.all');
        }else{
            return redirect()->route('serviceClient.all');
        }
    }
    
}
