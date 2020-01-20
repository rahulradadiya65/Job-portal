<div class="educational-background section">
    <div class="icons">
        <i class="fa fa-graduation-cap" aria-hidden="true"></i>
    </div>	
    <div class="educational-info">
        <H3>Education Background<span><a href="#education_add" class="pull-right  btn" data-toggle="modal" data-target="#education_add"><i class="fa fa-plus fa-2x"></i></a></span></h3>
<hr>
        <div id="education2"></div>
</div><!-- section -->
</div><!-- work-history -->

<div id="education_add" class="modal fade" role="dialog">
    <div class="modal-dialog">

    <!-- Modal content-->
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">×</button>
                <h3 class="modal-title text-center primecolor">Add new Education</h3>
            </div>
            <div class="modal-body" style="overflow: hidden;">
              
                <div class="col-md-offset-1 col-md-10">
                 <form id="education_create">
                     <div class="row form-group">
                        <input type="hidden" id="csrf_token" value="{{csrf_token()}}">
                        <input type="hidden" name="education_id"  id="education_id">
                            <label class="col-sm-3 label-title">Institute Name</label>
                            <div class="col-sm-9">
                                <input type="text" name="institutename" id="institutename" class="form-control" placeholder="Institute Name">
                            </div>
                        </div>
                        <div class="row form-group">
                            <label class="col-sm-3 label-title">Degree</label>
                            <div class="col-sm-9">
                                <input type="text" name="degree" id="degree" class="form-control" placeholder="MBA">
                            </div>
                        </div>
                        <div class="row form-group">
                            <label class="col-sm-3 label-title">Result</label>
                            <div class="col-sm-9">
                                <input type="text" name="result" id="result" class="form-control" placeholder="4.00">
                            </div>
                        </div>
                        <div class="row form-group time-period">
                            <label class="col-sm-3 label-title">Time Period</label>
                            <div class="col-sm-9">
                                <input name="education_start_date" id="education_start_date" class="form-control calendar" placeholder="dd/mm/yy"><span>-</span>
                                <input name="education_end_date" class="form-control calendar" id="education_end_date"  value="" placeholder="yyyy/mm/dd">
                              <label for="device-9102" class="form-partner-label"><input type="checkbox" class="quote-chkbox" id="current_studay">Currently Working Here</label>
                            </div>
                        </div>
                        <div class="row form-group job-description">
                            <label class="col-sm-3 label-title">Description</label>
                            <div class="col-sm-9">
                                <textarea name="description" id="description" class="form-control" placeholder="" rows="8"></textarea>		
                            </div>
                        </div>
                        <div class="buttons pull-right">
                            <input type="submit" name="btn-sub" value="save" id="btn-sub">
                        </div>								
                    </form>
                </div>
            </div>
        </div>
</div>
</div>

<script type="text/javascript">	
  $(function(){
        $("#current_studay").change(function(){
            var is_checked = $(this).is(":checked");
            if(!is_checked){
            $("#education_end_date").prop("value");   
            $("#education_end_date").prop("disabled",false);
        }
            else
            {
            $("#education_end_date").val(null);
            $("#education_end_date").prop("disabled",true);
            }
        });
        
    });  
    
    
    
	function education1(){

		$.get("{{ route('education_show') }}",function(data){

			$('#education2').empty().append(data);
		});
	}	

	education1();

	$(document).on('submit','#education_create',function(e){

		e.preventDefault();

		var institutename = $('#institutename').val();
		var degree = $('#degree').val();
		var education_start_date = $('#education_start_date').val();
		var education_end_date = $('#education_end_date').val();
		var description = $('#description').val();
		var result = $('#result').val();
		var user_id = $('#user_id').val();
		var education_id = $('#education_id').val();
                var csrf_token = $('#csrf_token').val();
               // alert(all);

               
                $.post("{{ route('education_create') }}",{ _token:csrf_token, education_id:education_id,institutename:institutename,result:result,degree:degree,education_start_date:education_start_date,education_end_date:education_end_date,description:description,user_id:user_id },function(data){
                        if(data['error'] == true){
                            alert(data['message']);
                        }else{
                        $('#education_create').trigger('reset');
			$('#education_add').modal('hide');
                        alert(data);
	education1();
                        }
		});
	});

	$(document).on('click','.education_edit',function(e){

		e.preventDefault();
                $('#education_add').modal('show');
		var education_id = $(this).data('education_id');
                
                alert(education_id);

		$.get("{{ route('education_edit') }}",{ education_id:education_id },function(data){
                        
                        
			$('#institutename').val(data.institutename);
			$('#degree').val(data.degree);
			$('#education_start_date').val(data.education_start_date);
			$('#education_end_date').val(data.education_end_date);
			$('#description').val(data.description);
			$('#result').val(data.result);
			$('#user_id').val(data.user_id);
			$('#education_id').val(data.education_id);
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