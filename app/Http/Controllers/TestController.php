<?php

namespace App\Http\Controllers;

use App\test;
use Illuminate\Http\Request;
use App\job;
use App\category;
use App\City;
class TestController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
 function index()
    {
      $category = category::all();
     $jobs = job::orderBy('jobs_id', 'asc')->paginate(1);
     return view('test', compact('jobs','category'));
    }

    public function test1()
    {
       return view('test1');
    }
   function fetch_data(Request $request)
    {
     if($request->ajax())
     {

         $city = City::where('city','=',$request->search_location)->first();
         
 $query= job::select('jobs.*');
if($request->category){
             $query->where('categories_id', '=', $request->category);
        }
        //dd($query);
        if($request->search_location){
            
            $query->where('cities_id', '=', $city->cities_id);
        }
        
        if($request->text_search){
            
            $query->where('jobs_title', 'LIKE', '%'.$request->text_search.'%')
                  ->Orwhere('description', 'LIKE',  '%'.$request->text_search.'%');
        }
       
        $jobs = $query->paginate(1);


      return view('test_data', compact('jobs'))->render();
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
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\test  $test
     * @return \Illuminate\Http\Response
     */
    public function show(test $test)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\test  $test
     * @return \Illuminate\Http\Response
     */
    public function edit(test $test)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\test  $test
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, test $test)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\test  $test
     * @return \Illuminate\Http\Response
     */
    public function destroy(test $test)
    {
        //
    }
}
