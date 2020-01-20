@foreach($education as $education)
<ul>
<li>
    <h4>{{$education->degree}} @ {{$education->institutename}}<a class="education_delete pull-right btn" data-education_id="{{encrypt($education->education_id)}}"><i class="fa fa-trash fa-2x"></i></a><a class="education_edit pull-right btn" data-education_id="{{encrypt($education->education_id)}}"><i class="fa fa-edit fa-2x"></i></a></h4>
    <ul>
        <li>Year: <span>{{$education->education_start_date}} - 
                @if($education->education_end_date == null)
                Present
                @else
                {{$education->education_end_date}}
                @endif</span> </li> <li>Result: <span>{{$education->result}}</span></li>
    </ul>
    <p>{{$education->description}}</p>
</li> 
</ul>
<hr>
@endforeach
