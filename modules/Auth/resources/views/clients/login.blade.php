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
    <div class="sign-in">
        <h3>Login</h3>
        <form action="" method="POST">
            @csrf
            <input type="email" name="email" placeholder="Email" / required>
            <input type="password" name="password" placeholder="Password" / required>
            <a href="{{route('client.forgotpassword')}}" class="forgot-password">Forgot password</a>
            <button type="submit">Login</button>
        </form>
        <p class="sign-up">
            Don't have an account?
            <a href="{{route('client.register')}}">Register</a>
        </p>
    </div>
</div>    
@endsection
