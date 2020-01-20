@extends('master')   
@section('title'){{"Contact US"}}@stop
@section('content')

<!-- signin-page -->
	<section class="clearfix job-bg user-page">        	
                <div class="container">
			<div class="row text-center">
				<!-- user-login -->			
				<div class="col-sm-8 col-sm-offset-2 col-md-6 col-md-offset-3">
					<div class="user-account">
						<h2>Contact Us</h2>
						<!-- form -->
                    <form method="post" action="{{ route('contact_us_mail') }}">
                        @csrf
                        @if(Session::has("success"))
                        <div class="alert alert-success">
                            <b>Successfull</b>, your inquiry sent.  
                        </div>   
                        @endif
                        <div class="form-group ">
                            <label for="name" class="col-sm-4 col-form-label text-md-right">{{ __('Name') }}</label>

                            <div class="col-md-6">
                                <input id="name" type="name" class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}" name="name" value="{{ old('name') }}" required autofocus>

                            </div>
                        </div>
                        <div class="form-group ">
                            <label for="email" class="col-sm-4 col-form-label text-md-right">{{ __('E-Mail Address') }}</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" name="email" value="{{ old('email') }}" required autofocus>

                                @if ($errors->has('email'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="Mobile No." class="col-md-4 col-form-label text-md-right">{{ __('Mobile No.') }}</label>

                            <div class="col-md-6">
                                <input id="mobile_number" type="mobile_number" class="form-control{{ $errors->has('Mobile Number') ? ' is-invalid' : '' }}" name="mobile_number" required>

                            </div>
                        </div>
                        <div class="form-group">
                            <label for="message" class="col-md-4 col-form-label text-md-right">{{ __('Message') }}</label>
                            <div class="col-md-6">
                            <textarea class="form-control" name="message"  id="message" placeholder="Write few lines about your message" rows="5">{{ old('message') }}</textarea>
                            </div>
                        </div>

                        <div class="form-group row mb-0">
                            <div class="col-md-6 offset-md-4">
                                    <button type="submit" class="btn btn-primary">
                                                {{ __('Send') }}
                                            </button>    
                            </div>
                        </div>

                    </form>
	<!-- forgot-password -->    
                                        </div>
                                </div><!-- user-login -->			
			</div><!-- row -->	
		</div><!-- container -->
	</section><!-- signin-page -->
	
	
@endsection