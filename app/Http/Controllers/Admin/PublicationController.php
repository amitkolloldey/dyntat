<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Publication;

class PublicationController extends Controller
{
    public function gatAll(){
        $Publications = Publication::all();
        return view('admin.publication.all', compact('Publications'));
    }
    
    public function add(){ 
        return view('admin.publication.create');
    }
    
    public function create(Request $request){ 
        $data = $request->all();  
        //$data['thumb']  = $data['thumb'] != null ? $data['thumb'] : "";
        $newData = $this->bookFilter($data);
        $link = $this->clean($data['name']);
        if($newData !== false){
            $Publication = Publication::create([
                        'name'      => $data['name'],
                        'link'      => strtolower($link),
                        'date'      => $data['date'],
                        //'meta_description'      => $data['meta_description'],
                        'thumb'     => $data['thumb'],
                        'book'      => json_encode($newData)
                    ]); 
            if($Publication){
                return redirect()->route('publication.all');
            }
        } 
    }
    
    public function edit($id){
        $Publications  = Publication::where('id', $id)->get();  
        return view('admin.publication.edit')   
                ->with('Publications', $Publications);
    }
    
    public function update(Request $request){ 
        $data = $request->all(); 
        if($data['publicationId']){
            $link = $this->clean($data['name']);
            $Publication = Publication::find($data['publicationId']); 
            $newData = $this->bookFilter($data);
            if($newData !== false){  
                //$data['thumb']  = $data['thumb'] != null ? $data['thumb'] : "";
                $Publication->name     = $data['name'];
                $Publication->link     = strtolower($link);
                $Publication->date     = $data['date'];
                //$Publication->meta_description     = $data['meta_description'];
                $Publication->thumb    = $data['thumb'];
                $Publication->book     = json_encode($newData);
                $Publication->save(); 
                if ($Publication){ 
                    return redirect()->route('publication.all');
                }
            }
        }else{
            return redirect()->route('publication.all');
        }
    }
    
    public function delete($id){
        
        $Publication   = Publication::where('id', $id)->first();
        if($Publication){ 
            /*
            $file = str_replace( "/","\/", 'adminStroage/'.$Publication->thumb );
            $filePath = public_path($file);
            unlink($filePath);
            if($book = json_decode($Publication->book)){ 
                foreach ($book as $page){
                    if($page->pageImage != ""){
                        $pageImg = str_replace( "/","\/", 'adminStroage/'.$page->pageImage );
                        $pageImgPath = public_path($pageImg);
                        unlink($pageImgPath);
                    }
                }
            }*/
            $Publication->delete();
            return redirect()->route('publication.all');
        }else{
            return redirect()->route('publication.all');
        }
    }
    
    private function bookFilter($data){
        $newData = array();
        if(isset($data['pageName']) && isset($data['pageImage'])){
            for($i=0; $i< count($data['pageName']); $i++){
                if(($data['pageName'][$i] != "") && ($data['pageImage'][$i] != "")){
                    $newData[]=array(
                            'pageName'  => $data['pageName'][$i], 
                            'pageImage' => $data['pageImage'][$i]
                        );
                } 
            }
            return $newData;
        }else{
            return false;
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
