<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\ClientSays;
class ClientSaysController extends Controller
{
    public function gatAll(){
        $clientsays = ClientSays::all();
        //$users = User::with('roles')->get();
        return view('admin.clientsays.all', compact('clientsays'));
    }
    
    public function add(){ 
        return view('admin.clientsays.create');
    }
    
    public function create(Request $request){ 
        $data = $request->all();  
        $data['thumb']  = $data['thumb'] != null ? $data['thumb'] : "";
        $clientsays = ClientSays::create([
                    'name'      => $data['name'],
                    'subTitle'  => $data['subTitle'],
                    'message'   => $data['message'],   
                    'thumb'     => $data['thumb']
                ]); 
        return redirect()->route('clientsay.all');
    }
    
    public function edit($id){
        $clientsays  = ClientSays::where('id', $id)->get();  
        return view('admin.clientsays.edit')   
                ->with('clientsays', $clientsays);
    }
    
    public function update(Request $request){ 
        $data = $request->all(); 
        if($data['clientsayId']){ 
            $clientsay = ClientSays::find($data['clientsayId']); 
            if($clientsay){  
                $data['thumb']  = $data['thumb'] != null ? $data['thumb'] : "";
                $clientsay->name     = $data['name'];
                $clientsay->subTitle = $data['subTitle'];
                $clientsay->message  = $data['message'];   
                $clientsay->thumb    = $data['thumb'];
                $clientsay->save(); 
                if ($clientsay){ 
                    return redirect()->route('clientsay.all');
                }
            }
        }else{
            return redirect()->route('clientsay.all');
        }
    }
    
    public function delete($id){
        
        $clientsays   = ClientSays::where('id', $id)->first();
        if($clientsays){ 
            /*
            $file = str_replace( "/","\/", 'adminStroage/'.$clientsays->thumb );
            $filePath = public_path($file);
            unlink($filePath); 
             */
            $clientsays->delete();
            return redirect()->route('clientsay.all');
        }else{
            return redirect()->route('clientsay.all');
        }
    }
}
