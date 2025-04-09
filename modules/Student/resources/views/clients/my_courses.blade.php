@extends('layouts.client')
@section('content')
@include('parts.clients.sub_header')
<section class="all-course py-2">
    <div class="container">
        <div class="row">
            <div class="col-3">
                @include('Student::clients.menu')
            </div>
            <div class="col-9">
                <h2 class="py-2">My Courses</h2>
                <form action="" class="mb-3">
                    <div class="row">
                        <div class="col-3">
                            <select name="teacher_id" class="form-select">
                                <option value="">All Teachers</option>
                                @foreach ($teachers as $teacher)
                                    <option value="{{$teacher->id}}" {{request()->teacher_id == $teacher->id ? 'selected': ''}}>{{$teacher->name}}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="col-7">
                            <input type="search" name="keyword" class="form-control" placeholder="Course Name..." value="{{request()->keyword}}" />
                        </div>
                        <div class="col-2 d-grid">
                            <button class="btn btn-primary">Search</button>
                        </div>
                    </div>
                </form>
                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <th width="5%">No.</th>
                            <th>Name</th>
                            <th width="25%">Teacher</th>
                            <th width="15%">Status</th>
                            <th width="10%">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($courses as $key => $course)
                        <tr>
                            <td>{{$key + 1}}</td>
                            <td><a href="{{route('client.course.detail',$course->slug)}}">{{$course->name}}</a></td>
                            <td><a href="#">{{$course->teacher->name}}</a></td>
                            <td>{!!$course->pivot->status ? '<span class="badge bg-success">Active</span>': '<span class="badge bg-danger">Locked</span>'!!}</td>
                            <td class="d-grid">
                                <a href="{{route('client.course.detail', $course->slug)}}" class="btn btn-outline-primary btn-sm">Enter Course</a>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
                {{$courses->links()}}
            </div>
        </div>
    </div>
</section>
@endsection
