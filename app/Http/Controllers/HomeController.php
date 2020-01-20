<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\category;
use App\job;
use App\Mail\Errormail;
use Mail;
class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth')->except(['index']);
    }
    
        
    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        try{
        $jobs= job::get()->count();
            $category = category::with('category')->get();
       
         $summary = [];
        foreach($category as $category1)
        {
            $summary[]=['catagories_id'=>$category1->catagories_id, 'catagories_id'=>$category1->catagories_id];
        }
        
        return view('rahul',compact('category','jobs'));
        
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
