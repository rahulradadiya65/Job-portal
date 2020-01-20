<?php

namespace App\Http\Controllers;

use App\state;
use Illuminate\Http\Request;
use App\city;
use App\Mail\Errormail;
use Mail;

class StateController extends Controller
{
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
   public function location(Request $request)
    {
      /**add use off category droupdown manu**/
       try{ 
       $state = state::all();
//        return view('job.jobpost',['category'=>$category],['state'=>$state],['jobtype'=>$jobtype]);
        return view('location', compact('state'));
    }catch(\Exception $e)
        {
            //dd($e);
            $to = "info@dradhata.com"; 
           $url= url()->current();
         
           Mail::to($to)->send( new Errormail($url,$e));
           return abort('404');
        }
        
    }
    
     public function findCityWithStateID(Request $request)
    {  
         try{
         $city = city::where('state_id','=',$request->state_id)->get();
        return response()->json($city);
    }catch(\Exception $e)
        {
            //dd($e);
            $to = "info@dradhata.com"; 
           $url= url()->current();
         
           Mail::to($to)->send( new Errormail($url,$e));
           return abort('404');
        }
        
    }

    
}
