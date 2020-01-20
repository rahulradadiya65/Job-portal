@extends('master')   

@section('content')

<section class=" job-bg ad-details-page">
    <div class="container">
        <div class="breadcrumb-section">
            <!-- breadcrumb -->
            <ol class="breadcrumb">
                <li><a href="index-2.html">Home</a></li>
                <li>Job Post </li>
            </ol><!-- breadcrumb -->						
            <h2 class="title">Post Your Job</h2>
            @if($errors->all())
            <div class="alert alert-danger">
                @foreach($errors->all() as $error)
                <li>{{$error}}</li>
                @endforeach
            </div> 
            @endif
        </div><!-- banner -->

        <div class="job-postdetails">
            <div class="row">	
                <div class="col-md-8">
                    <form action="{{URL::to('job_create')}}" method="post" id="form">
                        @csrf
                        <input type="hidden" value="{{ encrypt(Auth::User()->id) }}" name="user_id">
                         <input type="hidden" value="{{ encrypt(null) }}" name="jobs_id">
            
                        <fieldset>
                            <div class="section postdetails">
                                <h4>Post Your Job<span class="pull-right">* Mandatory Fields</span></h4>
                                <div class="row form-group add-title">
                                    <label class="col-sm-3 label-title">Job Category</label>
                                    <div class="col-sm-9">

                                        <select name="categories_id" value="{{ old('categories_id') }}" id="categories_id" class="form-control input-lg dynamic" >
                                            <option value="">select catagory</option>
                                            @foreach($category as $category) 
                                            <option value="{{ $category->categories_id }}">{{ $category->category_name }}</option>
                                            @endforeach								
                                        </select>

                                    </div>
                                </div>			

                                <div class="row form-group add-title">
                                    <label class="col-sm-3 label-title">Job Type<span class="required">*</span></label>
                                    <div class="col-sm-9">
                                        <select name="jobs_types_id" value="{{ old('jobs_types_id') }}" id="jobs_types_id" class="form-control input-lg dynamic" >
                                            <option value="">select job type</option>
                                            @foreach($jobtype as $jobtype) 
                                            <option value="{{ $jobtype->jobs_types_id }}">{{ $jobtype->jobs_types }}</option>
                                            @endforeach

                                        </select>

                                    </div>
                                </div>
                                
                                <div class="row form-group add-title">
                                    <label class="col-sm-3 label-title">Job Industry<span class="required">*</span></label>
                                    <div class="col-sm-9">
                                        <select name="industry_id" value="{{ old('industry_id') }}" id="industry_id" class="form-control input-lg dynamic" >
                                            <option value="">select job type</option>
                                            @foreach($industry as $industry) 
                                            <option value="{{ $industry->industry_id }}">{{ $industry->industry_name }}</option>
                                            @endforeach

                                        </select>

                                    </div>
                                </div>
                                <div class="row form-group">
                                    <label class="col-sm-3 label-title">Title for your jonb<span class="required">*</span></label>
                                    <div class="col-sm-9">
                                        <input name="jobs_title" type="text" value="" class="form-control" id="jobs_title" placeholder="ex, Human Resource Manager">
                                    </div>
                                </div>					
                                <div class="row form-group item-description">
                                    <label class="col-sm-3 label-title">Description<span class="required">*</span></label>
                                    <div class="col-sm-9">
                                        <textarea class="form-control summernote" name="description"  id="description" placeholder="Write few lines about your jobs" rows="8">{{ old('description') }}</textarea>		
                                    <p>5000 characters left</p>
									</div>
									</div>
	
                                <div class="row form-group add-title location">
                                    <label class="col-sm-3 label-title">Location<span class="required">*</span></label>
                                    <div class="col-sm-9">
                                        <div class="dropdown pull-left col-sm-6">
                                            <select name="state" value="" class="form-control" id="state">
                                                <option value="">Select State</option>
                                                @foreach ($state as $state)
                                                <option value="{{$state->states_id}}">{{($state->state) }}</option>
                                                @endforeach
                                            </select>							
                                        </div>
                                        <div class="dropdown pull-right col-sm-6">
                                            <select name="city" value="cities_id" class="form-control" id="city">
                                                <option value="">select city</option>
                                            </select>								
                                        </div>
                                    </div>
                                </div>

                                <div class="row form-group select-price">
                                    <label class="col-sm-3 label-title">Salary<span class="required">*</span></label>
                                    <div class="col-sm-9">
                                        <label>&#x20b9;</label>
                                        <input name="minimum_salary" value="" id="minimum_salary" type="text" class="form-control" placeholder="Min">
                                        <span>-</span>
                                        <input name="maximum_salary" type="text" value="" id="maximum_salary" class="form-control" placeholder="Max">
                                        <input type="radio" name="price" value="negotiable" id="negotiable">
                                        <label for="negotiable">Negotiable </label>
                                    </div>
                                </div>	
                                <div class="row form-group add-title">
                                    <label class="col-sm-3 label-title">Salary Type<span class="required">*</span></label>
                                    <div class="col-sm-9">
                                        <div class="dropdown">
                                            <select name="salary_types_id" value="{{ old('salary_types_id') }}" class="form-control" id="salary_types_id">
                                                <option value="">select salary type</option>
                                                @foreach($salarytype as $salarytype) 
                                                <option value="{{ $salarytype->salary_types_id }}">{{$salarytype->salary_types}}</option>
                                                @endforeach
                                            </select>	

                                        </div>
                                    </div>
                                </div>	

                                <div class="row form-group select-price">
                                    <label class="col-sm-3 label-title">Experience<span class="required">*</span></label>
                                    <div class="col-sm-9">
                                        <input name="minimum_experience" type="text" value="" id="minimum_experience" class="form-control" placeholder="Min Year">

                                        <input name="maximum_experience" id="maximum_experience" type="text" value="" class="form-control" placeholder="Max Year">

                                        <input type="radio" name="price" value="negotiable" id="negotiable">
                                    </div>
                                </div>	
                                <div class="row form-group brand-name">
                                    <label   class="col-sm-3 label-title">Skills<span class="required">*</span></label>
                                    <div class="col-sm-9">
                                        <input type="text" name="skills" value=""id="skills" class="form-control" />
                                            <!--<input name="skills" data-role="tagsinput" id="jobfunction" value="{{ old('jobfunction') }}" type="text" class="form-control" placeholder="human, reosurce, job, hrm">-->
                                    </div>
                                </div>	

                            </div><!-- postdetails -->
                            <div class="checkbox section agreement">
                                <label for="send">
                                    <input type="checkbox" name="send" id="send">
                                    You agree to our <a href="#">Terms of Use</a> and <a href="#">Privacy Policy</a> and acknowledge that you are the rightful owner of this item and using Jobs to find a genuine buyer.
                                </label>
                                <button type="submit" ID="submit" class="btn btn-primary">Post Your Job</button>
                            </div><!-- section -->

                        </fieldset>
                    </form><!-- form -->	
                </div>


                <!-- quick-rules -->	
                <div class="col-md-4">
                    <div class="section quick-rules">

                        <h4>Quick rules</h4>
                        <p class="lead">Posting an ad on <a href="#">jobs.com</a> is free! However, all ads must follow our rules:</p>

                        <ul>
                            <li>Make sure you post in the correct category.</li>
                            <li>Do not post the same ad more than once or repost an ad within 48 hours.</li>
                            <li>Do not upload pictures with watermarks.</li>
                            <li>Do not post ads containing multiple items unless it's a package deal.</li>
                            <li>Do not put your email or phone numbers in the title or description.</li>
                            <li>Make sure you post in the correct category.</li>
                            <li>Do not post the same ad more than once or repost an ad within 48 hours.</li>
                            <li>Do not upload pictures with watermarks.</li>
                            <li>Do not post ads containing multiple items unless it's a package deal.</li>
                        </ul>
                    </div>
                </div><!-- quick-rules -->	
            </div><!-- photos-ad -->				
        </div>	
    </div><!-- container -->
</section><!-- main -->

{{-- Jquery Ui taging--}}

<script type="text/javascript">


//$(document).ready(function () {
//
//    $('#skills').tokenfield({
//        autocomplete: {
//            // source: ['PHP','Codeigniter','HTML','JQuery','Javascript','CSS','Laravel','CakePHP','Symfony','Yii 2','Phalcon','Zend','Slim','FuelPHP','PHPixie','Mysql'],
//            source: function (request, response) {
//                $.getJSON("{{URL::to('api/skills')}}",
//                        
//                        function (data) {
//                            if (data) {
//                                response(data);
//                            }
//                        }
//                );
//            },
//            delay: 100
//        },
//        showAutocompleteOnFocus: true
//    });
//});


$(document).ready(function() {
    
        $('#state').on('change', function() {
            var state_ID = $(this).val();
            if(state_ID) {
                $.ajax({
                   
                    url: "{{URL::to('findCityWithStateID')}}?state_id="+state_ID,
                    type: "post",
                    data : {"_token":"{{ csrf_token() }}"},
                    dataType: "json",
                    success:function(data) {
                        //console.log(data);
                      if(data){
                        $('#city').empty();
                        $('#city').focus;
                        $('#city').append('<option value="">-- Select City --</option>'); 
                        $.each(data, function(cities_id, value){
                        $('select[name="city"]').append('<option value="'+ value.cities_id +'">' + value.city+ '</option>');
                    });
                  }else{
                    $('#city').empty();
                  }
                  }
                });
            } else { 
              $('#city').empty();
            }
        });
    });

	
	$(document).ready(function() {
  var editor = $('.summernote');
  editor.summernote({
    height: ($(window).height() - 500),
    focus: false,
    toolbar: [
      ['style', ['bold', 'italic', 'underline', 'clear']],
      ['font', ['strikethrough']],
      ['fontsize', ['fontsize']],
      ['para', ['ul', 'ol', 'paragraph']],
      ['height', ['height']],
      ['view', ['fullscreen', 'codeview']],
    ],
    oninit: function() {
      // Add "open" - "save" buttons
      var noteBtn = '<button id="makeSnote" type="button" class="btn btn-default btn-sm btn-small" title="Add Code" data-event="something" tabindex="-1"><i class="fa fa-file-text"></i></button>';
      var fileGroup = '<div class="note-file btn-group">' + noteBtn + '</div>';
      $(fileGroup).appendTo($('.note-toolbar'));
      // Button tooltips
      $('#makeSnote').tooltip({
        container: 'body',
        placement: 'bottom'
      });
      // Button events
      $('#makeSnote').click(function(event) {
                var range = window.getSelection().getRangeAt(0);
                var node = $(range.commonAncestorContainer)
                if (node.parent().is('code')) {
                    node.unwrap();
                } else {
                    node = $('<code />')[0];
                    range.surroundContents(node);
                };

      });
    },

  });

  $('.note-editable').html(para);

  $('#resetBtn').click(function() {
    $('.note-editable').html('').html(para);
  });

});
	
	
	
</script>


@endsection