@extends('master')   

@section('content')

<section class=" job-bg page  ad-profile-page section">
    
    
<div class="section job-list-item sm-9">
  <div class="title">
        <H3>My Job Postings</h3>
<hr>
</div><!-- section -->
    
    
    @foreach($jobs as $job)
    <div class="job-ad-item">
        <div class="item-info">
           
            <div class="ad-info">
                <span><a href="{{route('job_show',$job->slug_titile)}}" class="title">{{$job->jobs_title}}</a> @ <a href="#">{{$job->company->company_name}}</a></span>
                <div class="user-profile">
                    <div class="favorites-user">
                        <div class="my-ads">
                            <a class="btn"></a>
                        </div>
                    </div>
                </div>
                <div class="ad-meta">
                    <ul>
                        <li><a href="#"><i class="fa fa-map-marker" aria-hidden="true"></i>{{$job->city->city}},{{$job->state->state}}</a></li>
                        <li><a href="#"><i class="fa fa-clock-o" aria-hidden="true"></i>{{$job->jobs_types->jobs_types}}</a></li>
                        <li><a href="#"><i class="fa fa-clock-o" aria-hidden="true"></i>{{$job->created_at}}</a></li>
                        <li><a href="#"><i class="fa fa-clock-o" aria-hidden="true"></i></a></li>
                        <li><a href="#"><i class="fa fa-money" aria-hidden="true"></i>&#x20b9;{{$job->minimum_salary}} - &#x20b9;{{$job->maximum_salary}}</a></li>
                    </ul>

                </div><!-- ad-meta -->

            </div><!-- ad-info -->
            <div class=""><h4><a href="{{ route('candidate_apply',encrypt($job->jobs_id)) }}" class="btn pull-right"><i class="fa fa-user fa-2x ">{{$job->apply_job->count()}}</i></a><a href="{{ route('job_edit',encrypt($job->jobs_id)) }}" class="pull-right fa-2x btn"><i class="fa fa-edit"></i></a></h4></div>

        </div><!-- item-info -->
    </div><!-- job-ad-item -->
    @endforeach				
{{ $jobs->links()}}
</div><!-- job-ad-item -->

<br>

     </section>
@endsection