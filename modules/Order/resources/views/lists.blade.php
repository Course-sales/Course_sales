@extends('layouts.backend')
@section('content')
@if(session('msg'))
    <div class="alert alert-success text-center">
        {{ session('msg') }}
    </div>
@endif
<div class="row mb-4">
    <div class="col">
        <input type="search" class="form-control" name="search" id="keyword" placeholder="Enter keyword ...">
    </div>
</div>
<hr>
<table class="table table-bordered text-center" id="table-orders">
    <thead>
        <tr>
            <th>
                <p>Order code</p>
            </th>
            <th>
                <p>Date of purchase</p>
                <select id="all-date" class="form-control text-center">
                    <option value="">All</option>
                    @foreach($allPaymentDates as $date)
                    <option value="{{ \Carbon\Carbon::parse($date->payment_date)->format('Y-m-d') }}">{{ \Carbon\Carbon::parse($date->payment_date)->format('d/m/Y') }}</option>
                    @endforeach
                </select>
            </th>
            <th>
                <p>Status</p>
                <select name="status" id="status" class="form-control text-center">
                    <option value="">All</option>
                    <option value="1">Pending Payment</option>
                    <option value="2">Paid</option>
                </select>
            </th>
            <th><p>Student name</p></th>
            <th><p>Price</p></th>
            <th><p>Detail</p></th>
        </tr>
    </thead>
    <tbody>
        @foreach ($orders as $order)
            <tr>
                <td><a href="">#{{$order->id}}</a></td>
                <td>{{ \Carbon\Carbon::parse($order->payment_date)->format('d/m/Y') }}</td>
                <td><span class="badge bg-{{$order->ordersStatus->color}}" style="color: white">{{$order->ordersStatus->name}}</span></td>
                <td>{{$order->student->name}}</td>
                <td>{{money($order->total)}}</td>
                <td class="d-grid"><a href="{{route('admin.orders.detail', $order->id)}}" class="btn btn-outline-primary btn-sm">Detail</a></td>
            </tr>
        @endforeach
    </tbody>
</table>
<script>
    window.addEventListener('DOMContentLoaded', () => {
        const selectElement = document.querySelector('#all-date');
        const table = document.querySelector('#table-orders');
        const searchInput = document.querySelector('#keyword');
        const status = document.querySelector('#status');
        if(selectElement || searchInput || status) {
            selectElement.addEventListener('change', (e) => {
                e.preventDefault();
                search();
            });
            status.addEventListener('change', (e) => {
                e.preventDefault();
                search();
                
            });
            searchInput.addEventListener('blur', (e) => {
                e.preventDefault();
                search();
            });

        }


        const search = async () => {
            var filters = 
                {
                    'keyword' : document.querySelector('#keyword').value,
                    'payment_date' : document.querySelector('#all-date').value,
                    'status' : document.querySelector('#status').value,
                };
            var response = await fetch(`/admin/orders/search/`, {
                method: "POST",
                headers: {
                    "X-CSRF-TOKEN" : token,
                    "Content-Type" : "application/json",
                    Accept: "application/json",
                },
                body: JSON.stringify(filters),
            });
            var result = await response.json();
            var tbodyElement = "";
            result.data.forEach((item) => {
                const rawDate = new Date(item.payment_date);
                const paymentDate = rawDate.toLocaleDateString('vi-VN');
                const total = item.total;
                const formatTotal = total.toLocaleString('vi-VN').replace();
                tbodyElement += "<tr>";
                tbodyElement += "<td><a href=''>#" + item.id + "</a></td>";
                tbodyElement += "<td>" + paymentDate + "</td>";
                tbodyElement += "<td><span class='badge bg-" + item.orders_status.color + "' style='color: white'>" + item.orders_status.name + "</span></td>";             
                tbodyElement += "<td>" + item.student.name + "</td>";             
                tbodyElement += "<td>" + formatTotal.replace(/\./g, ',') + "đ</td>";             
                tbodyElement += "<td class='d-grid'><a href='/admin/orders/detail/" + item.id + "' class='btn btn-outline-primary btn-sm'>Detail</a></td>";             
                tbodyElement += "</tr>";
            });
            table.querySelector('tbody').innerHTML = tbodyElement
            
            
        }
        
    });
</script>
@endsection
