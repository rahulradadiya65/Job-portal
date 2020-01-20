<!DOCTYPE html>
<html lang="en">
  
<!-- Mirrored from demo.themeregion.com/jobs-updated/ by HTTrack Website Copier/3.x [XR&CO'2014], Mon, 11 Jun 2018 16:33:26 GMT -->
<head>
    
    
    <meta charset="utf-8">
   
    <meta name="viewport" content="width=device-width, initial-scale=1">
   
    <title>@yield('title')</title>
    <meta name="description" content="@yield('meta-description')" />
    <meta name="keywords" content="@yield('keywords')">

    <meta property="og:title" content="@yield('og-title')" />
    <meta property="og:description" content="@yield('og-description')" />
    <meta property="og:url" content="{{url()->current()}}" />
  
    <!-- CSS -->
    <link rel="stylesheet" href="{{URL::to('public/css/bootstrap.min.css')}}" >
    <link rel="stylesheet" href="{{URL::to('public/css/font-awesome.min.css')}}">
	<link rel="stylesheet" href="{{URL::to('public/css/icofont.css')}}"> 
    <link rel="stylesheet" href="{{URL::to('public/css/slidr.css')}}">     
    <link rel="stylesheet" href="{{URL::to('public/css/main.css')}}">  
	<link id="preset" rel="stylesheet" href="{{URL::to('public/css/presets/preset1.css')}}">	
    <link rel="stylesheet" href="{{URL::to('public/css/responsive.css')}}">
<link href="{{URL::to('public/summernote/summernote.css')}}" rel="stylesheet">	

        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>   
                 <script src="{{ URL::to('public/js/jquery.min.js') }}"></script>
             <script src="{{URL::to('public/js/main.js')}}"></script>
	<!-- font -->
	<link href='https://fonts.googleapis.com/css?family=Ubuntu:400,500,700,300' rel='stylesheet' type='text/css'>
	<link href='https://fonts.googleapis.com/css?family=Signika+Negative:400,300,600,700' rel='stylesheet' type='text/css'>

        <link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.5.0/css/bootstrap-datepicker.css" rel="stylesheet">  
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css"> 
                <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.5.0/js/bootstrap-datepicker.js"></script> 
        
	<!-- icons -->
	<link rel="icon" href="images/ico/favicon.ico">	
    <link rel="apple-touch-icon" sizes="144x144" href="images/ico/apple-touch-icon-144-precomposed.png">
    <link rel="apple-touch-icon" sizes="114x114" href="images/ico/apple-touch-icon-114-precomposed.png">
    <link rel="apple-touch-icon" sizes="72x72" href="images/ico/apple-touch-icon-72-precomposed.html">
    <link rel="apple-touch-icon" sizes="57x57" href="images/ico/apple-touch-icon-57-precomposed.png">
    <!-- icons -->

	
    <!-- include summernote css/js-->

<!-- Global site tag (gtag.js) - Google Analytics -->
<script async src="https://www.googletagmanager.com/gtag/js?id=UA-140506695-1"></script>
<script>
  window.dataLayer = window.dataLayer || [];
  function gtag(){dataLayer.push(arguments);}
  gtag('js', new Date());

  gtag('config', 'UA-140506695-1');
</script>



    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
    <!-- Template Developed By ThemeRegion -->
  </head>
  <body>
	<!-- header -->
	<header id="header" class="clearfix">
		<!-- navbar -->
		<nav class="navbar navbar-default">
			<div class="container">
				<!-- navbar-header -->
				<div class="navbar-header">
					<button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar-collapse">
					<span class="sr-only">Toggle navigation</span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
					</button>
					<a class="navbar-brand active"   href="{{URL::to('/')}}" >Dradhata</a>
				</div>
				<!-- /navbar-header -->
				
				<div class="navbar-left">
					<div class="collapse navbar-collapse" id="navbar-collapse">
						<ul class="nav navbar-nav">
							<li class="active"><a href="{{URL::to('/')}}">Home</a></li>
							<li><a href="{{URL::to('job_list')}}">Job</a></li>
							<li><a href="{{URL::to('viewresume')}}">Profile</a></li>
							<li><a href="{{URL::to('company')}}">Company Profile</a></li> 
							<li><a href="{{URL::to('user_job_post_list')}}">job Post</a></li> 
						</ul>
					</div>
				</div><!-- navbar-left -->
				
				<!-- nav-right -->
				<div class="nav-right">				
					@guest
                                    <ul class="sign-in">
						<li><i class="fa fa-user"></i></li>
						<li><a href="{{ URL::to('login') }}" target="_blank">Sign In</a></li>
						<li><a href="{{ URL::to('register') }}" target="_blank">Register</a></li>
					</ul><!-- sign-in -->					
                                        @else
                                    <ul class="sign-in">
						<li><i class="fa fa-user"></i></li>
                                                <li><a class="btn-dark " href="{{ route('logout') }}"
                                                       onclick="event.preventDefault();
    document.getElementById('logout-form').submit();">
                                                        {{ __('Logout') }}
                                                    </a></li>
	 <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
				 @csrf
                            </form>	
                                    </ul><!-- sign-in -->					

                                        @endguest
                                        
					<a href="{{ URL::to('job_post') }}" class="btn">Post Your Job</a>
				</div>
				<!-- nav-right -->
                                
			</div><!-- container -->
		</nav><!-- navbar -->
	</header><!-- header -->
   @yield('content')
	
	<!-- footer -->
	<footer id="footer" class="clearfix">
		<!-- footer-top -->
		<section class="footer-top clearfix">
			<div class="container">
				<div class="row">
					<!-- footer-widget -->
					<div class="col-sm-3">
						<div class="footer-widget">
							<h3>Quik Links</h3>
							<ul>
								<li><a href="#">About Us</a></li>
								<li><a href="{{URL::to('contact_us')}}">Contact Us</a></li>
								<li><a href="#">Careers</a></li>
								<li><a href="#">All Cities</a></li>
								<li><a href="#">Help & Support</a></li>
								<li><a href="#">Advertise With Us</a></li>
							</ul>
						</div>
					</div><!-- footer-widget -->

					<!-- footer-widget -->
					<div class="col-sm-3">
						<div class="footer-widget">
							<h3>How to sell fast</h3>
							<ul>
								<li><a href="#">How to sell fast</a></li>
								<li><a href="#">Membership</a></li>
								<li><a href="#">Banner Advertising</a></li>
								<li><a href="#">Promote your ad</a></li>
								<li><a href="#">Jobs Delivers</a></li>
								<li><a href="#">FAQ</a></li>
							</ul>
						</div>
					</div><!-- footer-widget -->

					<!-- footer-widget -->
					<div class="col-sm-3">
						<div class="footer-widget social-widget">
							<h3>Follow us on</h3>
							<ul>
								<li><a href="https://www.facebook.com/dradhata/" target="_blank"><i class="fa fa-facebook-official"></i>Facebook</a></li>
								
								<li><a href="https://www.linkedin.com/company/drathata/" target="_blank" ><i class="fa fa-linkedin-square"></i>Linkedin</a></li>
								
							</ul>
						</div>
					</div><!-- footer-widget -->

					<!-- footer-widget -->
					<div class="col-sm-3">
						<div class="footer-widget news-letter">
							<h3>Newsletter</h3>
							<p>Dradhata is Worldest leading Portal platform that brings!</p>
							<!-- form -->
							<form action="#">
								<input type="email" class="form-control" placeholder="Your email id">
								<button type="submit" class="btn btn-primary">Sign Up</button>
							</form><!-- form -->			
						</div>
					</div><!-- footer-widget -->
				</div><!-- row -->
			</div><!-- container -->
		</section><!-- footer-top -->


	</footer><!-- footer -->
	
	<!--/Preset Style Chooser--> 
	<div class="style-chooser">
		<div class="style-chooser-inner">
			<a href="#" class="toggler"><i class="fa fa-cog fa-spin"></i></a>
			<h4>Presets</h4>
			<ul class="preset-list clearfix">
				<li class="preset1 active" data-preset="1"><a href="#" data-color="preset1"></a></li>
				<li class="preset2" data-preset="2"><a href="#" data-color="preset2"></a></li>
				<li class="preset3" data-preset="3"><a href="#" data-color="preset3"></a></li>
				<li class="preset4" data-preset="4"><a href="#" data-color="preset4"></a></li>
			</ul>
		</div>
	</div>
	<!--/End:Preset Style Chooser-->
	
    <!-- JS -->


    <script src="{{URL::to('public/js/price-range.js')}}"></script>   
    
    <script src="{{URL::to('public/js/switcher.js')}}"></script>    		
    <script src="{{URL::to('public/js/bootstrap.min.js')}}"></script>
	<script src="{{URL::to('public/summernote/summernote.js')}}"></script>

    <script src="https://cdn.jsdelivr.net/jquery.validation/1.16.0/jquery.validate.min.js"></script>
        <script src="https://cdn.jsdelivr.net/jquery.validation/1.16.0/additional-methods.min.js"></script>
        <script src="{{ URL::to('public/js/validation.js') }}"></script>
  </body>

<!-- Mirrored from demo.themeregion.com/jobs-updated/ by HTTrack Website Copier/3.x [XR&CO'2014], Mon, 11 Jun 2018 16:40:36 GMT -->
</html>