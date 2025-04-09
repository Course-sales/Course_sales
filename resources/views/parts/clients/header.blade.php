<header class="header">
    <div class="action-bar">
        <div class="container">
            <div class="row align-items-center">
                <div class="d-none d-lg-block col-lg-7">
                    <div class="d-flex">
                        <p class="slogan">
                            <i class="fas fa-phone"></i>contact & support:
                            <a href="#">0973314654</a>
                        </p>
                        <p class="mail">
                            <i class="far fa-envelope"></i>
                            <a href="#">mquang1712003@gmail.com</a>
                        </p>
                    </div>
                </div>
                <div class="col-lg-5">
                    <div class="social">
                        @if (auth('students')->check())
                        <ul class="d-flex gap-3 align-items-center user-menu">
                            <li class="text-nowrap">Hi, {{ auth('students')->user()->name }}</li>
                            <li><a href="{{ route('client.account.index') }}" class="btn btn-outline-primary btn-sm">Account</a></li>
                            <li><a href="#" onclick="document['form-logout'].submit(); return false" class="btn btn-outline-danger btn-sm">Logout</a></li>
                        </ul>
                        
                        @else
                            <a href="{{route('client.register')}}" class="btn btn-primary text-white">
                                <i class="fas fa-user"></i> Register
                            </a>
                            <a href="{{route('client.login')}}" class="btn btn-primary text-white">
                                <i class="fas fa-key"></i> Login
                            </a>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <div class="container">
            <a class="navbar-brand" href="{{route('client.course.index')}}">
                <img src="{{asset('clients/assets/page-logo.png')}}" alt="" />
            </a>
            <button
                class="navbar-toggler d-lg-none"
                type="button"
                data-bs-toggle="collapse"
                data-bs-target="#navbarNavDropdown"
                aria-controls="navbarNavDropdown"
                aria-expanded="false"
                aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNavDropdown">
                <ul class="navbar-nav">
                    <li class="nav-item">
                        <a class="nav-link" href="{{route('client.course.index')}}">
                            <i class="fas fa-tv"></i>
                            Courses
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="/lo-trinh-khoa-hoc">
                            <i class="fas fa-route"></i>
                            Roadmap
                        </a>
                    </li>
                    {{-- <li class="nav-item">
                        <a class="nav-link" href="#">
                            <i class="fas fa-globe-europe"></i>
                            Kiến thức
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">
                            <i class="fas fa-star"></i>
                            Tuyển dụng
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">
                            <i class="fas fa-broadcast-tower"></i>
                            CTV
                        </a>
                    </li> --}}
                </ul>
            </div>
            <p class="cart position-relative">
            @auth('students')
                <a href="{{ route('client.cart') }}" style="color: black"><i class="fas fa-shopping-cart"></i></a>
                <span class="cart-badge position-absolute top-0 start-100 translate-middle badge rounded-pill bg-danger">{{count((array) session('cart')) ?? 0}}</span>
            @else
                <a href="#" style="color: black" onclick="alert('Vui lòng đăng nhập!'); return false;"><i class="fas fa-shopping-cart"></i></a>
                <span class="cart-badge position-absolute top-0 start-100 translate-middle badge rounded-pill bg-danger"></span>
            @endauth
            </p>
          
        </div>
    </nav>
</header>
<form name="form-logout" method="post" action="{{route('client.logout')}}">
    @csrf
</form>
<style>
    .navbar .navbar-brand img {
        width: 200px;
        height: 45px !important;
    }
    .user-menu .btn {
        padding: 6px 12px; /* Điều chỉnh kích thước padding của nút */
        font-size: 0.9rem;  /* Kích thước chữ phù hợp */
        border-radius: 20px; /* Để các nút có góc bo tròn */
        text-transform: capitalize; /* Đảm bảo chữ viết hoa đẹp */
    }
    .user-menu .text-nowrap {
        white-space: nowrap; /* Ngăn không cho tên bị gãy dòng */
    }
    .cart {
        font-size: 24px; /* Điều chỉnh kích thước biểu tượng giỏ hàng */
    }
    .cart-badge {
        font-size: 12px; Điều chỉnh kích thước của số lượng
        padding: 4px 6px; /* Điều chỉnh kích thước badge */
        color: white; /* Màu chữ */
    }
</style>