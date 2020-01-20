            @foreach($experience as $experience1)
            <ul>
                <li>
                    <h4>{{$experience1->designation}} @ {{$experience1->companyname}} <a class="experiences_delete pull-right btn" data-experiences_id="{{encrypt($experience1->experiences_id)}}"><i class="fa fa-trash fa-2x"></i></a><a class="experience_edit pull-right btn" data-experiences_id="{{encrypt($experience1->experiences_id)}}"><i class="fa fa-edit fa-2x"></i></a>
                        <span>{{$experience1->experiences_start_date}} - 
                            @if($experience1->experiences_end_date == null)
                            Present
                            @else
                            {{$experience1->experiences_end_date}}
                            @endif
                        </span></h4>
                    <p>{{$experience1->jobdescription}}</p> 
                    <hr>
                </li>
            </ul>			        	
            @endforeach
 