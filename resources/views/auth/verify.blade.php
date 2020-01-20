@extends('master')
@section('content')<br />
<section class="job-bg page job-list-page"> 
<div class="container center">
                    
                    <div class="category-info">	
                        <!-- recommended-ads -->
                        <div class="col-sm-8 col-md-12">				
                            <div class="section job-list-item">
                
 <div>
       <div id="tbody">
<div class="job-ad-item" div="kinaj">
    <div class="item-info">
<div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Verify Your Email Address') }}</div>

                <div class="card-body">
                    @if (session('resent'))
                        <div class="alert alert-success" role="alert">
                            {{ __('A fresh verification link has been sent to your email address.') }}
                        </div>
                    @endif

                    {{ __('Before proceeding, please check your email for a verification link.') }}
                    {{ __('If you did not receive the email') }}, <a href="{{ route('verification.resend') }}">{{ __('click here to request another') }}</a>.
                </div>
            </div>
        </div>
       
    </div><!-- item-info -->
</div><!-- job-ad-item -->

<!-- pagination  -->

     </div>
    </div>
 				</div>	
			</div>
		</div><!-- container -->
</div>
</section>
@endsection
