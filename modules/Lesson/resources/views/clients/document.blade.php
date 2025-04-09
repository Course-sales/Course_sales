@if($lesson->document) 
    <ul class="list-group mt-2">
        <li class="list-group-item"><a href="{{$lesson->document->url}}" target="_blank">{{$lesson->document->name}}</a></li>
    </ul>
@endif