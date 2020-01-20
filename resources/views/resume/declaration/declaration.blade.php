<div class="declaration section">
 
        <div class="icons">
            <i class="fa fa-hand-peace-o" aria-hidden="true"></i>
        </div>			          
    <h3>Add Declaration<span> <a href="#declaration_add" ID="submit" class="btn pull-right" data-toggle="modal" data-target="#declaration_add"><i class="fa fa-pencil fa-2x"></i></a></span></h3>
<hr>
<div id="show_declaration"></div>
</div><!-- Declaration -->
<div id="declaration_add" class="modal fade" role="dialog">
    <div class="modal-dialog">
        <!-- Modal content-->
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">×</button>
                <h3 class="modal-title text-center primecolor">Add Declaration</h3>
            </div>
            <div class="modal-body" style="overflow: hidden;">
         <div class="col-md-offset-1 col-md-10">

                    <form   id="create_declaration">

                        <input type="hidden" name="declarations_id" value="" id="declarations_id">
                        
                        <div class="row form-group job-description">
                            <label class="col-sm-3 label-title">Declaration</label>
                            <div class="col-sm-9">
                              <textarea class="form-control" ID="declaration" name="declaration" placeholder="" rows="8"></textarea>		
                            </div>
                        </div>
                        <input type="hidden" id="csrf_token" value="{{csrf_token()}}">
                        <div class="buttons pull-right">
                            <input type="submit" name="btn-sb" value="Save" id="btn-sb">
                            <a href="#" class="btn delete">Delete</a>
                        </div>										
                    </form>

                </div>
            </div>
        </div>  

    </div>
</div>

<script type="text/javascript">	
	function showDetails(){

		$.get("{{ route('declaration_show') }}",function(data){

			$('#show_declaration').empty().append(data);
		});
	}	

	showDetails();

	$(document).on('submit','#create_declaration',function(e){
                //alert(experiences_id);
		e.preventDefault();
		var declaration = $('#declaration').val();
		var declarations_id = $('#declarations_id').val();
                var csrf_token = $('#csrf_token').val();
		
         
        $.post("{{ route('declaration_create') }}",{ _token:csrf_token, declarations_id:declarations_id,declaration:declaration},function(data){
	if(data['error'] == true){
                            alert(data['message']);
                        }else{					
                        $('#create_declaration').trigger('reset');
			$('#declaration_add').modal('hide');
		alert(data);
        showDetails();
    }
		});
	});

	$(document).on('click','.declaration_edit',function(e){
                e.preventDefault();
                $('#add_declaration').modal('handleUpdate');
		
		$.get("{{ route('declaration_edit') }}",function(data){
                        
			$('#declaration').val(data.declaration);
			$('#user_id').val(data.user_id);
		});
                

	});

</script>

                                