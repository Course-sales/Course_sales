@extends('layouts.auth')

@section('content')
@if(session('msg'))
<div class="alert alert-success text-center mt-3">
    {{ session('msg') }}
</div>
@endif
<div class="row justify-content-center align-items-center">
    <div class="col-lg-6">
        <div class="p-5">
            <div class="text-center">
                <h1 class="h4 text-gray-900 mb-4">{{$pageTitle}}</h1>
            </div>
            <form method="POST" class="user" action="{{route('login')}}">
                @csrf
                <div class="form-group">
                    <input type="email" class="form-control form-control-user" name="email" required
                        placeholder="Enter email...">
                </div>
                <div class="form-group">
                    <input type="password" class="form-control form-control-user"
                        name="password" placeholder="Enter password ..." required>
                </div>
                <button type="submit" class="btn btn-primary btn-user btn-block">Login</button>
            </form>
            <hr>
            <div class="text-center">
                <a class="small" href="forgot-password.html">Forgot Password?</a>
            </div>
        </div>
    </div>
</div>
@endsection
