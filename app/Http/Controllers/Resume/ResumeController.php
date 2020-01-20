<?php

namespace App\Http\Controllers\Resume;
use App\Http\Controllers\Controller;

use App\resume;
use App\job;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;
use App\experience;
use App\Languages_names;
use App\user;
use Illuminate\Validation\Rule;
use App\Mail\Errormail;
use Mail;
use Auth;

class ResumeController extends Controller
{
    
     public function __construct () {
        $this->middleware('auth');
     }

     public function index()
    {
     try{
//       $user_id=Auth::user()->id;
        $language_name = Languages_names::all();
        $experience= experience::where('user_id',Auth::user()->id)->get();
        return view ('resume.resume',compact('experience','language_name'));
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
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function viewresume()
    {
       try{
        $language_name = languages_names::all();
       $jobpostcount = Job::where('user_id',Auth::user()->id)->get()->count(); //use for count
        return view('resume.userprofile', compact('jobpostcount','language_name'));
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

  public function Profile_detail_update(Request $request)
    {
try{
        $user_id=Auth::user()->id;        
        $validator = Validator::make($request->all(), [ 
             'name' => 'required|string|max:255',
            'email' => ['required','email', 
                Rule::unique('users','email')->ignore($user_id)],//Rule:unique('tabel name','column name')
            'mobile_number' => ['required','numeric','digits:10',
                Rule::unique('users','mobile_number')->ignore($user_id),],
            ]);
         
            if ($validator->fails()) {
                return response()->json(['message' => $validator->errors()->first(), 'error' => true]);
            }
        
        user::where([['id','=',$user_id]])->update ([
                'name'=> $request->name, // form 
                'email'=> $request->email,
                'mobile_number'=> $request->mobile_number,
            ]); 
        $user_data= user::where([['users.id','=',$user_id]])
                ->select('users.*')               
                ->first();
        //dd($user_data);
        return view ('resume.profile_update.profile_edit', compact('user_data'))->with("message","data has been successfully updated.");
            }catch(\Exception $e)
        {
            //dd($e);
            $to = "info@dradhata.com"; 
           $url= url()->current();
         
           Mail::to($to)->send( new Errormail($url,$e));
           return response()->json(['message' => "somting is wrong", 'error' => true]);
        }
        
            }
    
     public function password_update(Request $request)
    {
try{
        $user_id=Auth::user()->id;
        $old_password -> Hash::make($data['old_password']);
        
        $validator = Validator::make($request->all(), [ 
             'old_password' => Auth::user()->password,
            'new_password' =>'confirmed_password|different:old_password',
            ]);
         
            if ($validator->fails()) {
                return response()->json(['message' => $validator->errors()->first(), 'error' => true]);
            }
        
        user::where([['id','=',$user_id]])->update ([
                'password'=> $request->new_password, // form 
            ]); 
        $user_data= user::where([['users.id','=',$user_id]])
                ->select('users.*')               
                ->first();
        //dd($user_data);
        return view ('resume.profile_update.profile_edit', compact('user_data'));
            }catch(\Exception $e)
        {
            //dd($e);
            $to = "info@dradhata.com"; 
           $url= url()->current();
         
           Mail::to($to)->send( new Errormail($url,$e));
           return response()->json(['message' => "somting is wrong", 'error' => true]);
        }
        
            }
    
    
    
    public function updateprofile()
    {
        try{
//        $user_id=Auth::user()->id;
        $user_id=Auth::user()->id;
        $user_data= user::where([['users.id','=',$user_id]])
                ->select('users.*')               
                ->first();
        //dd($user_data);
        return view ('resume.profile_update.profile_update', compact('user_data'));
            }catch(\Exception $e)
        {
            //dd($e);
            $to = "info@dradhata.com"; 
           $url= url()->current();
         
           Mail::to($to)->send( new Errormail($url,$e));
           return response()->json(['message' => "somting is wrong", 'error' => true]);
        }
        
    }
    
    public function createprofile()
    {
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
     * @param  \App\resume  $resume
     * @return \Illuminate\Http\Response
     */
    public function show(resume $resume)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\resume  $resume
     * @return \Illuminate\Http\Response
     */
    public function edit(resume $resume)
    {
        return view('resume.edit-resume');
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\resume  $resume
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, resume $resume)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\resume  $resume
     * @return \Illuminate\Http\Response
     */
    public function destroy(resume $resume)
    {
        //
    }
    
     public function deleteaccount()
    {
        try{
         return view('resume.deleteaccount');
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
