@extends('layouts.backend')
@section('content')
@if(session('msg'))
    <div class="alert alert-success text-center">
        {{ session('msg') }}
    </div>
@endif
<div class="row">
    <div class="col">
        <p><a href="{{route('admin.users.index')}}" class="btn btn-success btn-sm cus_success_btn">Go back</a></p>
    </div>
</div>
<form method="POST">
    <div class="row">
        @csrf
        <div class="col-6 form-group">
            <label for="">Group</label>
            <select name="group_id" id="group_id" class="form-control">
                <option value="0" {{$userDetail->group_id == 0 ? 'selected' : ''}}>CTV</option>
                <option value="1" {{$userDetail->group_id == 1 ? 'selected' : ''}}>Administranstor</option>
            </select>
        </div>
        <div class="col-6 form-group">
            <label for="">Name</label>
            <input type="text" class="form-control" name="name" value="{{$userDetail->name}}" placeholder="Enter name ...">
        </div>
        
        <div class="col-6 form-group">
            <label for="">Email</label>
            <input type="email" class="form-control" name="email" value="{{$userDetail->email}}" placeholder="Enter email ...">
        </div>
    
        <div class="col-6 form-group">
            <label for="">Password</label>
            <input type="password" class="form-control" name="password" value="" placeholder="Enter if you want change ...">
        </div>
    </div>
    <div class="row">
        <div class="col-4">
            <button type="submit" class="btn btn-primary cus_primary_btn">Update</button>
        </div>
    </div>
</form>
@endsection