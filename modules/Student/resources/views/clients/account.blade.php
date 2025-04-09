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
                <h2>Overview</h2>
                <i>
                    No notification from the system yet
                </i>
            </div>
        </div>
    </div>
</section>
@endsection