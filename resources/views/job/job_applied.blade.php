<div class="section job-list-item">

@foreach($appliedjob as $jobs)
<div class="job-ad-item">
    <div class="item-info">
        <div class="item-image-box">
            <div class="item-image">
                <a href="job-details.html"><img src="images/job/1.png" alt="Image" class="img-responsive"></a>
            </div><!-- item-image -->
        </div>

        <div class="ad-info">
            <span><a href="{{route('job_show',$jobs->jobs->slug_titile)}}" class="title">{{$jobs->jobs->jobs_title}}</a> @ <a href="#">{{$jobs->jobs->company->company_name}}</a></span>
            <div class="ad-meta">
                <ul>
                    <li><a href="#"><i class="fa fa-map-marker" aria-hidden="true"></i>{{$jobs->jobs->city->city}},{{$jobs->jobs->state->state}}</a></li>
                    <li><a href="#"><i class="fa fa-clock-o" aria-hidden="true"></i>{{$jobs->jobs->jobs_types->jobs_types}}</a></li>
                    <li><a href="#"><i class="fa fa-clock-o" aria-hidden="true"></i>{{$jobs->jobs->created_at}}</a></li>
                    <li><a href="#"><i class="fa fa-money" aria-hidden="true"></i>${{$jobs->jobs->minimum_salary}} - ${{$jobs->jobs->maximum_salary}}</a></li>
                </ul>

            </div><!-- ad-meta -->
        </div><!-- ad-info -->
    </div><!-- item-info -->
</div><!-- job-ad-item -->

@endforeach				
</div><!-- job-ad-item -->
<br>