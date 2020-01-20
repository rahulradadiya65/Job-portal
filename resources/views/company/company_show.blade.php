<div class="section company-info">
@foreach($company_data as $company_data)
    <ul>
        <li><b>Company Name:</b> <a>{{$company_data->company_name}}</a></li>
        <li><b>Location:</b> <a>{{$company_data->city->city}},{{$company_data->state->state}}</a></li>
        <li><b>Company Size: </b><a> {{$company_data->company_size->company_size_name}}</a></li>
        <li><b>Company Size: </b><a> {{$company_data->company_type->company_type_name}}</a></li>
        <li><b>Industry:</b> <a>{{$company_data->company_industry->industry_name}}</a></li>
        <li><b>Website:</b> <a>{{$company_data->website}}</a></li>
        <li><b>Description:</b> <a>{{$company_data->description}}</a></li>
    </ul>
@endforeach
</div>

