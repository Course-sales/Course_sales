@extends('layouts.client')
@section('content')
<section class="video">
    <div class="container">
        <h3>{{$lesson->name}}</h3>
        <div class="row">
            <div class="col-12 col-lg-8">
                <div class="video-detail">
                    <video src="{{$lesson->video->url}}" width="100%" height="350" type="video/mp4" controls></video>
                </div>
                <div class="d-flex justify-content-between mt-3">
                    <div>
                        @if($prevLesson)
                            <a href="{{route('client.lesson.index', $prevLesson->slug)}}" class="prev text-white">Previous</a>
                        @endif
                    </div>
                    <div>
                        @if($nextLesson)
                            <a href="{{route('client.lesson.index', $nextLesson->slug)}}" class="prev text-white">Next</a>
                        @endif
                    </div>
                </div>
            </div>
            <div class="col-12 col-lg-4">
                <div class="nav flex">
                    <p class="lesson active">Lesson</p>
                    <p class="document">Document</p>
                </div>
                <div class="group">
                    <div class="accordion active title">
                        @include('Lesson::clients.modules_lessons')
                    </div>
                    <div class="document-title title">
                        @include('Lesson::clients.document')
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection