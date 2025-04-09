@extends('layouts.client')
@section('content')
@include('parts.clients.banner')
@if(count($mycourses) > 0)
<section class="foundation-course">
    <div class="container padding">
        <h3>My courses</h3>
        <div class="row">
                @foreach($mycourses as $course)
                    <div class="col-12 col-lg-6">
                        <div class="d-flex course">
                            <div class="banner-course">
                                <img src="{{$course->thumbnail}}" alt="{{$course->name}}" />
                            </div>
                            <div class="descreption-course">
                                <div class="descreption-top">
                                    <p><i class="fa-solid fa-clock"></i>{{getHourDuration($course->durations)}}</p>
                                    <p><i class="fa-solid fa-video"></i>{{getLessonCount($course)->modules}} parts/{{getLessonCount($course)->lessons}} lessons</p>
                                    <p><i class="fa-solid fa-eye"></i>{{number_format($course->view) ?? 0}}</p>
                                </div>
                                <h5 class="descreption-title">
                                    <a href="{{route('client.course.detail', $course->slug)}}">
                                        {{$course->name}}
                                    </a>
                                    {{-- <a href="{{route('client.lesson.index', $course->lessons[1]->slug)}}">
                                        {{$course->name}}
                                    </a> --}}
                                </h5>
                                <div class="descreption-teacher">
                                    <img src="{{$course->teacher?->image}}" alt="{{$course->teacher?->name}}" />
                                    <span>{{$course->teacher?->name}}</span>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
        </div>
    </div>
</section>
@endif
@if(count($basicCourses) > 0)
<section class="intensive-course">
    <div class="container padding">
        <h3>Basic course</h3>
        <div class="row">
            @foreach($basicCourses as $course)
                <div class="col-12 col-lg-6">
                    <div class="d-flex course">
                        <div class="banner-course">
                            <img src="{{$course->thumbnail}}" alt="{{$course->name}}" />
                        </div>
                        <div class="descreption-course">
                            <div class="descreption-top">
                                <p><i class="fa-solid fa-clock"></i>{{getHourDuration($course->durations)}}</p>
                                <p><i class="fa-solid fa-video"></i>{{getLessonCount($course)->modules}} parts/{{getLessonCount($course)->lessons}} lessons</p>
                                <p><i class="fa-solid fa-eye"></i>{{number_format($course->view) ?? 0}}</p>
                            </div>
                            <h5 class="descreption-title">
                                <a href="{{route('client.course.detail', $course->slug)}}">
                                    {{$course->name}}
                                </a>
                            </h5>
                            <div class="descreption-teacher">
                                <img src="{{$course->teacher?->image}}" alt="{{$course->teacher?->name}}" />
                                <span>{{$course->teacher?->name}}</span>
                            </div>
                            <p class="descreption-price">
                                @if($course->sale_price > 0)
                                    <span class="sale">{{money($course->price)}}</span>
                                    <span class="sale_price">{{money($course->sale_price)}}</span>
                                @else
                                <span class="sale_price">{{money($course->price)}}</span>
                                @endif
                            </p>
                        </div>
                    </div>
                </div>
            @endforeach
    </div>
    </div>
</section>
@endif
@if(count($advanceCourses) > 0)
<section class="intensive-course">
    <div class="container padding">
        <h3>Advanced course</h3>
        <div class="row">
            @foreach($advanceCourses as $course)
                <div class="col-12 col-lg-6">
                    <div class="d-flex course">
                        <div class="banner-course">
                            <img src="{{$course->thumbnail}}" alt="{{$course->name}}" />
                        </div>
                        <div class="descreption-course">
                            <div class="descreption-top">
                                <p><i class="fa-solid fa-clock"></i>{{getHourDuration($course->durations)}}</p>
                                <p><i class="fa-solid fa-video"></i>{{getLessonCount($course)->modules}} parts/{{getLessonCount($course)->lessons}} lessons</p>
                                <p><i class="fa-solid fa-eye"></i>{{number_format($course->view) ?? 0}}</p>
                            </div>
                            <h5 class="descreption-title">
                                <a href="{{route('client.course.detail', $course->slug)}}">
                                    {{$course->name}}
                                </a>
                            </h5>
                            <div class="descreption-teacher">
                                <img src="{{$course->teacher?->image}}" alt="{{$course->teacher?->name}}" />
                                <span>{{$course->teacher?->name}}</span>
                            </div>
                            <p class="descreption-price">
                                @if($course->sale_price > 0)
                                    <span class="sale">{{money($course->price)}}</span>
                                    <span class="sale_price">{{money($course->sale_price)}}</span>
                                @else
                                <span class="sale_price">{{money($course->price)}}</span>
                                @endif
                            </p>
                        </div>
                    </div>
                </div>
            @endforeach
    </div>
    </div>
</section>
@endif

@include('parts.clients.question')
@include('parts.clients.partner')
@include('parts.clients.about_us')
@endsection