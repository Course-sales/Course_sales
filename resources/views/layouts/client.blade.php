<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="UTF-8" />
		<meta http-equiv="X-UA-Compatible" content="IE=edge" />
		<meta name="viewport" content="width=device-width, initial-scale=1.0" />
        <meta name="csrf-token" content="{{ csrf_token() }}">
		<title>{{!empty($pageTitle) ? $pageTitle.' - ATX' : 'Empty'}}</title>
		<link rel="stylesheet" href="{{asset('clients/css/bootstrap.min.css')}}" />
		<link rel="stylesheet" href="{{asset('clients/css/slick.css')}}" />
		<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/css/all.min.css" />
		<link rel="stylesheet" href="{{asset('clients/css/reset.css')}}" />
		<link rel="stylesheet" href="{{asset('clients/css/header.css')}}" />
		<link rel="stylesheet" href="{{asset('clients/css/home.css')}}" />
		<link rel="stylesheet" href="{{asset('clients/css/course.css')}}" />
		<link rel="stylesheet" href="{{asset('clients/css/footer.css')}}" />
		<link rel="stylesheet" href="{{asset('clients/css/course-detail.css')}}" />
		<link rel="stylesheet" href="{{asset('clients/css/video-detail.css')}}" />
        <link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/toastify-js/src/toastify.min.css">
        @vite(['resources/sass/app.scss'])
        @yield('stylesheet')
	</head>
<body>
    @include('parts.clients.header')
    <main>
        @yield('content')
    </main>
    @include('parts.clients.footer')
    <div class="modal fade" id="modal">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h2 class="modal-title fs-5" id="exampleModalLabel"></h2>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">

                </div>
            </div>
        </div>
    </div>
</body>
    @if(Auth::guard('students')->check())
        <script>
            const studentId = "{{ Auth::guard('students')->user()->id }}";
        </script>
    @else
        <script>
            const studentId = null;
        </script>
    @endif
    @vite(['resources/js/app.js'])
    @yield('scripts')
    <script src="https://code.jquery.com/jquery-3.5.1.js"></script>
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.13/js/select2.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/toastify-js"></script>
    <script type="module" src="{{asset('clients/js/?ver=')}}{{rand()}}"></script>
    <script>
        $('.select2').select2();
        const token = document.head.querySelector('meta[name="csrf-token"]').content;
        const cartQuantityElement = document.querySelector('.header .cart .cart-badge');
    </script>

</html>