<?php

namespace App\Http\Controllers;

use App\contact_us;
use Illuminate\Http\Request;
use Mail;
use App\Mail\sendEmail;
use Session;
use App\Mail\Errormail;

class ContactUsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        try{
        return view('contact_us');
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
    public function contact_us_mail(Request $request)
    {
               try{ 
        $name= $request->name;
        $email= $request->email;
        $mobile_number= $request->mobile_number;
        $message= $request->message;
        $to= "info@dradhata.com"; 
       
        Mail::to($to)->send( new sendEmail($name,$mobile_number,$message,$email));
        Session::flash("success");
        return back();      
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
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\contact_us  $contact_us
     * @return \Illuminate\Http\Response
     */
    public function show(contact_us $contact_us)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\contact_us  $contact_us
     * @return \Illuminate\Http\Response
     */
    public function edit(contact_us $contact_us)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\contact_us  $contact_us
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, contact_us $contact_us)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\contact_us  $contact_us
     * @return \Illuminate\Http\Response
     */
    public function destroy(contact_us $contact_us)
    {
        //
    }
}
