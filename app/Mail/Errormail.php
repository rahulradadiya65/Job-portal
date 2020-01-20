<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class Errormail extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public $url;
    public $e;
    
    public function __construct($url,$e)
    {
       $this->url = $url;
       $this->e = $e;
       
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        $e_subject = "error email";
        $e_url = $this->url;
        $e_e = $this->e;

        return $this->view('errormail',compact('e_url','e_e'))->subject($e_subject);
    }
}
