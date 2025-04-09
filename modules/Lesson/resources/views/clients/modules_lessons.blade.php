@php $moduleIndex = 1; @endphp
@foreach ($course->lessons()->whereNull('parent_id')->orderBy('position')->get() as $key => $module)
@if($module->parent_id == NULL)
    <div class="accordion-group">
        <h4 class="accordion-title {{$module->id == $lesson->parent_id ? 'active' : ''}}">Module {{$moduleIndex++}}: {{$module->name}}</h4>
        <div class="accordion-detail" style="{{$module->id == $lesson->parent_id ? 'display:block' : ''}}">
            @php $lessonIndex = 1; @endphp
            @foreach($course->lessons()->whereNotNull('parent_id')->orderBy('position')->get() as $item)
                @if($item->parent_id == $module->id)
                    <div class="card-accordion px-2">
                        <div class="align-items-start">
                            <i class="fa-brands fa-youtube"></i>
                            <a class="text-dark" href="{{route('client.lesson.index', $item->slug)}}">Lesson {{$lessonIndex++}}: {{$item->name}}</a>
                        </div>
                    </div>
                @endif
            @endforeach
        </div>
    </div>
@endif
@endforeach