<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Setting;

class SettingController extends Controller
{
    public function show(){
        $SettingsObg = Setting::getData();
        $allSettings = $this->getSettingsArray($SettingsObg);
        return view('admin.settings.settings')
                    ->with('allSettings', $allSettings);
    }

    public function update(Request $request){
        $data = $request->all();
        foreach ($data as $key => $value){
            $singleData = Setting::where('key', $key)->get(); 
            if($singleData){
                $singleData->value = $value;
                $singleData->save();
            }
        }
    }
    
    private function getSettingsArray($SettingsObg){
        $data = array();
        foreach ($SettingsObg as $key  ){
            //$data['siteLogo'] = $key->siteLogo;
            $data[$key->key] = $key->value;
        }
        return (object)$data;
    }
}
