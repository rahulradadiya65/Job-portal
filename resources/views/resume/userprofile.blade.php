@extends('master')   

@section('content')

	<section class=" job-bg page  ad-profile-page">
		<div class="container">
			<div class="breadcrumb-section">
				<ol class="breadcrumb">
					<li><a href="{{URL::to('/')}}">Home</a></li>
					<li>Employee Profile</li>
				</ol>						
				<h2 class="title">My Profile</h2>
			</div><!-- breadcrumb-section -->
			
			<div class="job-profile section">	
				<div class="user-profile">
					<div class="user-images">
						<img src="public/images/user.jpg" alt="User Images" class="img-responsive">
					</div>
					<div class="user">
						<h2>Hello, <a href="#">{{Auth::user()->name}}</a></h2>
					<address>
                                            <p>Phone: {{Auth::user()->mobile_number}} <br> Email:<a> {{Auth::user()->email}}</a></p>
                                        </address>
<!--                                                <h5>You last logged in at: 10-01-2017 6:40 AM [ USA time (GMT + 6:00hrs)]</h5>-->
					</div>
 
					<div class="favorites-user">
                                            <div class="my-ads">
                                                <a class="btn" onclick="user_job_post_list()">{{$jobpostcount}}<small>Post JOB</small></a>
                                                </div>
<!--						<div class="favorites">
							<a href="bookmark.html">18<small>Favorites</small></a>
						</div>-->
					</div>								
				</div><!-- user-profile -->
					
				<ul class="user-menu">
					<li><a id="viewresume">View Resume</a></li>
					<li><a onclick="updateprofile()">Profile Details</a></li>
<!--					<li><a onclick="bookmark()">Bookmark</a></li>-->

					<li><a onclick="job_applied()">applied job</a></li>
					<li><a onclick="deleteaccount()">Close account</a></li>
				</ul>
			</div><!-- ad-profile -->

                      <div id="myprofile1"></div>  
                      <div id="myprofile"></div>  
                      <div id="appliedjob"></div>  
                      <div id="job_applied"></div>  
                      <div id="updateprofile"></div>  
                      <div id="user_job_post_list"></div>  
<!--                      <div id="bookmark"></div>  -->
                      <div id="deleteaccount"></div>  
                </div>      
        </section>
<script>
function profileshow1(){
            
		$.get("{{ route('profile') }}",function(data){
                $('#myprofile1').empty().html(data);
       
        $("#appliedjob,#updateprofile,#bookmark,#deleteaccount,#user_job_post_list,#job_applied").fadeOut();
		});
	}
        profileshow1();
        $('#viewresume').click(function(){
           $('#myprofile1').fadeIn();
                   $("#appliedjob,#updateprofile,#bookmark,#deleteaccount,#user_job_post_list,#job_applied").fadeOut();
       });
function appliedjob(){

		$.get("{{ route('appliedjob') }}",function(data){

			$('#appliedjob').fadeIn().html(data);
                        $("#myprofile1,#myprofile,#updateprofile,#bookmark,#deleteaccount,#user_job_post_list,#job_applied").fadeOut(); 
    });
	};
function updateprofile(){

		$.get("{{ route('updateprofile') }}",function(data){

			$('#updateprofile').fadeIn().html(data);
                        $("#myprofile1,#appliedjob,#myprofile,#bookmark,#deleteaccount,#user_job_post_list,#job_applied").fadeOut();
		});
	};
function bookmark(){

		$.get("{{ route('bookmark') }}",function(data){

			$('#bookmark').fadeIn().html(data);
                        $("#myprofile1,#appliedjob,#myprofile,#updateprofile,#deleteaccount,#user_job_post_list,#job_applied").fadeOut();
		});
	};
function user_job_post_list(){

		$.get("{{ route('user_job_post_list') }}",function(data){

			$('#user_job_post_list').fadeIn().html(data);
                        $("#myprofile1,#appliedjob,#myprofile,#updateprofile,#deleteaccount,#bookmark,#job_applied").fadeOut();
		});
	};
function job_applied(){

		$.get("{{ route('job_applied') }}",function(data){

			$('#job_applied').fadeIn().html(data);
                        $("#myprofile1,#appliedjob,#myprofile,#updateprofile,#deleteaccount,#bookmark,#user_job_post_list").fadeOut();
		});
	};
 function deleteaccount(){

		$.get("{{ route('deleteaccount') }}",function(data){

			$('#deleteaccount').fadeIn().html(data);
                        $("#myprofile1,#appliedjob,#myprofile,#updateprofile,#bookmark,#user_job_post_list,#job_applied").fadeOut();
		});
	};       
</script>   
                        
@endsection