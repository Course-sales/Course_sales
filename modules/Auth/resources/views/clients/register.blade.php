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
    @if(session('msg'))
        <div class="alert alert-success text-center mt-3">
            {{ session('msg') }}
        </div>
    @endif
    <div class="sign-up">
        <h3>Register</h3>
        <form action="" method="POST">
            @csrf
            <input type="text" name="name" value="{{old('name')}}" placeholder="Fullname" />
            @error('name')
            <span class="text-start text-danger mb-3">{{$message}}</span>
            @enderror
            <input type="text" name="email" value="{{old('email')}}" placeholder="Email" />
            @error('email')
            <span class="text-start text-danger mb-3">{{$message}}</span>
            @enderror
            <input type="text" name="phone" value="{{old('phone')}}" placeholder="Phone" />
            @error('phone')
            <span class="text-start text-danger mb-3">{{$message}}</span>
            @enderror
            <input type="password" name="password" placeholder="Password" />
            @error('password')
            <span class="text-start text-danger mb-3">{{$message}}</span>
            @enderror
            <input type="password" name="confirm_password" placeholder="Confirm password" />
            @error('confirm_password')
            <span class="text-start text-danger mb-3">{{$message}}</span>
            @enderror
            <button type="submit">
                <i class="fa-solid fa-user"></i>
                Register
            </button>
        </form>
        <p class="sign-in">
            Already have an account?
            <a href="{{route('client.login')}}">Login now</a>
        </p>
    </div>
</div>   
@endsection
