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
                    <div class="order-detail">
                        <h2 class="py-2">Order</h2>
                        <h4 class="mb-3">Basic information</h4>
                        <table class="table table-bordered">
                            <tr>
                                <th width="20%">Order ID</th>
                                <td>#{{ $order->id }}</td>
                            </tr>
                            <tr>
                                <th>Total</th>
                                <td>{{ money($order->total) }}</td>
                            </tr>
                            <tr>
                                <th>Order date</th>
                                <td>{{ \Carbon\Carbon::parse($order->created_at)->format('d/m/Y H:i:s') }}</td>
                            </tr>
                            <tr>
                                <th>Status</th>
                                <td><span class="badge bg-{{ $order->ordersStatus->color }}">
                                        {{ $order->ordersStatus->name }}
                                    </span>
                                    @if (!$order->ordersStatus->is_success)
                                        @if ($order->expired)
                                            <span class="badge bg-danger">Payment is due</span>
                                        @else
                                            <a href="{{route('client.account.checkout', $order->id)}}"
                                                class="btn btn-success btn-sm update-payment-date">Check out</a>
                                        @endif
                                    @endif
                                </td>
                            </tr>
                        </table>
                        <h4>Detail</h4>
                        <table class="table table-bordered">
                            <thead class="text-center">
                                <tr>
                                    <th width="5%">No.</th>
                                    <th>Course name</th>
                                    <th>Price</th>
                                    <th>Teacher</th>
                                    <th>Status</th>
                                </tr>
                            </thead>
                            <tbody class="text-center">
                                @foreach ($order->orderDetail as $key => $item)
                                    <tr>
                                        <td>{{ $key + 1 }}</td>
                                        <td>{{ $item?->course?->name }}</td>
                                        <td>{{ money($item->price) }}</td>
                                        <td>{{ $item?->course?->teacher?->name }}</td>
                                        <td>
                                            <span class="badge bg-{{ $item->course?->status ? 'success' : 'danger' }}">
                                                {{ $item->course?->status ? 'Active' : 'Block' }}
                                            </span>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                    <a href="{{route('client.account.myOrders')}}" class="btn btn-primary btn-sm">List of orders</a>
                </div>
            </div>
        </div>
    </section>
    <script>
        
        document.addEventListener('DOMContentLoaded', () => {
            var updateBtn = document.querySelector('.update-payment-date');
            var orderId = "{{$order->id}}";

            if(updateBtn) {
                updateBtn.addEventListener('click', (e) => {
                    e.preventDefault();
                    var initialText = e.target.innerText;
                    e.target.innerText = 'Loading ...';
                    var url = "{{ route('client.account.updatePaymentDate', ['orderId' => ':orderId']) }}".replace(':orderId', orderId);
                    fetch(url).then((response) => response.json()).then((data) => {
                        if(data.status === 1) {
                            window.location.href = "{{ route('client.account.checkout', ['orderId' => ':orderId']) }}".replace(':orderId', orderId);
                        }else{
                            console.error("Lỗi:không thể tải dữ liệu.");
                        }
                        
                    }).finally(() => {
                        e.target.innerText = initialText;
                    });
                    
                });
            }
            
        });
    </script>
@endsection