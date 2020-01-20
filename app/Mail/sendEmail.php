<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class sendEmail extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public $subject;
    public $message;
    public $mobile_number;
    public $email;
    
    
    public function __construct($name,$message,$mobile_number,$email)
    {
       $this->subject = $name;
       $this->message = $message;
       $this->mobile_number = $mobile_number;
       $this->email = $email;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        $e_subject = $this->subject;
        $e_message = $this->message;
        $e_mobile_number = $this->mobile_number;
        $e_email = $this->email;
        
        return $this->view('sendmail',compact('e_message','e_mobile_number','e_email'))->subject($e_subject);
       
        
    }
}
