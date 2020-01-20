@extends('master')

@section('title'){{'HR Jobs in India | HR Job Search |HR Part Time Jobs |HR FREE Job Posting in dradhata.com'}}@stop
@section('meta-description'){{'Find the Best HR Jobs to achieve your Career goal. New Job Postings and Opening in India every day. Free Job Postings - Find the Right Candidates with dradhata.com'}} @stop
@section('keywords')@foreach($category as $category2){{ $category2->category_name }}@endforeach	@stop

@section('og-title'){{'HR Jobs in India | HR Job Search |HR Part Time Jobs |HR FREE Job Posting in dradhata.com'}}@stop
@section('og-description'){{'Find the Best HR Jobs to achieve your Career goal. New Job Postings and Opening in India every day. Free Job Postings - Find the Right Candidates with dradhata.com'}} @stop


@section('content')
<div class="banner-job">
    <div class="banner-overlay"></div>
    <div class="container text-center">
        <h1 class="title">The Easiest Way to Get Your New Job</h1>
        <h3>We offer {{$jobs}} jobs vacation right now</h3>        
        <div class="banner-form">

            <form action="{{URL::to('job_list')}}" method="post">
                @CSRF        
                <div>	<!-- category-change -->
                    <select name="category" value="{{ old('category') }}" id="category" class="form-control input-lg dynamic" >
                        <option value="">Select a category</option>
                        @foreach($category as $category_search) 
                        <option value="{{ $category_search->category_name_slug }}">{{ $category_search->category_name }}</option>
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

        <ul class="banner-socail list-inline">
            <li><a href="https://www.facebook.com/dradhata/" title="Facebook" target="_blank"><i class="fa fa-facebook"></i></a></li>
            <li><a href="https://www.linkedin.com/company/drathata/" target="_blank" title="linkedin"><i class="fa fa-linkedin"></i></a></li>

        </ul><!-- banner-socail -->
    </div><!-- container -->
</div><!-- banner-section -->

<div class="page">
    <div class="container">
        <div class="section category-items job-category-items  text-center">
            <ul class="category-list">	
                @foreach ($category as $category)
                <li class="category-item list-group-item-action">
                    <a href="{{URL::to('job_list')}}?c={{ $category->category_name_slug }}" target="_blank" name="category">
                      
                        <span class="category-title">{{ $category->category_name }}</span>
                        <span class="category-quantity">({{$category->category->count()}})</span>
                    </a>
                </li><!-- category-item -->
                @endforeach				
            </ul>				
        </div><!-- category ad -->			
   
    </div> 
</div>   
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