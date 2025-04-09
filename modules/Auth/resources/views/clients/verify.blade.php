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
    <div class="sign-in w-50">
        @if (session('msg'))
        <div class="alert alert-success">{{session('msg')}}</div>
        @endif
        <h1>Please activate account</h1>
        <h3 class="mt-2">Please check your email to activate your account.</h3>
    </div>
</div>
@endsection