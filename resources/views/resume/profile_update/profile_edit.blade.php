<div class="profile-details section">
    <h2>Profile Details</h2>
    <form action="#">
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
    </form>				
</div><!-- profile-details -->