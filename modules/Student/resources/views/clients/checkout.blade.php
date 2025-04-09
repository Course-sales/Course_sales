@extends('layouts.client')
@section('content')
    <section class="all-course py-2 checkout-page">
        <div class="container">
            <h2 class="py-2">Order Payment<a href="{{route('client.account.orderDetail', $order->id)}}">#{{$order->id}}</a>
                <span class="countdown countdown position-fixed end-0 p-2 rounded"><span>00</span>:<span>00</span>
            </h2>
            <hr>
            <div class="row">
                <div class="col-6">
                    <h4 class="mb-3">Order information</h4>
                    <table class="table table-bordered">
                        <tr>
                            <th width="25%">Order ID</th>
                            <td>#{{ $order->id }}</td>
                        </tr>
                        <tr>
                            <th>Total</th>
                            <td>{{ money($order->total) }}</td>
                        </tr>
                        <tr>
                            <th>Discount</th>
                            @if($order->discount > 0)
                                <td class="discount-value">-{{money($order->discount)}}</td>
                            @else
                                <td class="discount-value">No</td>
                            @endif
                            
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
                            </td>
                        </tr>
                        <tr>
                            <th>Total order value</th>
                            <td class="total-value">{{ money($order->total - $order->discount) }}</td>
                        </tr>
                    </table>
                    <h4 class="mb-3">Order detail</h4>
                    <table class="table table-bordered">
                        <thead>
                            <tr>
                                <th width="5%">No</th>
                                <th>Course name</th>
                                <th>Price</th>
                                <th>Teacher</th>
                                <th>Status</th>
                            </tr>
                        </thead>
                        <tbody>
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
                    <a href="{{route('client.account.orderDetail', $order->id)}}" class="btn btn-primary btn-sm">Go back</a>
                    <a href="{{route('client.course.index')}}" class="btn btn-primary btn-sm">continue Shopping</a>
                </div>
                <div class="col-6">
                    @include('Student::clients.partials.coupon')
                    <div class="row">
                        <div class="col-6">
                            <h4 class="mb-3">Payment Information</h4>
                            <p>Please transfer the payment to the bank account below or scan the QR code to proceed. Make sure to enter the correct amount and payment details.</p>
                            <hr>
                            <p>- Bank: ACB</p>
                            <p>- Account Number: <span>4319141</span> <i class="bank-copy fa-regular fa-copy"></i></p>
                            <p>- Account Holder: NGUYEN MINH QUANG</p>
                            <p>- Amount: <span class="total-value">{{ money($order->total - $order->discount) }}</span></p>
                            <p>- Payment Details: 
                                <span>Payment for ATX Order {{ $order->id }}</span> 
                                <i class="bank-copy fa-regular fa-copy"></i>
                            </p>
                        </div>
                        
                        <div class="col-6">
                            <div class="text-center">
                                <img class="qr-img" style="width: 230px"
                                    src="https://img.vietqr.io/image/acb-4319141-compact2.jpg?amount={{ $order->total - $order->discount }}&addInfo=thanh+toan+don+hang+ATX+{{ $order->id }}"
                                    alt="">
                            </div>
                        </div>
                        <div class="col-4 py-4">
                            <a href="" class="btn btn-warning btn-sm complete-payment">Payment Confirmation</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <script>
        
        document.addEventListener('DOMContentLoaded', () => {
            var bankCopyBtn = document.querySelectorAll('.bank-copy');
            var countdownElement = document.querySelector('.countdown');        
            var confirmElement = document.querySelector('.complete-payment');   
            var orderId = "{{$order->id}}";
            var courses = {!! json_encode($order->orderDetail) !!};;
            
            if(confirmElement) {
                confirmElement.addEventListener('click', (e) => {
                    e.preventDefault();
                    confirmCheckout(orderId, courses);
                });
            }
            bankCopyBtn.forEach((bankCopyElement) => {
                bankCopyElement.addEventListener('click', (e) => {
                    e.preventDefault();
                    var copied  = e.target.previousElementSibling.innerText;
                    navigator.clipboard.writeText(copied).then(() => {
                        e.target.classList.replace('fa-regular', 'fa-solid');
                    });
                });
                
            });
            if(countdownElement) {
                var paymentDate = "{{$order->payment_date}}";

                if(paymentDate) {
                    var expireObject = new Date(paymentDate);
                    expireObject.setTime(expireObject.getTimezoneOffset() * 60 * 1000 + expireObject.getTime());
                    var expire = expireObject.getTime() + 50 * 60 * 1000;
                    
                    const paymentTime = () => {
                        var timeZone = new Date();
                        timeZone.setTime(timeZone.getTimezoneOffset() * 60 * 1000 + timeZone.getTime());
                        var now = timeZone.getTime();
                        var distance = expire - now;
                        if(distance <= 0) {
                            // window.location.reload();
                        }
                        var minutes = Math.floor((distance % (1000 * 60 * 60)) / (1000 * 60));
                        var seconds = Math.floor((distance % (1000 * 60)) / 1000);
                        countdownElement.firstElementChild.innerText = `${minutes < 10 ? "0" + minutes : minutes}`;
                        countdownElement.lastElementChild.innerText = `${seconds < 10 ? "0" + seconds : seconds}`;
                    };
                    setInterval(paymentTime, 1000);
                    
                    
                }
            }
            const confirmCheckout = async (orderId, courses) => {
                var response = await fetch(`/tai-khoan/xac-nhan-thanh-toan/`,{
                    method: "POST",
                    headers: {
                        "X-CSRF-TOKEN" : token,
                        "Content-Type" : "application/json",
                        Accept: "application/json",
                    },
                    body: JSON.stringify({'orderId' : orderId, 'courses' : courses}),
                });
                var data = await response.json();
                if(data.status === 1) {
                    Swal.fire({
                        title: data.message,
                        text: 'Your transaction will be updated in a few minutes.',
                        icon: "success",
                        confirmButtonColor: "#3085d6",
                        confirmButtonText: "OK"
                    }).then((result) => {
                        if (result.isConfirmed) {
                            window.location.href = `/tai-khoan/danh-sach-don-hang/${orderId}`;
                        }
                    }); 
                }else{
                    alert(data.message);
                }
            }
            const couponForm =  document.querySelector(".coupon-form");
            const couponUsage = document.querySelector('.coupon-usage');
            if(couponForm && couponUsage) {
                couponForm.addEventListener("submit", (e) => {
                    e.preventDefault();
                    const couponElement = couponForm.querySelector("input");
                    const coupon = couponElement.value;
                    const error = couponForm.querySelector(".error");
                    const fieldsetElement = couponForm.querySelector("fieldset");
                    error.innerText = "";
                    const verifyCoupon = async (code, orderId) => {
                        try {
                            fieldsetElement.disabled = true;
                            const response = await fetch(`/coupon/verify`, {
                                method: "POST",
                                headers: {
                                    "X-CSRF-TOKEN" : token,
                                    "Content-Type" : "application/json",
                                    Accept: "application/json",
                                },
                                body: JSON.stringify({'code' : code, 'orderId' : orderId}),
                            });
                            const { success, errors, coupon } = await response.json();

                            if(!success) {
                                throw new Error(errors);
                            }
                            Toastify({
                                text: "Áp dụng mã giảm giá thành công",
                                duration: 3000,
                                destination: "https://github.com/apvarun/toastify-js",
                                newWindow: true,
                                close: true,
                                gravity: "top", 
                                position: "right", 
                                stopOnFocus: true,
                                style: {
                                    background: "linear-gradient(to right, #00b09b, #96c93d)",
                                },
                                onClick: function(){} // Callback after click
                            }).showToast();
                            couponForm.reset();
                            couponForm.classList.add('d-none')
                            couponUsage.classList.remove('d-none');
                            
                        } catch (errors) {
                            error.innerText = errors.message;
                        } finally {
                            fieldsetElement.disabled = false;
                        }
                    }   
                    verifyCoupon(coupon, orderId);
                });

                const removeCouponElement = couponUsage.querySelector('.js-remove-coupon');
                removeCouponElement.addEventListener('click', (e) => {
                    e.preventDefault();
                    const removeCoupon = async (code, orderId) => {
                        const response = await fetch(`/coupon/delete`, {
                            method: "POST",
                            headers: {
                                "X-CSRF-TOKEN" : token,
                                "Content-Type" : "application/json",
                                Accept: "application/json",
                            },
                            body: JSON.stringify({'code' : code, 'orderId' : orderId}),
                        });
                    }

                    couponUsage.classList.add('d-none');
                    couponForm.classList.remove('d-none');
                })
            }
        });
    </script>
    <style>
        .countdown {
            font-size: 1.5rem;
            margin-left: 50px;
            > * {
                padding: 5px;
                background: red;
                color: white;
                border-radius: 5px;
            }
        }
    </style>
@endsection