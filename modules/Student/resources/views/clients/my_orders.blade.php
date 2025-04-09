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
                <h2 class="py-2">Order List</h2>
                <table class="table table-bordered">
                    <thead class="text-center">
                        <tr>
                            <th width="5%">No.</th>
                            <th width="15%">Order ID</th>
                            <th>Total</th>
                            <th width="20%">Status</th>
                            <th width="20%">Time</th>
                            <th width="10%">Action</th>
                        </tr>
                    </thead>
                    <tbody class="text-center">
                        @foreach ($orders as $key => $order)
                        <tr>
                            <td>{{$key + 1}}</td>
                            <td><a href="{{route('client.account.orderDetail', $order->id)}}">#{{$order->id}}</a></td>
                            <td>{{money($order->total)}}</td>
                            <td><span class="badge bg-{{$order->ordersStatus->color}}" style="color: white">{{$order->ordersStatus->name}}</span></td>
                            <td>{{\Carbon\Carbon::parse($order->created_at)->format('d/m/Y H:i:s')}}</td>
                            <td class="d-grid"><a href="{{route('client.account.orderDetail', $order->id)}}" class="btn btn-outline-primary btn-sm">Details</a></td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
                {{$orders->links()}}
            </div>
        </div>
    </div>
</section>
@endsection
