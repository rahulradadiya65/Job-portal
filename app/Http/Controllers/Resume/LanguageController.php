<?php

namespace App\Http\Controllers\resume;
use App\Http\Controllers\Controller;

use App\resume\language;
use App\languages_names;
use Illuminate\Http\Request;
use Auth;
use App\Mail\Errormail;
use Mail;

class LanguageController extends Controller
{
    public function __construct() {
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
        $language_name = languages_names::all();
        return view('resume/language/language', compact('language_name'));
    }catch(\Exception $e)
        {
            //dd($e);
            $to = "info@dradhata.com"; 
           $url= url()->current();
         
           Mail::to($to)->send( new Errormail($url,$e));
           return abort('404');
        }
        
        
    }

    public function language_show(){
        try{
        $language= language::where('user_id',Auth::user()->id)
                ->leftjoin('languages_names','languages.languages_names_id','=','languages_names.languages_names_id')
                ->get();
    	return view('resume/language/show_language',compact('language'));
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
    public function language_create (Request $request)
    {
        try{
        $userId = Auth::User()->id;
        $languageId = $request->language_id;

        language::updateOrCreate([
            'user_id' => $userId,
            'languages_names_id' => decrypt($request->languages_names_id),]);

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

    public function language_delete(Request $request)
    {
        try{
   $languages_id= decrypt($request->languages_id);
   language::where([['languages.languages_id','=',$languages_id]])->delete();
   return "languages has been successfully Delete.";
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
