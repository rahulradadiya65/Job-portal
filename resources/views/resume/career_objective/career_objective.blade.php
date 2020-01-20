<div class="career-objective section">

    <div class="icons">
        <i class="fa fa-black-tie" aria-hidden="true"></i>
    </div>			          
    <h3>Add Career Objective<span> <a href="#career_objectives_add" ID="submit" class="career_objectives_edit btn pull-right" data-toggle="modal" data-target="#career_objectives_add"><i class="fa fa-pencil fa-2x"></i></a></span></h3>
    <hr>
    <div class="career-info" id="show_career_objectives"></div>
</div><!-- Declaration -->
<div id="career_objectives_add" class="modal fade" role="dialog">
    <div class="modal-dialog">
        <!-- Modal content-->
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">×</button>
                <h3 class="modal-title text-center primecolor">Add Career Objective</h3>
            </div>
            <div class="modal-body" style="overflow: hidden;">
                <div class="col-md-offset-1 col-md-10">

                    <form   id="career_objectives_create">

                        <div class="row form-group job-description">
                            <label class="col-sm-3 label-title">Career Objective</label>
                            <div class="col-sm-9">
                                <textarea class="form-control" ID="career_objectives" name="career_objectives" placeholder="" rows="8"></textarea>		
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

<script type="text/javascript">
    
    function career_objectives1(){

        $.get("{{ route('career_objective_show') }}", function (data) {

            $('#show_career_objectives').empty().append(data);
        });
    }
    career_objectives1();

    $(document).on('submit', '#career_objectives_create', function (e) {
        //alert(experiences_id);
        e.preventDefault();
        var career_objectives = $('#career_objectives').val();
        var career_objectives_id = $('#career_objectives_id').val();
        var csrf_token = $('#csrf_token').val();


        $.post("{{ route('career_objective_create') }}", {_token: csrf_token, career_objectives_id: career_objectives_id, career_objectives: career_objectives}, function (data) {
                if(data['error'] == true){
                            alert(data['message']);
                        }else{
            $('#career_objectives_create').trigger('reset');
            $('#career_objectives_add').modal('hide');
            alert(data);
        career_objectives1();           
    }
        });

    });

    $(document).on('click', '.career_objectives_edit', function (e) {
        e.preventDefault();
        $('#career_objectives_add').modal('handleUpdate');

        $.get("{{ route('career_objective_edit') }}", function (data) {

            $('#career_objectives').val(data.career_objectives);
            $('#user_id').val(data.user_id);
        });


    });

</script>
