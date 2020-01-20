<?php

namespace App\Http\Controllers;

use App\apply_job;
use App\jobs;
use Auth;
use Illuminate\Http\Request;
use App\Mail\Errormail;
use Mail;

class ApplyjobController extends Controller
{
       public function __construct () {
        $this->middleware('auth');
    }
    
    private function _saveJobIdToSesstion()
    {
        if(!Auth::User())
        {
            
        }
    }
    
   
    public function apply($jobs_id)
    {
     try{   
       //dd($request->all());
        $jobid= decrypt($jobs_id);
//        dd($jobid);
       $userid= Auth::User()->id;
      
       $rahul = apply_job::updateOrCreate ([
           'jobs_id'=> $jobid, 
           'apply_user_id'=> $userid,   
       ]);
       
      
       return  redirect('job_list')->with('success', 'Data has been added');
   }catch(\Exception $e)
        {
            //dd($e);
            $to = "info@dradhata.com"; 
           $url= url()->current();
           Mail::to($to)->send( new Errormail($url,$e));
           return abort('404');
        }
       
       
    }
 /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function appliedjob ()
    {
try{
        $appliedjob= apply_job::where('apply_user_id',Auth::user()->id)->get();
        
        return view ('job.job_applied',compact('appliedjob'));
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
