<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Media;

class MediaController extends Controller
{
    public function gatAll(){
        $Medias = Media::all(); 
        return view('admin.media.all', compact('Medias'));
    }
    
    public function add(){ 
        return view('admin.media.create');
    }
    
    public function create(Request $request){ 
        $data = $request->all();   
        //$data['content']  = $data['content'] != null ? $data['thumb'] : "null";
        $Media = Media::create([
                    'title'      => $data['title'],
                    //'content'   => $data['content'],   
                    'url'     => $data['url']
                ]); 
        return redirect()->route('media.all');
    }
    
    public function edit($id){
        $Medias  = Media::where('id', $id)->get();  
        return view('admin.media.edit')   
                ->with('Medias', $Medias);
    }
    
    public function update(Request $request){ 
        $data = $request->all(); 
        if($data['mediaId']){ 
            $Media = Media::find($data['mediaId']); 
            if($Media){   
                //$data['content']  = $data['content'] != null ? $data['thumb'] : "null";
                $Media->title     = $data['title'];
                //$Slider->content   = $data['content'];   
                $Media->url     = $data['url'];
                $Media->save(); 
                if ($Media){ 
                    return redirect()->route('media.all');
                }
            }
        }else{
            return redirect()->route('media.all');
        }
    }
    
    public function delete($id){
        
        $Media   = Media::where('id', $id)->first();
        if($Media){  
            $Media->delete();
            return redirect()->route('media.all');
        }else{
            return redirect()->route('media.all');
        }
    }
}
