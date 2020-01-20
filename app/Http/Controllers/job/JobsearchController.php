<?php

namespace App\Http\Controllers\job;
use App\Http\Controllers\Controller;

use App\job;
use App\category;
use App\city;
use Illuminate\Http\Request;
use App\Mail\Errormail;
use Mail;
use Elasticsearch\ClientBuilder;

class jobsearchController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    
    public function rahul($search_location)
    {
        dd($search_location);
    }

    public function Kinjal()
    {
	
	job::addAllToIndex();
		
$params = job::find(16);

$articles = job::searchByQuery(['match' => ['jobs_title' => 'hr']]);

return $articles;


	}








    //public function index($search_location,$category,$text_search)
    public function index(Request $request)
    { try{
     $category = category::all();
     $city = City::where('city','=',$request->l)->first();
     $category1 = category::where('category_name_slug','=',$request->c)->first();
     
    $query = job::select('jobs.*');
            if ($request->c) {
                $query->where('categories_id', '=', $category1->categories_id);
            }
            //dd($query);
            if ($request->l) {

                $query->where('cities_id', '=', $city->cities_id);
            }

            if ($request->t) {

                $query->where('jobs_title', 'LIKE', '%' . $request->t . '%')
                        ->Orwhere('description', 'LIKE', '%' . $request->t . '%');
            }

            $jobs = $query
                    ->orderBy('updated_at', 'desc')
                    ->paginate(20);
     //for SEO Title      
if ($request->c == true) {
                $title= "$request->c"." "."jobs" ;
            }
if ($request->l == true) {
                $title= "jobs"." "."in"." "."$request->l" ;
            }
if ($request->t == true) {
                $title= "$request->t"." "."jobs";
            }
if ($request->c == true & $request->l == true) {
                $title= "$request->c"." "."jobs"." "."in"." "."$request->l" ;
            }
if ($request->t == true & $request->l == true) {
                $title= "$request->t"." "."jobs"." "."in"." "."$request->l" ;
            }            
if ($request->c == true & $request->l == true & $request->t == true) {
                $title= "$request->c"." "."$request->t"." "."jobs"." "."in"." "."$request->l" ;
            }            
if ($request->c == null & $request->l == null & $request->t == null) {
                $title= "JOBS" ;
            }             
     return view('job.job_list.job_list', compact('jobs','category','category1','title'));
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
    public function job_list_data(Request $request)
    {
        try{
        if ($request->ajax()) {

            $city = City::where('city', '=', $request->search_location)->first();

            $query = job::select('jobs.*');
            if ($request->category) {
                $query->where('categories_id', '=', $request->category);
            }
            //dd($query);
            if ($request->search_location) {

                $query->where('cities_id', '=', $city->cities_id);
            }

            if ($request->text_search) {

                $query->where('jobs_title', 'LIKE', '%' . $request->text_search . '%')
                        ->Orwhere('description', 'LIKE', '%' . $request->text_search . '%');
            }

            $jobs = $query->paginate(1);


            return view('job.job_list.jobdata', compact('jobs'))->render();
        
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

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
