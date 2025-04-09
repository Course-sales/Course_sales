@extends('layouts.authClient')
@section('content')
<div class="container">
    <div class="home-back">
        <a href="{{route('client.course.index')}}">
            <span>
                <i class="fa-solid fa-arrow-left"></i>
            </span>
            Back to home
        </a>
    </div>
    <div class="sign-up">
        <h3>Reset Password</h3>
        @if (session('msg'))
        <div class="alert alert-danger">{{session('msg')}}</div>
        @endif
        <form action="{{route('client.password.update')}}" method="post">
            <input type="password" name="password" placeholder="Password" />
            @error('password')
            <span class="text-start text-danger mb-3">{{$message}}</span>
            @enderror
            <input type="password" name="confirm_password" placeholder="Confirm password" />
            @error('confirm_password')
            <span class="text-start text-danger mb-3">{{$message}}</span>
            @enderror
            <input type="hidden" name="token" value="{{$token}}" />
            <input type="hidden" name="email" value="{{request()->email}}" />
            <button type="submit">
                <i class="fa-solid fa-user"></i>
                Save
            </button>
            @csrf
        </form>
        <p class="sign-up">
            <a href="{{route('client.login')}}">Back to login</a>
        </p>
    </div>
</div>
@endsection