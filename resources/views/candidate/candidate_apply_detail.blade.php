@extends('master')   

@section('content')

<div class="section job-list-item">
    @foreach($candidate as $candidate)
    <div class="job-ad-item">
        <div class="item-info">
            <div class="item-image-box">
                <div class="item-image">
                    <a href="job-details.html"><img src="images/job/1.png" alt="Image" class="img-responsive"></a>
                </div><!-- item-image -->
            </div>
            <div class="ad-info">
                <span><a href="" class="title">{{$candidate->candidate->name}}</a> <a href="#"></a></span>
 
                <div class="user-profile">
                    <div class="favorites-user">
                        <div class="my-ads">
                            <a class="btn"></a>
                        </div>
                    </div>
                </div>
                <div class="ad-meta">
                    <ul>
                        <li><a href="#"><i class="fa fa-map-marker" aria-hidden="true"></i>{{$candidate->candidate->city->city}},{{$candidate->candidate->state->state}}</a></li>
                        <li><a href="#"><i class="fa fa-mobile-phone" aria-hidden="true">{{$candidate->candidate->mobile_number}}</i></a></li>
                    </ul>
                </div><!-- ad-meta -->
            </div><!-- ad-info -->
        </div><!-- item-info -->
    </div><!-- job-ad-item -->
    @endforeach				
</div><!-- job-ad-item -->
<br>
@endsection        


