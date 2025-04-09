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
                <h2 class="py-2">Change password</h2>
                @if (session('msg'))
                    <div class="alert alert-success text-center">{{session('msg')}}</div>
                @endif
                <form action="" method="post">
                    <div class="mb-3">
                        <label for="">Old password</label>
                        <input type="password" name="old_password" class="form-control" placeholder="Enter old password...">
                        @error('old_password')
                        <span class="text-danger">{{$message}}</span>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label for="">New password</label>
                        <input type="password" name="password" class="form-control" placeholder="Enter new password...">
                        @error('password')
                        <span class="text-danger">{{$message}}</span>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label for="">Confirm password</label>
                        <input type="password" name="confirm_password" class="form-control" placeholder="Confirm password...">
                        @error('confirm_password')
                        <span class="text-danger">{{$message}}</span>
                        @enderror
                    </div>
                    <button type="submit" class="btn btn-primary">Save</button>
                    @csrf
                </form>
            </div>
        </div>
    </div>
</section>
@endsection