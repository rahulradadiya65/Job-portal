<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class candidate_list extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * Create a new message instance.
     *
     * @return void
     */
	public $job_list;
	public $totale_apply_candidate;
	public $user;
	public $mytime;
    
	public function __construct($job_list,$totale_apply_candidate,$user,$mytime)
    {
		
        $this->job_list =$job_list;
		$this->totale_apply_candidate =$totale_apply_candidate;
		$this->user =$user;
		$this->mytime =$mytime;
    
	}

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
       $subject = $this->totale_apply_candidate." "."new Resume waiting for your review"; 
	   $jobs = $this->job_list;
	   $user = $this->user;
	   $mytime1 = $this->mytime;
	   $summary1 = $this->totale_apply_candidate;
	   //dd($mytime1);
		return $this->view('apply_candidate_list',compact('jobs','user','summary1','mytime'))->subject($subject);
    }
}
