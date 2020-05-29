<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Config;
use App\Page;
use App\Menu;
use Session;
use Storage;
use Image;
use App\Setting;

class SettingController extends Controller
{
    

    public function __construct() {
       
    }

    public function setting(Request $request){
        $setting = Setting::all();
        return view('Setting.Setting',compact('setting'));
    }


    public function saveSetting(Request $request){
        $data = $request->all();
        foreach($data as $key=>$value){

            if($key=='_token'){ continue;}
            if($key=='id'){ continue;}
            $setting = Setting::where('type','=',$key)->first();
            $setting->value = $value;
            $setting->save();
        }
        Session::flash('message', 'Setting updated successfully!');
        return redirect()->route('setting');
    }


}
