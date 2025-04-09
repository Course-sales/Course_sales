@extends('layouts.backend')
@section('content')
@if(session('msg'))
    <div class="alert alert-success text-center">
        {{ session('msg') }}
    </div>
@endif
<p><a href="{{route('admin.orders.index')}}" class="btn btn-success cus_success_btn">Go back</a></p>
<hr>
<table class="table table-bordered text-center" id="table_lessons">
    <thead>
        <tr>
            <th>Order code</th>
            <th>Date of purchase</th>
            <th>Status</th>
            <th>Payment date</th>
            <th>Course</th>
            <th>Student</th>
            <th>Total</th>
        </tr>
    </thead>
    <tbody>
        <td>#{{$order->id}}</td>
        <td>{{ \Carbon\Carbon::parse($order->payment_date)->format('d/m/Y') }}</td>
        <td><span class="badge bg-{{$order->ordersStatus->color}}" style="color: white">{{$order->ordersStatus->name}}</span></td>
        <td>
            @if($order->payment_complete_date)
                {{ \Carbon\Carbon::parse($order->payment_complete_date)->format('d/m/Y') }}
            @else
                Unpaid
            @endif
        </td>
        <td class="text-left">
            @foreach($order->orderDetail as $item)
                - {{$item->course->name}} <br>
            @endforeach
        </td>
        <td>{{$order->student->name}} <br> SĐT: {{$order->student->phone}}</td>
        <td>{{money($order->total)}}</td>
    </tbody>
</table>
@endsection
