


<div class="work-history section">
    <div class="icons">
        <i class="fa fa-briefcase" aria-hidden="true"></i>
    </div>   
<div class="work-info">
    <div id="message" class="success"></div>
<H3>Add Experience<span><a href="#experience_add" ID="submit" class="btn pull-right" data-toggle="modal" data-target="#experience_add"><i class="fa fa-plus fa-2x"></i></a></span></h3>
	</div><!-- section -->
        <hr>
        <div id="ajaxSection"></div>
           
</div><!-- work-history -->


<div id="experience_add" class="modal fade" role="dialog">
    <div class="modal-dialog">

        <!-- Modal content-->
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">×</button>
                
                <h3 class="modal-title text-center primecolor" > Add/Edit new Exprince</h3>
            </div>
        <div id="message"></div>     
            <div class="modal-body" style="overflow: hidden;">
                <div class="alert alert-danger print-error-msg" style="display:none"><ul></ul></div>
                <div class="col-md-offset-1 col-md-10">

                    <form   id="experience_create">
                        
                        <input type="hidden" name="experiences_id" value="" id="experiences_id">
                        <div class="row form-group">
                            <label class="col-sm-3 label-title">Compnay Name</label>
                            <div class="col-sm-9">
                               <input type="text" name="companyname" id="companyname" class="form-control" placeholder="Company Name">
                            </div>
                        </div>
                        <div class="row form-group">
                            <label class="col-sm-3 label-title">Designation</label>
                            <div class="col-sm-9">
                              <input type="text" name="designation" id="designation" class="form-control" placeholder="Human Resource Manager">
                            </div>
                        </div>
                        <div class="row form-group select-price ">
                            <label class="col-sm-3 label-title">Time Period</label>
                            <div class="col-sm-9">
                              <input name="experiences_start_date" id="experiences_start_date" class="form-control calendar" placeholder="yyyy/mm/dd"><span>-</span>
                              <input name="experiences_end_date" class="form-control calendar" id="experiences_end_date"  value="" placeholder="yyyy/mm/dd">
                              <label for="device-9102" class="form-partner-label"><input type="checkbox" class="quote-chkbox" id="current_working">Currently Working Here</label>
                            </div>
                        </div>
                        <div class="row form-group job-description">
                            <label class="col-sm-3 label-title">Job Description</label>
                            <div class="col-sm-9">
                              <textarea class="form-control" ID="jobdescription" name="jobdescription" placeholder="" rows="8"></textarea>		
                            </div>
                        </div>
                    
                   
                    <input type="hidden" id="csrf_token" value="{{csrf_token()}}">
                        <div class="buttons pull-right">
                            <input type="submit" class="btn" name="btn-sb" value="Save"  id="btn-sb">
                           
                        </div>										
                    </form>

                </div>
            </div>
        </div>  

    </div>
</div>
                                                                
<hr>


<script type="text/javascript">	
    

$(function(){
        $("#current_working").change(function(){
            var is_checked = $(this).is(":checked");
            if(!is_checked){
            $("#experiences_end_date").prop("value");   
            $("#experiences_end_date").prop("disabled",false);
        }
            else
            {
            $("#experiences_end_date").val(null);
            $("#experiences_end_date").prop("disabled",true);
            }
        });
        
    });

	function experiences(){

		$.get("{{URL::to('experience_show') }}",function(data){

			$('#ajaxSection').empty().append(data);
		});
	}	

	experiences();

	$(document).on('submit','#experience_create',function(e){
                //alert(experiences_id);
        e.preventDefault();
		var companyname = $('#companyname').val();
		var designation = $('#designation').val();
		var experiences_start_date = $('#experiences_start_date').val();
		var experiences_end_date = $('#experiences_end_date').val();
		var jobdescription = $('#jobdescription').val();
		var user_id = $('#user_id').val();
		var experiences_id = $('#experiences_id').val();
                var csrf_token = $('#csrf_token').val();
//          alert(experiences_end_date);
//        alert(current_working);
        $.post("{{URL::to('experience_create') }}",{ _token:csrf_token, experiences_id:experiences_id,companyname:companyname,designation:designation,experiences_start_date:experiences_start_date,experiences_end_date:experiences_end_date,jobdescription:jobdescription,user_id:user_id },function(data){ 
                        if(data['error'] == true){
                            alert(data['message']);                    
                        } else{
			$('#experience_create').trigger('reset');
			$('#experience_add').modal('hide');
                        alert(data);     
        experiences();      
    }
    });
    
 }); 

	$(document).on('click','.experience_edit',function(e){

		e.preventDefault();
                $('#experience_add').modal('show');
		var experiences_id = $(this).data('experiences_id');
                    
		$.get("{{route('experience_edit') }}",{ experiences_id:experiences_id },function(data){
			$('#companyname').val(data.companyname);
			$('#designation').val(data.designation);
			$('#experiences_start_date').val(data.experiences_start_date);
			$('#experiences_end_date').val(data.experiences_end_date);
			$('#jobdescription').val(data.jobdescription);
			$('#user_id').val(data.user_id);
			$('#experiences_id').val(data.experiences_id);
		});
	});
        
        $(document).on('click','.experiences_delete',function(e){
            e.preventDefault();
            var experiences_id = $(this).data('experiences_id');
            if(confirm('Are you sure you want delete this experience?')) {
            $.get("{{URL::to('experience_delete') }}",{ experiences_id:experiences_id}, function(data){
            alert(data);        
           $('#msg').empty().append(data);
                
               experiences();  
            });}else{
            return false;
            }
        });
</script>
