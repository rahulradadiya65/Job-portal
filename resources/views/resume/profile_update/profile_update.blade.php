

<div class="profile job-profile">
    <div class="user-pro-section">
        <!-- profile-details -->
        <div class="profile-details section">
            <h2>Profile Details</h2>
            <form id="Profile_detail_update">
                @csrf
                <div class="form-group">
                    <label>Username</label>
                    <input type="text" id="name" value="{{$user_data->name}}" name="name" class="form-control text-black" placeholder="Jhon Doe">
                </div>

                <div class="form-group">
                    <label>Email ID</label>
                    <input type="email" id="email" name="email" value="{{$user_data->email}}" class="form-control" placeholder="jhondoe@mail.com">
                </div>

                <div class="form-group">
                    <label>Mobile</label>
                    <input type="text" id="mobile_number" name="mobile_number" value="{{$user_data->mobile_number}}" class="form-control" placeholder="+213 1234 56789">
                </div>
                <input type="hidden" id="csrf_token" value="{{csrf_token()}}">
                <div class="buttons pull-right">
                    <input type="submit" class="btn btn-primary" name="btn-sb" value="Save"  id="btn-sb">
                </div>										
            </form>				
        </div><!-- profile-details -->

        <!-- change-password -->
        <div class="change-password section">
            <h2>Change password</h2>
            <form id="password_update">
                @csrf
                <div class="form-group">
                    <label>Old Password</label>
                    <input type="text" id="old_password" value="" name="old_password" class="form-control text-black" placeholder="Old Password">
                </div>

                <div class="form-group">
                    <label>New password</label>
                    <input type="text" id="new_password" name="new_password"  class="form-control" placeholder="New password">
                </div>
                
                <div class="form-group">
                    <label>Confirm password</label>
                    <input type="text" id="confirm_password" name="confirm_password" class="form-control" placeholder="Confirm Password">
                </div>
                <input type="hidden" id="csrf_token" value="{{csrf_token()}}">
                <div class="buttons pull-right">
                    <input type="submit" class="btn btn-primary" name="btn-sb" value="Save"  id="btn-sb">
                </div>										
            </form>
            	
        </div><!-- change-password -->

        <!-- preferences-settings -->
        <div class="preferences-settings section">
            <h2>Preferences Settings</h2>
            <!-- checkbox -->
            <div class="checkbox">
                <label><input type="checkbox" name="logged">Comments are enabled on my Resume</label>
                <label><input type="checkbox" name="receive">I want to receive newsletter.</label>
                <label><input type="checkbox" name="want">I want to receive advice on portfolio</label>
            </div><!-- checkbox -->

            <div class="buttons">
                <a href="#" class="btn">Update Profile</a>
                <a href="#" class="btn cancle">Cancle</a>
            </div>												
        </div><!-- preferences-settings -->
    </div><!-- user-pro-edit -->
</div>				
</div><!-- container -->
</section><!-- ad-profile-page -->

<script type="text/javascript">
$(document).on('submit','#Profile_detail_update',function(e){

		e.preventDefault();
		var name = $('#name').val();
		var email = $('#email').val();
		var mobile_number = $('#mobile_number').val();
                var csrf_token = $('#csrf_token').val();

		$.get("{{ route('Profile_detail_update') }}",{ _token:csrf_token,name:name,email:email,mobile_number:mobile_number },function(data){
                         if(data['error'] == true){
                            alert(data['message']);                    
                        } else{               
			$('#msg').empty().append(data);
                        alert('data has been successfully updated.');
			$('#Profile_detail_update').trigger('update');
                        
                    }
		});
	});	

$(document).on('submit','#password_update',function(e){

		e.preventDefault();
		var confirm_password = $('#confirm_password').val();
		var new_password = $('#new_password').val();
		var old_password = $('#old_password').val();
                var csrf_token = $('#csrf_token').val();
		$.get("{{ route('password_update') }}",{ _token:csrf_token,old_password,new_password:new_password,confirm_password:confirm_password },function(data){
                         if(data['error'] == true){
                            alert(data['message']);                    
                        } else{               
			$('#msg').empty().append(data);
                        alert('Password has been successfully updated.');
			$('#password_update').trigger('update');
                        
                    }
		});
	});


</script>
