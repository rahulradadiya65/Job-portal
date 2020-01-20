@extends('master')
        		
@section('title'){{$title}}@stop

@section('content')
<br/>
<section class="job-bg page job-list-page"> 
<div class="container">
                    <div class="banner-form banner-form-full job-list-form">
                        <form action="{{URL::to('job_list')}}" method="post">
                            @CSRF        
                            <div>	<!-- category-change -->
                                           <select name="category" value="{{ old('category') }}" id="category" class="form-control input-lg dynamic" >
                                                <option value="">Select a category</option>
                                                @foreach($category as $category) 
                                                <option value="{{ $category->category_name_slug }}">{{ $category->category_name }}</option>
                                                @endforeach								
                                            </select>
                                <!-- language-dropdown -->
                                <div class="dropdown category-dropdown " >
                                    <input class="typeahead form-control select2-multi" multiple="multiple" id="search_location" value="" name="search_location" type="text" placeholder="location">
                                    <ul class="dropdown-menu category-change language-change" value="cities_id" id="city"></ul>	
                                </div><!-- language-dropdown -->
                                <div class="dropdown category-dropdown language-dropdown">
                                    <input type="text" class="form-control" id="text_search" name="text_search" placeholder="Type your key word">
                                </div>
                                <button type="submit" name="btn-sub" class="btn btn-primary" id="btn-sub">Search</button>
                            </div>
                        </form>
                    </div><!-- banner-form -->   
                    <div class="category-info">	
                        <!-- recommended-ads -->
                        <div class="col-sm-8 col-md-12">				
                            <div class="section job-list-item">
<!--                                <div class="featured-top">
                                    <h4>Showing 1-25 of 65,712 ads</h4>
                                    <div class="dropdown pull-right">
                                        <div class="dropdown category-dropdown">
                                            <h5>Sort by:</h5>						
                                            <a data-toggle="dropdown" href="#"><span class="change-text">Most Relevant</span><i class="fa fa-caret-square-o-down"></i></a>
                                            <ul class="dropdown-menu category-change">
                                                <li><a href="#">Most Relevant</a></li>
                                                <li><a href="#">Most Popular</a></li>
                                            </ul>								
                                        </div> category-change 		
                                    </div>							
                                </div> featured-top 	-->                    
 <div>
       <div id="tbody">
@foreach($jobs as $job)        			
<div class="job-ad-item" div="kinaj">
    <div class="item-info">

       <div class="ad-info">
            <span><a href="{{route('job_show',$job->slug_titile)}}" target="_blank" class="title">{{$job->jobs_title}}</a> @ <a href="#">{{$job->company->company_name}}</a></span>
            <div class="ad-meta">
                <ul>
                    <li><a href="#"><i class="fa fa-map-marker" aria-hidden="true"></i>{{$job->city->city}},{{$job->state->state}}</a></li>
                    <li><a href="#"><i class="fa fa-clock-o" aria-hidden="true"></i>{{$job->jobs_types->jobs_types}}</a></li>
                    <li><a href="#"><i class="fa fa-clock-o" aria-hidden="true"></i>{{$job->created_at}}</a></li>
                    <li><a href="#"><i class="fa fa-money" aria-hidden="true"></i>&#x20b9;{{$job->minimum_salary}} - &#x20b9;{{$job->maximum_salary}}</a></li>
                </ul>
            </div><!-- ad-meta -->	

            <form action="{{URL::to('apply')}}/{{ encrypt($job->jobs_id) }}" method="get" id="form">
                @csrf
                <input type="hidden" name="jobs_id" value="{{ encrypt($job->jobs_id) }}" id="jobs_id">      
                <button type="submit" ID="submit" class="btn btn-primary">Apply Job</button>
            </form>


        </div><!-- ad-info -->
    </div><!-- item-info -->
</div><!-- job-ad-item -->
@endforeach				
<!-- pagination  -->

{{ $jobs->appends(Request::all())->links()}}
     </div>
 
    <input type="hidden" name="hidden_page" id="hidden_page" value="1" />
    <input type="hidden" name="hidden_column_name" id="hidden_column_name" value="jobs_id" />
    <input type="hidden" name="hidden_sort_type" id="hidden_sort_type" value="asc" />
   </div>
 <div class="col-md-2 hidden-xs hidden-sm">
						<div class="advertisement text-center">
							<a href="#"><img src="images/ads/1.jpg" alt="" class="img-responsive"></a>
						</div>
					</div>
				</div>	
			</div>
		</div><!-- container -->
</div>
</section>
<script>

$('input.typeahead').on('keyup', function(){
      
        var query =  $(this).val();//this = typeeahead 
        $.get("{{ route('autocomplete') }}", { query: query }, function (data) {
                
               if(data.length > 0){
                    var html = ''; //any veraybel only html priprertion
                    for (var i = 0; i < data.length; i++) {
                        html += '<li class=""><a href="javascript:" Value="'+data[i].cities_id+'"  class="select_value">'+data[i].city+'</a></li>'; //herf for non redirection 
 //            use for (city_state name)html += '<li class=""><a href="javascript:" Value="'+data[i].cities_id+'"  class="select_value">'+data[i].city+''+data[i].state1.state+'</a></li>'; //herf for non redirection 
             //alert(html);
            }
                    $('#city').html(html).show();
                    selectLocation();
                }
            });
    });
    
    function selectLocation(){
        $('.select_value').on('click', function(){
        var $this = $(this); //select_value "this" for event value
        $('input.typeahead').val($this.html());
        $('#city').hide();
        
    });
    };
</script>
@endsection