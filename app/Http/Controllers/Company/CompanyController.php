<?php

namespace App\Http\Controllers\Company;
use App\Http\Controllers\Controller;

use App\company\company;
use App\company\industry;
use App\company\company_size;
use App\company\company_type;
use Illuminate\Http\Request;
use App\state;
use App\city;
use Auth;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rule;
use App\Mail\Errormail;
use Mail;
class CompanyController extends Controller
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
        $industries= industry::all();
          $company_size= company_size::all();
          $company_type= company_type::all();
          $state= state::all();
          $city= city::orderBy('city', 'asc')->get();
          return view('company/company', compact('industries','company_size','company_type','state','city'));
    
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
    public function company_create(Request $request)
    {
       try{
          $user_id=Auth::user()->id;
          $validator = Validator::make($request->all(), [ 
           'company_name' => 'required',
           'public_url' => ['required', 
            Rule::unique('companies','public_url')->ignore($user_id, 'user_id')],//Rule:unique('tabel name','column name')
            'website' => ['required',
                Rule::unique('companies','website')->ignore($user_id, 'user_id')],
            'description' => 'required',
            'industry_id' => 'required',
            'city' => 'required',
            'state' => 'required',
            'company_type_id' => 'required',
            'company_size_id' => 'required',
              ]);
         
            if ($validator->fails()) {
                return response()->json(['message' => $validator->errors()->first(), 'error' => true]);
            }
                 
         company::updateOrCreate(['user_id'=>Auth::user()->id],[
            'company_name' => $request->company_name,
            'public_url' => $request->public_url,
            'website' => $request->website,
            'company_tagline' => $request->company_tagline,
            'description' => $request->description,
            'industry_id' => $request->industry_id,
            'cities_id' => $request->city,
            'states_id' => $request->state,
            'company_type_id' => $request->company_type_id,
            'company_size_id' => $request->company_size_id,]);
 if ($request->user_id != null){
              
            return "Company has been successfully updated.";
        } else {

            return "Company has been successfully added.";
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
     * @param  \App\company  $company
     * @return \Illuminate\Http\Response
     */
    public function company_show()
    {
        try{
        $company_data= company::where('user_id',Auth::user()->id)->get();
        //dd($company_data);
    	return view('company/company_show',compact('company_data'));
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
     * Show the form for editing the specified resource.
     *
     * @param  \App\company  $request
     * @return \Illuminate\Http\Response
     */
    public function company_edit(Request $request)
    {
        try{
        $userId = Auth::User()->id;
        $company_data= company::where([['companies.user_id','=',$userId]])
                ->select('companies.*')               
                ->first();
               //dd($declaration_data);
        return $company_data;                
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
