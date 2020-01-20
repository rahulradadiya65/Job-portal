@extends('master')   

@section('content')
<section class=" job-bg page  ad-profile-page section">
<div class="section">
    <div class="icons">
        <i class="fa fa" aria-hidden="true"></i>
    </div>	
    <div class="title">
        <H3>Company Profile<span><a type="button" id="company_edit" class="btn pull-right" data-toggle="modal" data-target="#company_profile_add"><i class="fa fa-pencil fa-2x"></i></a></span></h3>
        <br><hr>
        <div id="company_profile2"></div>
</div><!-- section -->
</div><!-- work-history -->
										
<!-- Modal -->
<div class="modal fade" id="company_profile_add" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" id="myModalLabel">Modal title</h4>
            </div>
            <div class="modal-body">
                <form id="company_profile_create">
                    <div class="row form-group">
                        <input type="hidden" id="csrf_token" value="{{csrf_token()}}">
                        <input type="hidden" name="education_id"  id="education_id">
                        <label class="col-sm-3 label-title">Company Name</label>
                        <div class="col-sm-9">
                            <input type="text" name="company_name" id="company_name" class="form-control" placeholder="Company Name">
                        </div>
                    </div>
                    <div class="row form-group">
                        <label class="col-sm-3 label-title">Public URL</label>
                        <div class="col-sm-9">
                            <input type="text" name="public_url" id="public_url" class="form-control" placeholder="abc">
                        </div>
                    </div>
                    <div class="row form-group">
                        <label class="col-sm-3 label-title">website</label>
                        <div class="col-sm-9">
                            <input type="text" name="website" id="website" class="form-control" placeholder="www.abc.com">
                        </div>
                    </div>
                    <div class="row form-group">
                        <label class="col-sm-3 label-title">Companies Tagline</label>
                        <div class="col-sm-9">
                            <input type="text" name="company_tagline" id="company_tagline" class="form-control" placeholder="">
                        </div>
                    </div>
                    <div class="row form-group add-title">
                        <label class="col-sm-3 label-title">Company Industries<span class="required">*</span></label>
                        <div class="col-sm-9">
                            <select name="industry_id" value="{{ old('industry_id') }}" id="industry_id" class="form-control input-lg dynamic">
                                <option value="">Select a jobtype</option>
                                @foreach($industries as $industries) 
                                <option value="{{ $industries->industry_id }}">{{ $industries->industry_name }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="row form-group add-title">
                        <label class="col-sm-3 label-title">Companies Size<span class="required">*</span></label>
                        <div class="col-sm-9">
                            <select name="company_size_id" value="{{ old('company_size_id') }}" id="company_size_id" class="form-control input-lg dynamic" >
                                <option value="">Select a companies size</option>
                                @foreach($company_size as $company_size) 
                                <option value="{{ $company_size->company_size_id}}">{{ $company_size->company_size_name }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="row form-group add-title">
                        <label class="col-sm-3 label-title">Companies Type<span class="required">*</span></label>
                        <div class="col-sm-9">
                            <select name="company_type_id" value="{{ old('company_type_id') }}" id="company_type_id" class="form-control input-lg dynamic" >
                                <option value="">Select a companies size</option>
                                @foreach($company_type as $company_type) 
                                <option value="{{ $company_type->company_type_id}}">{{ $company_type->company_type_name }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="row form-group add-title location">
                        <label class="col-sm-3 label-title">Location<span class="required">*</span></label>
                        <div class="col-sm-9">
                            <div class="dropdown pull-left col-sm-6">
                                <select name="state" value="" class="form-control" id="state">
                                    <option value="">-- Select State --</option>
                                    @foreach ($state as $state)
                                    <option value="{{$state->states_id}}">{{($state->state) }}</option>
                                    @endforeach
                                </select>							
                            </div>
                            <div class="dropdown pull-right col-sm-6">
                                    <select name="city" value="cities_id" class="form-control" id="city">
                                        @foreach ($city as $city)        
                                        <option value="{{ $city->cities_id }}">{{ $city->city }}</option>
                                    @endforeach       
                                    </select>				
                            </div>
                        </div>
                    </div>
                    <div class="row form-group job-description">
                        <label class="col-sm-3 label-title">Description</label>
                        <div class="col-sm-9">
                            <textarea name="description" id="description" class="form-control" placeholder="" rows="8"></textarea>		
                        </div>
                    </div>
                    <input type="hidden" id="csrf_token" value="{{csrf_token()}}">
                    <div class="buttons pull-right">
                        <input type="submit" name="btn-sub" class="btn btn-primary" value="save" id="btn-sub">
                    </div>								

                </form>
            </div>
        </div>
    </div>
</div>
</section>

<script type="text/javascript">	
    function company1(){

		$.get("{{ route('company_show') }}",function(data){

			$('#company_profile2').empty().append(data);
		});
	}	

	company1();

	$(document).on('submit','#company_profile_create',function(e){

		e.preventDefault();

		var company_name = $('#company_name').val();
		var public_url = $('#public_url').val();
		var website = $('#website').val();
		var company_tagline = $('#company_tagline').val();
		var description = $('#description').val();
		var city = $('#city').val();
		var state = $('#state').val();
		var industry_id = $('#industry_id').val();
		var company_type_id = $('#company_type_id').val();
		var company_size_id = $('#company_size_id').val();
		
                var csrf_token = $('#csrf_token').val();
             //alert(company_types_id);

               
                $.post("{{ route('company_create') }}",{ _token:csrf_token,company_name:company_name,website:website,state:state,city:city,public_url:public_url,company_tagline:company_tagline,industry_id:industry_id,description:description,company_type_id:company_type_id,company_size_id:company_size_id},function(data){
                        if(data['error'] == true){
                            alert(data['message']);                    
                        } else{
                        
                        $('#company_profile_create').trigger('reset');
			$('#company_profile_add').modal('hide');
                        alert(data);
	company1();
    }                
		});
	});

	$(document).on('click','#company_edit',function(e){

		e.preventDefault();
                $('#company_profile_add').modal('handleUpdate');
       //         alert(n);

		$.get("{{ route('company_edit') }}",function(data){
                        //alert(company_name);
			$('#company_name').val(data.company_name);
			$('#public_url').val(data.public_url);
			$('#website').val(data.website);
			$('#state').val(data.states_id);
			$('#city').val(data.cities_id);
			$('#company_tagline').val(data.company_tagline);
			$('#description').val(data.description);
			$('#industry_id').val(data.industry_id);
			$('#company_size_id').val(data.company_size_id);
			$('#company_type_id').val(data.company_type_id);
			
		});
	});

        $(document).on('click','.education_delete',function(e){
            e.preventDefault();
            var education_id = $(this).data('education_id');
            if(confirm('Are you sure you want delete this education?')) {
            $.get("{{ route('education_delete') }}",{ education_id:education_id}, function(data){
            alert(data);        
           $('#msg').empty().append(data);     
         education1();  
            });}else{
            return false;
            }
        });
        
        
        
        
        
</script>
@endsection