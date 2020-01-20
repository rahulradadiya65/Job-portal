<?php 

namespace App\Http\Controllers\Resume;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;
use App\experience;
use Illuminate\Http\Request;
use Auth;
use App\Mail\Errormail;
use Mail;

class ExperienceController extends Controller
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
        return view('resume/experience/experience');
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
    
   
   
    public function experience_show(Request $request){
try{
    	$experience= experience::where('user_id',Auth::user()->id)->get();
        if($request->ajax()){
    return view('resume/experience/experienceajax',compact('experience'));
           }
        
    	return view('resume/experience/experienceajax',compact('experience'));
    }catch(\Exception $e)
        {
            //dd($e);
            $to = "info@dradhata.com"; 
           $url= url()->current();
         
           Mail::to($to)->send( new Errormail($url,$e));
           return abort('404');
        }
        
        }
   
    public function experience_create(Request $request) {
       //dd($request->all());
        try{
        $userId = Auth::User()->id;
        $expId =$request->experiences_id;
        
         $validator = Validator::make($request->all(), [
          'companyname' => 'required', 
          'designation' => 'required',
          'experiences_start_date' => 'required|date',
          'experiences_end_date' => 'nullable|date|after:experiences_start_date',
          'jobdescription' => 'required'            
            ]);
         
            if ($validator->fails()) {
                return response()->json(['message' => $validator->errors()->first(), 'error' => true]);
            }

           
           $experience = experience::updateOrCreate(['experiences_id' => $expId], [
            'user_id'=>$userId,
            'companyname' => $request->companyname,
            'designation' => $request->designation,
            'experiences_start_date' => $request->experiences_start_date,
            'experiences_end_date' => $request->experiences_end_date,
            'jobdescription' => $request->jobdescription]);   
        if($experience){
           if ($request->experiences_id != null) {
            return "Experience has been successfully updated.";
        } else {

            return "Experience has been successfully added.";
        }
            
         }
            return back()->withInput();
           }catch(\Exception $e)
        {
            //dd($e);
            $to = "info@dradhata.com"; 
           $url= url()->current();
         
           Mail::to($to)->send( new Errormail($url,$e));
           return response()->json(['message' => "somting is wrong", 'error' => true]);
        } 
    }
         
  
    public function experience_edit(Request $request)
    {
           try{
       $experiences_id= decrypt($request->experiences_id);
       $experiencedata= experience::where([['experiences.experiences_id','=',$experiences_id]])
                ->select('experiences.*')               
                ->first();
        
       // dd($expreriencedata);
        return $experiencedata;               
}catch(\Exception $e)
        {
            //dd($e);
            $to = "info@dradhata.com"; 
           $url= url()->current();
         
           Mail::to($to)->send( new Errormail($url,$e));
           return abort('404');
        }
    }
    
    public function experience_delete(Request $request)
    {
        try{
   $experiences_id= decrypt($request->experiences_id);
   experience::where([['experiences.experiences_id','=',$experiences_id]])->delete();
   return "Experience has been successfully Delete.";
   
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