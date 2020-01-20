<?php

namespace App\Http\Controllers\resume;
use App\Http\Controllers\Controller;

use App\resume\career_objective;
use Illuminate\Http\Request;
use Auth;
use App\Mail\Errormail;
use Mail;
use Illuminate\Support\Facades\Validator;
class CareerObjectiveController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        try{
            return view('resume/career_objective/career_objective');
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
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function career_objective_show(){

    	try{
        $career_objective_data= career_objective::where('user_id',Auth::user()->id)->get();

    	return view('resume/career_objective/career_objective_show',compact('career_objective_data'));
    }catch(\Exception $e)
        {
            //dd($e);
            $to = "info@dradhata.com"; 
           $url= url()->current();
         
           Mail::to($to)->send( new Errormail($url,$e));
           return abort('404');
        }
        
    }
public function career_objective_create(Request $request)
    {
         try{
            $validator = Validator::make($request->all(), [ 
           'career_objectives' => 'required',
              ]);
         
            if ($validator->fails()) {
                return response()->json(['message' => $validator->errors()->first(), 'error' => true]);
            }
             
        career_objective::updateOrCreate(['user_id'=>Auth::user()->id],[
            'career_objectives' => $request->career_objectives,]);

        if ($request->career_objectives_id != null) {

            return "Data has been successfully updated.";
        } else {

            return "Data has been successfully added.";
        }
        
        }catch(\Exception $e)
        {
            //dd($e);
            $to = "info@dradhata.com"; 
           $url= url()->current();
         
           Mail::to($to)->send( new Errormail($url,$e));
           return response()->json(['message' => "somting is wrong", 'error' => true]);
        }
    }
public function career_objective_edit (Request $request)
    {
    try{
      $userId = Auth::User()->id;
        $career_objective_data= career_objective::where([['career_objectives.user_id','=',$userId]])
                ->select('career_objectives.*')               
                ->first();
               //dd($declaration_data);
        return $career_objective_data;
        }catch(\Exception $e)
        {
            //dd($e);
            $to = "info@dradhata.com"; 
           $url= url()->current();
         
           Mail::to($to)->send( new Errormail($url,$e));
           return response()->json(['message' => "somting is wrong", 'error' => true]);
        }
    }
}
