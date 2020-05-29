<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Config;
use App\Location;
use App\State;
use DB;
use Session;

class MasterController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function stateList(Request $request)
    {
        // $location = Location::select('id','location','state','pincode','district','status')->groupBy('state')->paginate(15);
        $location = DB::table('locations')
                 ->select('state','status')
                 ->distinct('state')
                 ->paginate(20);
                 //dd($location);
        return view('Master.stateList',array('location'=>$location));    
        
    }



    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function distictList(Request $request,$state_name)
    {
        $state_name= ucwords(str_replace("_"," ",$state_name));
        $location = Location::select('id','location','state','pincode','district','status')
        ->where('state','=',$state_name)
        ->distinct('district')
        ->paginate(15);
        
        return view('Master.distictList',array('location'=>$location,'state_name'=>$state_name));    
        
    }



    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function addnewlocation(Request $request,$state_name)
    {
        $state_name= ucwords(str_replace("_"," ",$state_name));
        $district = Location::select('district')
        ->where('state','=',$state_name)
        ->groupBy('district')
        ->get();
        return view('Master.addnewlocation',array('district'=>$district,'state_name'=>$state_name));    
        
    }


     /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function editlocation(Request $request,$id)
    {
        $location = Location::select('*')
        ->where('id','=',$id)
        ->first();
       // dd($location);

        $state_name= $location['state'];
        $district = Location::select('district')
        ->where('state','=',$state_name)
        ->groupBy('district')
        ->get();

        return view('Master.editlocation',array(
            'location'=>$location,
            'district'=>$district,
        ));    
        
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function savelocation(Request $request)
    {
        $stateName      = $request->get('state');
        $districtName   = $request->get('district');
        $locationName   = $request->get('title');
        $pincode        = $request->get('pincode');
        $status         = $request->get('status');
        $id             = $request->get('id');

        if($id!=''){
            $location = Location::find($id);
            $location->location = $locationName;
            $location->district = $districtName;
            $location->state = $stateName;
            $location->pincode = $pincode;
            $location->status = $status;

        }else{
            $location  = new Location();
            $location->location = $locationName;
            $location->district = $districtName;
            $location->state = $stateName;
            $location->pincode = $pincode;
            $location->status = $status;
        }
        $state_name = str_replace(' ','_',$stateName);
        if($location->save()){
            
            Session::flash('message', 'Location Updated successfully!');
            // return redirect()->route('allmenu');
            return redirect('distict/'.$stateName);
        }else{
            Session::flash('message', 'Location Not Updated successfully!');
            return redirect('addnewlocation/'.$stateName);
        }
    }



    /***Update Location On Model Box********/
    public function updateLocation(Request $request,$id){
        $location = Location::find($id);
        //dd($location);
        $stateObj = new State();
        $state= $stateObj->getAllState();
        return view('Master.updateState',array('location'=>$location,'stateList'=>$state));    
    }



    /***Update Location On Model Box********/
    public function getDistrict(Request $request,$state){
        $state = ucwords(strtolower(str_replace("-"," ",$state)));
        $district = Location::select('district')->where('state','=',$state)->groupBy('district')->get()->toArray();
        $str= "<option>Choose District</option>";
        if(!empty($district)){
            foreach($district as $dis){
                $str.= "<option value=".str_slug($dis['district']).">".$dis['district']."</option>";
            }     
        }
        return $str;
    }








    /***Update Location On Model Box********/
    public function getLocation(Request $request,$state,$district){
        $state = ucwords(strtolower(str_replace("-"," ",$state)));
        $district = ucwords(strtolower(str_replace("-"," ",$district)));
        $location = Location::where('state','=',$state)->where('district','=',$district)->get()->toArray();
        $str= "<option value='-1'>Choose Location</option>";
        if(!empty($location)){
            foreach($location as $dis){
                $str.= "<option value=".str_slug($dis['location']).'|'.$dis['pincode'].'|'.$dis['id'].">".$dis['location']."</option>";
            }     
        }
        return $str;
    }




    public function blank(Request $request){
        return view('blank');
    }
}
