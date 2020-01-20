
<div class="language-proficiency section" >
    <div class="icons">
        <i class="fa fa-language" aria-hidden="true"></i>
    </div>
        <div class="proficiency">
<H3>Add Language<span> <a href="#add_language" ID="submit" class="btn pull-right" data-toggle="modal" data-target="#add_language"><i class="fa fa-plus fa-2x"></i></a></span></h3>
<div id="show_language"></div>
        </div>
                                
<div id="add_language" class="modal fade" role="dialog">
    <div class="modal-dialog">

        <!-- Modal content-->
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">×</button>
                <h3 class="modal-title text-center primecolor">Add Language</h3>
            </div>
            <div class="modal-body" style="overflow: hidden;">
         <div class="col-md-offset-1 col-md-10">

                    <form   id="language_create">

                        <input type="hidden" name="Language_id" value="" id="language_id">
                        
                        <div class="row form-group job-description">
                            <label class="col-sm-3 label-title">Language</label>
                            <div class="col-sm-9">
                                <select name="languages_names_id" value="" id="languages_names_id" class="form-control input-lg dynamic" >
                                    <option value="">Select a language</option>
                                    @foreach($language_name as $language_name) 
                                    <option value="{{ encrypt($language_name->languages_names_id) }}">{{ $language_name->languages_names }}</option>
                                    @endforeach								
                                </select>		
                            </div>
                        </div>
                        <input type="hidden" id="csrf_token" value="{{csrf_token()}}">
                        <div class="buttons pull-right">
                            <input type="submit" name="btn-sb" value="Save" id="btn-sb">
                        </div>										
                    </form>

                </div>
            </div>
        </div>  

    </div>
    
</div>

</div><!-- Language --><!-- language-proficiency -->	
	
<script type="text/javascript">	
	function language1(){
                        $.get("{{ route('language_show') }}",function(data){
                        $('#show_language').empty().append(data);
		});
	}	

	language1();
        
	
	$(document).on('submit','#language_create',function(e){
                //alert(all);
		e.preventDefault();
		var languages_names_id = $('#languages_names_id').val();
		var languages_id = $('#languages_id').val();
                var csrf_token = $('#csrf_token').val();
		
       //alert(languages_names_id);
        $.post("{{ route('language_create') }}",{ _token:csrf_token, languages_id:languages_id,languages_names_id:languages_names_id},function(data){
			$('#msg').empty().append(data);			
                        $('#language_create').trigger('reset');
			$('#add_language').modal('hide');
			language1();
		});
	});
        $(document).on('click','.language_delete',function(e){
            e.preventDefault();
            var languages_id = $(this).data('languages_id');
            if(confirm('Are you sure you want delete this language?')) {
            //alert(languages_id);
            $.get("{{ route('language_delete') }}",{ languages_id:languages_id}, function(data){
            //alert(data);        
           $('#msg').empty().append(data);
               language1();  
            });}else{
            return false;
            }
        });
</script>        
