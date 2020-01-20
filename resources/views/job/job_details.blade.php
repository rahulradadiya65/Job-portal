@extends('master')   
@foreach($jobdetail as $title)
@section('title'){{$title->jobs_title}} @ {{ $title->city->city }}, {{ $title->state->state }}@stop
@section('meta-description'){{html_entity_decode(\Illuminate\Support\Str::words ($title->description, 150))}}@stop
@section('keywords'){{$title->skills}}@stop

@section('og-title'){{$title->jobs_title}} @ {{ $title->city->city }}, {{ $title->state->state }} @stop
@section('og-description'){{html_entity_decode(\Illuminate\Support\Str::words ($title->description, 150))}}@stop

@endforeach

@section('content')


	<section class="job-bg page job-details-page">
		<div class="container">
			<div class="breadcrumb-section">
				<ol class="breadcrumb">
					<li><a href="index-2.html">Home</a></li>
					
                                        @foreach($jobdetail as $breadcrumb)
                                        <li><a href="{{URL::to('job_list')}}">Search Job</a></li>
					<li>{{$breadcrumb->jobs_title}}</li>
                                        @endforeach
				</ol><!-- breadcrumb -->						
			</div><!-- breadcrumb -->


			<div class="job-details">
				<div class="section job-ad-item">
					<div class="item-info">
						<div class="item-image-box">

						</div>
@foreach($jobdetail as $jobdetail)
						<div class="ad-info">
							<span><span><a href="#" class="title">{{ $jobdetail->jobs_title }}</a></span> @ <a href="#"> {{$jobdetail->company->company_name}}</a></span>
							<div class="ad-meta">
								<ul>
									<li><a href="#"><i class="fa fa-map-marker" aria-hidden="true"></i>{{ $jobdetail->city->city }}, {{ $jobdetail->state->state }}</a></li>
									<li value=""><a href="#"  ><i class="fa fa-clock-o" aria-hidden="true"></i>{{ $jobdetail->jobs_types->jobs_types }}</a></li>
									<li><i class="fa fa-money" aria-hidden="true"></i>&#x20b9;{{$jobdetail->minimum_salary}} - &#x20b9;{{$jobdetail->maximum_salary}}</li>
									<li><a href="#"><i class="fa fa-tags" aria-hidden="true"></i>{{$jobdetail->category->category_name}}</a></li>
<!--									<li><i class="fa fa-hourglass-start" aria-hidden="true"></i>Application Deadline : Jan 10, 2017</li>-->
								</ul>
							</div><!-- ad-meta -->									
						</div><!-- ad-info -->
					</div><!-- item-info -->
					<div class="social-media">
						<div class="button">

                                                                    <form action="{{URL::to('apply')}}/{{ encrypt($jobdetail->jobs_id) }}" method="get" id="form">
                @csrf
                <input type="hidden" name="jobs_id" value="{{ encrypt($jobdetail->jobs_id) }}" id="jobs_id">      
                <button type="submit" ID="submit" class="btn btn-primary"><i class="fa fa-briefcase" aria-hidden="true"></i>Apply For This Job</button>
            </form>
						</div>
						<ul class="share-social">
							<li>Share this ad</li>
							<li><a href="#"><i class="fa fa-facebook-official" aria-hidden="true"></i></a></li>
							<li><a href="#"><i class="fa fa-twitter-square" aria-hidden="true"></i></a></li>
							<li><a href="#"><i class="fa fa-google-plus-square" aria-hidden="true"></i></a></li>
							<li><a href="#"><i class="fa fa-linkedin-square" aria-hidden="true"></i></a></li>
							<li><a href="#"><i class="fa fa-pinterest-square" aria-hidden="true"></i></a></li>
							<li><a href="#"><i class="fa fa-tumblr-square" aria-hidden="true"></i></a></li>
						</ul>
					</div>					
				</div><!-- job-ad-item -->
				
				<div class="job-details-info">
					<div class="row">
						<div style="min-height:auto;" class="col-sm-8">
						<div class="col-sm-12 col-md-12">
							<div class="section job-description">
								<div class="description-info">
									<h1>Description</h1>
									<p>{!!$jobdetail->description!!}</p>
								</div>					
							</div>
							</div>
					
						</div>
						<div class="col-sm-4">
							<div class="section job-short-info">
								<h1>Short Info</h1>
								<ul>
									<li><span class="icon"><i class="fa fa-bolt" aria-hidden="true"></i></span>Posted: {{$jobdetail->days}} day ago</li>
									<li><span class="icon"><i class="fa fa-user-plus" aria-hidden="true"></i></span> Job poster: <a href="#">{{$jobdetail->user->name}}</a></li>
									<li><span class="icon"><i class="fa fa-industry" aria-hidden="true"></i></span>Industry: <a href="#">{{$jobdetail->industry->industry_name}}</a></li>
									<li><span class="icon"><i class="fa fa-line-chart" aria-hidden="true"></i></span>Experience: <a href="#">{{$jobdetail->minimum_experience}} - {{$jobdetail->maximum_experience}} year </a></li>
									<li><span class="icon"><i class="fa fa-key" aria-hidden="true"></i></span>Job function: {{$jobdetail->skills}}</li>
                                                                        
								</ul>
							</div>
							<div class="section company-info">
								<h1>Company Info</h1>
								<ul>
									<li>Compnay Name: <a href="#">{{$jobdetail->company->company_name}}</a></li>
									<li>Address: {{$jobdetail->company->city->city}},{{$jobdetail->company->state->state}}</li>
									<li>Compnay SIze:  {{$jobdetail->company->company_size->company_size_name}}</li>
									<li>Industry: <a href="#">{{$jobdetail->company->company_industry->industry_name}}</a></li>

								</ul>
							</div>
			
						</div>

					</div><!-- row -->					
	<!-- Similar Jobs -->
	<div class="col-sm-12 col-md-12">						
                            <div style="margin:0px;padding:0px;" class="section job-list-item">
<div style="" class="job-ad-item">
<h1>Similar Jobs</h1>
								@foreach($similar_jobs as $job)
									<div style="border:1px solid black;padding:5px;margin:5px;" class="item-info">
									   <div  class="ad-info" >
											<span style="font-size:20px"><a href="{{route('job_show',$job->slug_titile)}}" target="_blank" style="font-size:20px" class="title">{{$job->jobs_title}}</a> @ <a href="#" style="font-size:20px">{{$job->company->company_name}}</a></span>
											<div class="ad-meta cl-sm-12 col-md-12">
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
								@endforeach		
								</div><!-- job-ad-item -->
		
<!-- pagination  -->
							</div>
						</div><!-- Similar Jobs -->

					</div><!-- job-details-info -->				
			</div><!-- job-details -->
		</div><!-- container -->
	</section><!-- job-details-page -->
	

	
	
	
@endforeach


@endsection