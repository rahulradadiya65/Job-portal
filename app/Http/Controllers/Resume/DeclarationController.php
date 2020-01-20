<?php

namespace App\Http\Controllers\Resume;
use App\Http\Controllers\Controller;

use App\resume\Declaration;
use Illuminate\Http\Request;
use Auth;
use App\Mail\Errormail;
use Mail;
use Illuminate\Support\Facades\Validator;

class DeclarationController extends Controller
{
       public function __construct () {
        $this->middleware('auth');
   }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
       try{
        return view('resume/declaration/declaration');
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
    
    public function declaration_show(){
try{
    	$declaration_data= declaration::where('user_id',Auth::user()->id)->get();

    	return view('resume/declaration/declaration_show',compact('declaration_data'));
    }catch(\Exception $e)
        {
            //dd($e);
            $to = "info@dradhata.com"; 
           $url= url()->current();
         
           Mail::to($to)->send( new Errormail($url,$e));
           return abort('404');
        }
        
    }
    
    public function declaration_create(Request $request)
    {
        try{
            $validator = Validator::make($request->all(), [ 
           'declaration' => 'required',
              ]);
         
            if ($validator->fails()) {
                return response()->json(['message' => $validator->errors()->first(), 'error' => true]);
            }
         
           
        declaration::updateOrCreate(['user_id'=>Auth::user()->id],[
            'declaration' => $request->declaration,]);

        if ($request->declaration_id != null) {

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
public function declaration_edit (Request $request)
    {
      try{
          $userId = Auth::User()->id;
        $declaration_data= declaration::where([['declarations.user_id','=',$userId]])
                ->select('declarations.*')               
                ->first();
               //dd($declaration_data);
        return $declaration_data;
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
