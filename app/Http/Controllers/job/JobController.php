<?php

namespace App\Http\Controllers\job;
use App\Http\Controllers\Controller;

use App\job;
use App\apply_job;
use Illuminate\Http\Request;
use App\category;
use App\state;
use App\jobs_type;
use App\company\company;
use App\city;
use App\salary_type;
use App\user;
use App\company\industry;
use Auth;
use Carbon\Carbon;
use App\Mail\Errormail;
use Mail;
use Illuminate\Support\Str;

class JobController extends Controller
{   
    
    public function __construct () {
        $this->middleware('auth')->except(['job_list', 'job_show','autocomplete', 'job_listajax']);
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
   
    public function user_job_post_list(){
      try{
        $state = state::all();
        $category = category::all();
       $jobs= job::with('apply_job')
                ->where('jobs.user_id',Auth::user()->id)->paginate(5);
       $summary = [];
	   //$rahul= $jobs->user->user_email;
	   //dd($rahul);
        foreach($jobs as $job)
        {
            $summary[]=['jobs_id'=>$job->jobs_id, 'jobs_id'=>$job->jobs_id];
        } 

        return view('job.user_job_post_list',compact('state','category','jobs'));
           }catch(\Exception $e)
        {
            //dd($e);
            $to = "info@dradhata.com"; 
           $url= url()->current();
         
           Mail::to($to)->send( new Errormail($url,$e));
           return abort('404');
        }
        
    }
    
    public function autocomplete(Request $request)
    {
        try{
        $data = city::with('state1')
                ->where("city","LIKE","%{$request->query('query')}%")
                ->get();
         
        return response()->json($data);
           }catch(\Exception $e)
        {
            //dd($e);
            $to = "info@dradhata.com"; 
           $url= url()->current();
         
           Mail::to($to)->send( new Errormail($url,$e));
           return abort('404');
        }
        
    }
    
         public function findCityWithStateID($states_id)
    {
        try{
             $city = City::where('state_id',$states_id)
                ->select('jobs.cities_id','jobs.city') 
                ->all();
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
    
    
    public function bookmark()
    {
    try{
       return view('job.bookmark');
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
   

    public function job_post()
    {
       try{
        if(company::where('user_id','=',Auth::user()->id)->exists()){
            
            /**add use off category droupdown manu**/
            $category = category::all();
            $state = state::all();
            $salarytype = salary_type::all();
            $industry = industry::all();
            $jobtype = jobs_type::all();
            return view('job.job_post',compact('category','state','jobtype','salarytype','industry'));   
        }
        
        return redirect(route('company'))->with('alert', 'Please create company profile');
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
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
     public function job_create(Request $request)
    {
//dd($request->industry_id);
        try{ 
         $title1=($request->jobs_title);
         
       $rahul = job::updateOrCreate(['jobs_id' => decrypt($request->jobs_id)],[
            'user_id'=>decrypt($request->user_id),
            'categories_id'=> $request->categories_id, // form 
            'jobs_types_id'=> $request->jobs_types_id,
            'industry_id'=> $request->industry_id,
            'jobs_title'=> $request->jobs_title,
            'description'=> $request->description,
            'states_id'=> $request->state,
            'cities_id'=> $request->city,
            'salary_types_id'=>$request->salary_types_id,
            'minimum_salary'=>$request->minimum_salary,
            'maximum_salary'=>$request->maximum_salary,
            'minimum_experience'=>$request->minimum_experience,
            'maximum_experience'=>$request->maximum_experience,
            'skills'=>$request->skills,
           'slug_titile'=>1 ,
        ]);

       $title = str_slug(($rahul->jobs_id).'_'.$title1, '-'); 
     
       job::updateOrCreate(['jobs_id' => $rahul->jobs_id],[
           'slug_titile'=> $title, // form 
       ]);
//       job::updateOrCreate(['jobs_id' => $rahul],[
//          'slug_titile'=> $title,
//           ]);
        //SkillController::createSkill($request->skills);        
     return  redirect('user_job_post_list')->with('success', 'Data has been added');
       }catch(\Exception $e)
        {
            //dd($e);
            $to = "info@dradhata.com"; 
           $url= url()->current();
         
           Mail::to($to)->send( new Errormail($url,$e));
           return abort('404');
        }
       
        }
        
        public function job_edit($jobs_id){
             try{      
            $job_id = decrypt($jobs_id);
            
         $jobdata = job::where('jobs_id','=',$job_id)->get();
        $category = category::all();
        $state = state::all();
        $salarytype = salary_type::all();
        $jobtype = jobs_type::all();
        $industry = industry::all();
          //dd(industry);
            return view('job.job_edit',compact('category','state','jobtype','jobdata','salarytype','industry'));
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
     * Display the specified resource.
     *
     * @param  \App\job  $jobs_id
     * @return \Illuminate\Http\Response
     */
    public function job_show($jobs_id)
    {
        //dd($jobs_id);
        $jobdetail= job::where('slug_titile','=',$jobs_id)->get();
          //dd($jobdetail);
        foreach($jobdetail as $job){
            
            $date = Carbon::parse($job->created_at);
            $now = Carbon::now();
               $job->days = $date->diffInDays($now);
        }
		
		
//dd($job->jobs_id);
$similar_jobs = job::where('categories_id', '=', $job->categories_id)
			->orwhere('cities_id', '=', $job->cities_id)
			->orwhere('user_id', '=', $job->user_id)
			->whereNotIn('jobs_id',array($job->jobs_id))
			->orderBy('updated_at', 'desc')
                    ->paginate(3);
	//dd($similar_jobs);
	
		
		
          //dd($jobdetail);
       return view('job.job_details',compact('jobdetail','similar_jobs'));
       
       
        }

}
