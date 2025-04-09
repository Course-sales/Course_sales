@extends('layouts.client')
@section('content')
<section class="all-cart py-2 mb-4 mt-4">
    <div class="card">
        <div class="row">
            <div class="col-md-8 cart">
                <div class="title">
                    <div class="row">
                        <div class="col"><h4><b>Cart</b></h4></div>
                    </div>
                </div>    
                @if(count((array) session('cart')) >= 1)
                    @foreach ((array) session('cart') as $item)
                        <div class="row border-top border-bottom cart-item">
                            <div class="row main align-items-center">
                                <div class="col-2"><img class="img-fluid" src="{{$item['thumbnail']}}"></div>
                                <div class="col">
                                    <div class="row text-muted">Course name</div>
                                    <div class="row">{{$item['name']}}</div>
                                </div>
                                <div class="col">
                                    <div class="row text-muted">Teacher name</div>
                                    <div class="row">{{$item['teacher_name']}}</div>
                                </div>
                                <div class="col">
                                    <div class="row text-muted">Price</div>
                                    <div class="row price" >{{ money($item['price']) }}</div>
                                </div>                   
                                <div class="col">
                                    <div class="row"><span class="close" data-code="{{$item['code']}}">&#10005;</span></div>
                                </div>
                            </div>
                        </div>
                    @endforeach
                @else
                    <div class="row border-top border-bottom">
                        <div class="row main align-items-center">
                            <div class="col-12 text-center">
                                <i>You have no courses in your shopping cart!</i>
                            </div>
                        </div>
                    </div>
                @endif
                <div class="back-to-shop"><a href="{{route('client.course.index')}}">&leftarrow;</a><span class="text-muted">Back to home</span></div>
            </div>
            <div class="col-md-4 summary">
                <div><h5><b>Summer</b></h5></div>
                <hr>
                <div class="row">
                    <div class="col">Quantity:</div>
                    <div class="col text-right quantity">0</div>
                </div>
                <div class="row">
                    <div class="col">Discount:</div>
                    <div class="col text-right ">No</div>
                </div>
                <div class="row">
                    <div class="col">Payment method:</div>
                    <div class="col text-right payment-type">Bank transfer or QR scan</div>
                </div>
                <div class="row" style="border-top: 1px solid rgba(0,0,0,.1); padding: 2vh 0;">
                    <div class="col">Total price:</div>
                    <div class="col text-right total-price">0đ</div>
                </div>
                <button class="btn btn-warning checkout">Check out</button>
            </div>
        </div>
    </div>
</section>
@include('parts.clients.question')
<script>
    document.addEventListener('DOMContentLoaded', () => {
        var closeButtons  = document.querySelectorAll('.close');
        var quantityElement = document.querySelector('.summary .quantity')
        var totalPriceElement = document.querySelector('.summary .total-price');
        var cartItemElement = document.querySelectorAll('.cart-item');
        var checkoutElement = document.querySelector('.summary .checkout');
        var session = {!! json_encode(session('cart')) !!};

        if(checkoutElement) {
            checkoutElement.addEventListener('click', (e) => {
                e.preventDefault();
                var total = parseInt(totalPriceElement.innerText.replace('đ', '').replace(/,/g, ''));
                if(total > 0 && typeof session === 'object') {
                    checkout(studentId, total);
                    session = [];
                    
                }
                return false;
            });
            
        }
        if(closeButtons ) {
            closeButtons .forEach((element) => {
                element.addEventListener('click', (e) => {
                    e.preventDefault();
                    var parentElement = element.closest('.cart-item');
                    if(parentElement) {
                        parentElement.remove();
                        removeItemFromCart(element.dataset.code);
                        
                    }
                });
            });
        }
        if(cartItemElement) {
            var totalPrice = 0;
            cartItemElement.forEach((element) => {
                var price = element.querySelector('.price').innerText.replace('đ', '').replace(/,/g, '');
                totalPrice += parseInt(price);
            });
            totalPrice = totalPrice.toLocaleString('vi-VN') + 'đ';
            totalPriceElement.innerText = totalPrice.replace(/\./g, ',');
            quantityElement.innerText = cartQuantityElement.innerText;
            
        }
        const removeItemFromCart = async (code) => {
            var response = await fetch(`/xoa-khoi-gio-hang`,{
                method: "DELETE",
                headers: {
                    "X-CSRF-TOKEN" : token,
                    "Content-Type" : "application/json",
                    Accept: "application/json",
                },
                body: JSON.stringify({'code' : code}),
            });
            var data = await response.json();
            if( data.status === 1) {
                cartQuantityElement.innerText = data.cartQty;
                quantityElement.innerText = data.cartQty;
                var totalPrice = 0;

                Object.values(data.cart).forEach((item) => {
                    totalPrice += parseInt(item.price);

                });
                totalPrice = totalPrice.toLocaleString('vi-VN') + 'đ';
                totalPriceElement.innerText = totalPrice.replace(/\./g, ',');
                if(parseInt(cartQuantityElement.innerText) === 0) {
                    setEmptyCart();
                }
                window.location.reload();
            }
            alert(data.message);
        }
        const checkout = async (studentId, total) => {
            var response = await fetch(`/danh-sach-don-hang`, {
                method: "POST",
                headers: {
                    "X-CSRF-TOKEN" : token,
                    "Content-Type" : "application/json",
                    Accept: "application/json",
                },
                body: JSON.stringify({'total' : total, 'studentId' : studentId}),
            });
            var data = await response.json();
            //setEmptyCart();
            if(data.status === 1) {
                window.location.href = `/tai-khoan/thanh-toan/${data.orderId}`;
            }else{
                alert(data.message);
            }
            
        }
        const setEmptyCart = () => {
            var routeToCourses = "{{ route('client.course.index') }}";
            var cartHtml = `
                <div class="title">
                    <div class="row">
                        <div class="col">
                            <h4><b>Cart</b></h4>
                        </div>
                    </div>
                </div>   
                <div class="row border-top border-bottom">
                    <div class="row main align-items-center">
                        <div class="col-12 text-center">
                            <i>You have no courses in your shopping cart!</i>
                        </div>
                    </div>
                </div>
                <div class="back-to-shop">
                    <a href="${routeToCourses}">&leftarrow;</a>
                    <span class="text-muted">Back to home</span>
                </div>
            `;
            var summaryHtml = `
              <div><h5><b>Summer</b></h5></div>
                <hr>
                <div class="row">
                    <div class="col">Quantity:</div>
                    <div class="col text-right quantity">0</div>
                </div>
                <div class="row">
                    <div class="col">Discount:</div>
                    <div class="col text-right ">No</div>
                </div>
                <div class="row">
                    <div class="col">Payment method:</div>
                    <div class="col text-right payment-type">Bank transfer or QR scan</div>
                </div>
                <div class="row" style="border-top: 1px solid rgba(0,0,0,.1); padding: 2vh 0;">
                    <div class="col">Total price:</div>
                    <div class="col text-right total-price">0đ</div>
                </div>
                <button class="btn btn-warning checkout">Check out</button>
            `;
            document.querySelector('.all-cart .cart').innerHTML = cartHtml;
            document.querySelector('.all-cart .summary').innerHTML = summaryHtml;

        };
    });
</script>
<style>
    .all-cart {
        .title{
            margin-bottom: 5vh;
        }
        .card{
            margin: auto;
            max-width: 1320px;
            width: 90%;
            box-shadow: 0 6px 20px 0 rgba(0, 0, 0, 0.19);
            border-radius: 1rem;
            border: transparent;
        }
        @media(max-width:767px){
            .card{
                margin: 3vh auto;
            }
        }
        .all-cart.cart{
            background-color: #fff;
            padding: 4vh 5vh;
            border-bottom-left-radius: 1rem;
            border-top-left-radius: 1rem;
        }
        @media(max-width:767px){
            all-cart.cart{
                padding: 4vh;
                border-bottom-left-radius: unset;
                border-top-right-radius: 1rem;
            }
        }
        .summary{
            background-color: #ddd;
            border-top-right-radius: 1rem;
            border-bottom-right-radius: 1rem;
            padding: 4vh;
            color: rgb(65, 65, 65);
        }
        @media(max-width:767px){
            .summary{
            border-top-right-radius: unset;
            border-bottom-left-radius: 1rem;
            }
        }
        .summary .col-2{
            padding: 0;
        }
        .summary .col-10
        {
            padding: 0;
        }.row{
            margin: 0;
            font-size: initial;
        }
        .title b{
            font-size: 1.5rem;
        }
        .main{
            margin: 0;
            padding: 2vh 0;
            width: 100%;
        }
        .col-2, .col{
            padding: 0 1vh;
        }
        a{
            padding: 0 1vh;
        }
        .close {
            font-size: 2rem; /* Tăng kích thước */
            color: #ff0000; /* Màu đỏ cho nổi bật */
            cursor: pointer; /* Thêm hiệu ứng con trỏ */
            font-weight: bold; /* Đậm hơn */
            padding: 5px; /* Thêm khoảng cách bên trong */
            transition: transform 0.2s ease-in-out; /* Hiệu ứng khi di chuột */
        }

        img{
            width: 3.5rem;
        }
        .back-to-shop{
            margin-top: 4.5rem;
        }
        h5{
            margin-top: 4vh;
        }
        hr{
            margin-top: 1.25rem;
        }
        form{
            padding: 2vh 0;
        }
        select{
            border: 1px solid rgba(0, 0, 0, 0.137);
            padding: 1.5vh 1vh;
            margin-bottom: 4vh;
            outline: none;
            width: 100%;
            background-color: rgb(247, 247, 247);
        }
        input{
            border: 1px solid rgba(0, 0, 0, 0.137);
            padding: 1vh;
            margin-bottom: 4vh;
            outline: none;
            width: 100%;
            background-color: rgb(247, 247, 247);
        }
        input:focus::-webkit-input-placeholder
        {
            color:transparent;
        }
        .btn{
            background-color: #000;
            border-color: #000;
            color: white;
            width: 100%;
            font-size: 1.5rem;
            margin-top: 4vh;
            padding: 1vh;
            border-radius: 0;
        }

    }
</style>
@endsection
