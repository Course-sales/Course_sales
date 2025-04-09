@extends('layouts.backend')
@section('content')
@if(session('msg'))
    <div class="alert alert-success text-center">
        {{ session('msg') }}
    </div>
@endif
<div class="row">
    <div class="col">
        <p><a href="{{route('admin.students.index')}}" class="btn btn-success btn-sm cus_success_btn">List of student</a></p>
    </div>
</div>
<form method="POST">
    <div class="row">
        @csrf
        <div class="col-6 form-group">
            <label for="">Status</label>
            <select name="status" id="status" class="form-control">
                <option value="0" {{$student->status == 0 ? 'selected' : ''}}>Not activated</option>
                <option value="1" {{$student->status == 1 ? 'selected' : ''}}>Activated</option>
            </select>
        </div>
        <div class="col-6 form-group">
            <label for="">Name</label>
            <input type="text" class="form-control" name="name" value="{{$student->name}}" placeholder="Enter name ...">
        </div>
            
        <div class="col-6 form-group">
            <label for="">Phone</label>
            <input type="text" class="form-control" name="phone" value="{{$student->phone}}" placeholder="Enter phone ...">
        </div>
        <div class="col-6 form-group">
            <label for="">Email</label>
            <input type="email" class="form-control" name="email" value="{{$student->email}}" placeholder="Enter email ...">
        </div>
        <div class="col-6 form-group">
            <label for="">Address</label>
            <input type="text" class="form-control" name="address" value="{{$student->address}}" placeholder="Enter address ...">
        </div>
        <div class="col-6 form-group">
            <label for="">Password</label>
            <input type="password" class="form-control" name="password" value="" placeholder="Enter if you want to change">
        </div>
    </div>
    <div class="row">
        <div class="col-4">
            <button type="submit" class="btn btn-primary cus_primary_btn">Update</button>
        </div>
    </div>
</form>
@endsection