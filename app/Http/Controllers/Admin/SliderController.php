<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Slider;

class SliderController extends Controller
{
    public function gatAll(){
        $Sliders = Slider::all();
        //$users = User::with('roles')->get();
        return view('admin.slider.all', compact('Sliders'));
    }
    
    public function add(){ 
        return view('admin.slider.create');
    }
    
    public function create(Request $request){ 
        $data = $request->all();  
        $data['thumb']      = $data['thumb'] != null ? $data['thumb'] : "";
        //$data['content']  = $data['content'] != null ? $data['thumb'] : "null";
        //todo::Parvez  Slider link
        $partner = Slider::create([
                    'title'      => $data['title'],
                    'link'      => $data['link'],
                    //'content'   => $data['content'],
                    'thumb'     => $data['thumb']
                ]); 
        return redirect()->route('slider.all');
    }
    
    public function edit($id){
        $Sliders  = Slider::where('id', $id)->get();  
        return view('admin.slider.edit')   
                ->with('Sliders', $Sliders);
    }
    
    public function update(Request $request){ 
        $data = $request->all(); 
        if($data['sliderId']){ 
            $Slider = Slider::find($data['sliderId']); 
            if($Slider){  
                $data['thumb']      = $data['thumb'] != null ? $data['thumb'] : "";
                //$data['content']  = $data['content'] != null ? $data['thumb'] : "null";
                //todo::Parvez  Slider link
                $Slider->title     = $data['title'];
                $Slider->link     = $data['link'];
                //$Slider->content   = $data['content'];
                $Slider->thumb     = $data['thumb'];
                $Slider->save(); 
                if ($Slider){ 
                    return redirect()->route('slider.all');
                }
            }
        }else{
            return redirect()->route('slider.all');
        }
    }
    
    public function delete($id){
        
        $Slider   = Slider::where('id', $id)->first();
        if($Slider){ 
            /*
            $file = str_replace( "/","\/", 'adminStroage/'.$Slider->thumb );
            $filePath = public_path($file);
            unlink($filePath);
             * 
             */
            $Slider->delete();
            return redirect()->route('slider.all');
        }else{
            return redirect()->route('slider.all');
        }
    }
}
