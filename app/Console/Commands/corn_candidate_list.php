<?php

namespace App\Console\Commands;
use App\Mail\candidate_list;
use Mail;
use Illuminate\Console\Command;
use App\user;
use App\job;
use App\apply_job;
use Carbon\Carbon;
use App\category;
use App\state;

class corn_candidate_list extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'candidate:list';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }
    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle()
    {
		
   $users = user::get();  

   foreach($users as $user)
   {
	  
       $job = job::where('jobs.user_id',$user->id)->get();
       $to = $user->email;
		$totale_apply_candidate = 0;
		foreach($job as $jobs)
        {
			Carbon::setWeekStartsAt(Carbon::SUNDAY);
		//dd($job->jobs_id);
			$apply = apply_job::where('apply_jobs.jobs_id',$jobs->jobs_id)
			->whereBetween('apply_jobs.created_at', [Carbon::now()->startOfWeek(),Carbon::now()->endOfWeek()])->get();
			
			$totale_apply_candidate += $apply->count();
		
		}
		//for mail detail
	$state = state::all();
        $category = category::all();
       $job_list= job::with('apply_job')
                ->where('jobs.user_id',$user->id)->paginate(5);
       $summary = [];
	   
        foreach($job_list as $job1)
        {
            $summary[]=['jobs_id'=>$job1->jobs_id, 'jobs_id'=>$job1->jobs_id];
        }
		
		 $mytime= Carbon::now();
		//dd($mytime);
		
		//dd($summary);
		if($totale_apply_candidate > 0){
		Mail::to($to)->send( new candidate_list($job_list,$totale_apply_candidate,$user,$summary,$mytime));
		}   
   }
		
		
		
    }
}
