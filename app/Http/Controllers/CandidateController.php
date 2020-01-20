<?php

namespace App\Http\Controllers;

use App\candidate;
use App\apply_job;
use Illuminate\Http\Request;
use App\state;
use App\Mail\Errormail;
use Mail;
class CandidateController extends Controller
{


    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function candidate_apply_detail($jobs_id)
    {
          
        try{
        $job_id = decrypt($jobs_id);
           $candidate= apply_job::where('apply_jobs.jobs_id',$job_id)   
                ->get();
       //dd($candidate);     
        return view('candidate.candidate_apply_detail',compact('candidate'));
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
