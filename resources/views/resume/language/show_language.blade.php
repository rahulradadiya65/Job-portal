 <ul class="list-inline">
        @foreach ($language as $language)
        <li>
            <h5>{{$language->languages_names}}<a class="language_delete uppercase btn" data-languages_id="{{encrypt($language->languages_id)}}">×</a></h5>
        </li>
        @endforeach
 </ul>
				    
				

