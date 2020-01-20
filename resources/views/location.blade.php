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
                <option value="{{ old('city') }}">-- Select City --</option>
            </select>								
        </div>
    </div>
</div>
