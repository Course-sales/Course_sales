@if(!empty($course->lessons()->whereNull('parent_id')->count()))
    @php $moduleIndex = 1; @endphp
    @foreach ($course->lessons()->whereNull('parent_id')->orderBy('position')->get() as $key => $module)
        @if($module->parent_id == NULL)
            <div class="accordion-group">
                <h4 class="accordion-title {{$key == 0 ? 'active' : ''}}">Module {{$moduleIndex++}}: {{$module->name}}</h4>
                <div class="accordion-detail" style="{{$key == 0 ? 'display:block' : ''}}">
                @php $lessonIndex = 1; @endphp
                    @foreach($course->lessons()->whereNotNull('parent_id')->orderBy('position')->get() as $lesson)
                        @if($lesson->parent_id == $module->id)
                            <div class="card-accordion">
                                <div>
                                    <i class="fa-brands fa-youtube pe-2"></i>
                                    @auth('students')
                                    @if($myCourse)
                                        <a class="text-dark" href="{{ route('client.lesson.index', $lesson->slug) }}"> Lesson {{$lessonIndex ++}}: 
                                            {{$lesson->name}}
                                        </a>
                                    @else
                                        <a class="text-dark" href="#">Lesson {{$lessonIndex ++}}:
                                            {{$lesson->name}}
                                        </a>
                                    @endif
                                @else
                                    <a class="text-dark" href="#" onclick="alert('Vui lòng đăng nhập để xem bài giảng'); return false;">Lesson {{$lessonIndex ++}}:
                                        {{$lesson->name}}
                                    </a>
                                @endauth
                                    {!! $lesson->is_trial == 1 ? '<p class="is_trial" data-id="'.$lesson->id.'">Trial</p>' : '' !!}
                                    <span>{{getTimeDuration($lesson->durations)}}</span>
                                </div>
                            </div>
                        @endif
                    @endforeach
                </div>
            </div>
        @endif
    @endforeach
@endif