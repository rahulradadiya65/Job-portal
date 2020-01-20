@foreach($jobs as $job)        			

<div class="job-ad-item" div="kinaj">
    <div class="item-info">
        <div class="item-image-box">
            <div class="item-image">
                <a href="job-details.html"><img src="images/job/1.png" alt="Image" class="img-responsive"></a>
            </div><!-- item-image -->
        </div>

        <div class="ad-info">
            <span><a href="{{route('job_show',$job->jobs_id)}}" class="title">{{$job->jobs_title}}</a> @ <a href="#">{{$job->company->companies_name}}</a></span>
            <div class="ad-meta">
                {{$job->category}}	
                <ul>
                    <li><a href="#"><i class="fa fa-map-marker" aria-hidden="true"></i>{{$job->city->city}},{{$job->state->state}}</a></li>
                    <li><a href="#"><i class="fa fa-clock-o" aria-hidden="true"></i>{{$job->jobs_types->jobs_types}}</a></li>
                    <li><a href="#"><i class="fa fa-clock-o" aria-hidden="true"></i>{{$job->created_at}}</a></li>
                    <li><a href="#"><i class="fa fa-money" aria-hidden="true"></i>${{$job->minimum_salary}} - ${{$job->maximum_salary}}</a></li>
                </ul>
                {{$job->description}}
            </div><!-- ad-meta -->	

            <form action="{{URL::to('apply')}}" method="post" id="form">
                @csrf
                <input type="hidden" name="jobs_id" value="{{ encrypt($job->jobs_id) }}" id="jobs_id">
                <input type="submit" name="btn-sub" value="save" id="btn-sub">      
                <!--                                                                                    <button type="submit" ID="submit" class="btn btn-primary">Apply Job</button>-->
            </form>


        </div><!-- ad-info -->
    </div><!-- item-info -->
</div><!-- job-ad-item -->
@endforeach				
<!-- pagination  -->
{{$jobs->links()}}

