<?php

namespace App\Http\Controllers\Resume;
use App\Http\Controllers\Controller;

use App\education;
use Illuminate\Http\Request;
use Auth;
use Illuminate\Support\Facades\Validator;
use App\Mail\Errormail;
use Mail;
class EducationController extends Controller
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
        return view('resume/education/education');
     }catch(\Exception $e)
        {
            //dd($e);
            $to = "info@dradhata.com"; 
           $url= url()->current();
         
           Mail::to($to)->send( new Errormail($url,$e));
           return abort('404');
        }
        
       }

 
    public function education_show(){
try{
    	$education= education::where('user_id',Auth::user()->id)->get();    
    	return view('resume/education/educationajax',compact('education'));
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
    public function education_create(Request $request)
    {
        try{
        $userId = Auth::User()->id;
        $eduId = $request->education_id;

         $validator = Validator::make($request->all(), [
                'institutename' => 'required', 
                'degree' => 'required',
              'result'=> 'required|numeric',
             'education_start_date' => 'required|date',
               'education_end_date' => 'nullable|date|after:education_start_date',
                'description' => 'required'            
            ]);

        if ($validator->fails()) {
                return response()->json(['message' => $validator->errors()->first(), 'error' => true]);
            } 
            
        education::updateOrCreate(['education_id' => $eduId],['user_id'=>$userId,
            'institutename' => $request->institutename,
            'degree' => $request->degree,
            'result' => $request->result,
            'education_start_date' => $request->education_start_date,
            'education_end_date' => $request->education_end_date,
            'description' => $request->description,
        ]);
        
        if ($request->education_id != null){
              
            return "Education has been successfully updated.";
        } else {

            return "Education has been successfully added.";
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

    
    public function education_edit(Request $request)
    {
        try{   
       $education_id= decrypt($request->education_id);
        $educationdata= education::where([['education.education_id','=',$education_id]])
                ->select('education.*')               
                ->first();
                
       // dd($educationdata);
        return $educationdata;                
}catch(\Exception $e)
        {
            //dd($e);
            $to = "info@dradhata.com"; 
           $url= url()->current();
         
           Mail::to($to)->send( new Errormail($url,$e));
           return abort('404');
        }
        
    }
public function education_delete(Request $request)
    {
   try{
    $education_id= decrypt($request->education_id);
   education::where([['education.education_id','=',$education_id]])->delete();
   return "Education has been successfully Delete.";
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
