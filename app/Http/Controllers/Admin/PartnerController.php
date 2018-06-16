<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Partner;
class PartnerController extends Controller
{
    public function gatAll(){
        $partners = Partner::all();
        //$users = User::with('roles')->get();
        return view('admin.partner.all', compact('partners'));
    }
    
    public function add(){ 
        return view('admin.partner.create');
    }
    
    public function create(Request $request){ 
        $data = $request->all();  
        $data['thumb']  = $data['thumb'] != null ? $data['thumb'] : "";
        $partner = Partner::create([
                    'name'      => $data['name'],
                    'message'   => $data['message'],   
                    'thumb'     => $data['thumb']
                ]); 
        return redirect()->route('partner.all');
    }
    
    public function edit($id){
        $partners  = Partner::where('id', $id)->get();  
        return view('admin.partner.edit')   
                ->with('partners', $partners);
    }
    
    public function update(Request $request){ 
        $data = $request->all(); 
        if($data['partnerId']){ 
            $partner = Partner::find($data['partnerId']); 
            if($partner){  
                $data['thumb']  = $data['thumb'] != null ? $data['thumb'] : "";
                $partner->name     = $data['name'];
                $partner->message  = $data['message'];   
                $partner->thumb    = $data['thumb'];
                $partner->save(); 
                if ($partner){ 
                    return redirect()->route('partner.all');
                }
            }
        }else{
            return redirect()->route('partner.all');
        }
    }
    
    public function delete($id){
        
        $partner   = Partner::where('id', $id)->first();
        if($partner){ 
            /*
            $file = str_replace( "/","\/", 'adminStroage/'.$partner->thumb );
            $filePath = public_path($file);
            unlink($filePath);
             * 
             */
            $partner->delete();
            return redirect()->route('partner.all');
        }else{
            return redirect()->route('partner.all');
        }
    }
}
