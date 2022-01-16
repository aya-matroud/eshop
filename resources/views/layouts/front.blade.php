
<!DOCTYPE html>
<html lang="en">

<head>
<meta name="csrf-token" content="{{ csrf_token() }}">
    <title>
       @yield('title')
    </title>
    <link  href="{{asset('frontend/css/bootstrap5.css')}}" rel="stylesheet" />
    <link  href="{{asset('frontend/css/custom.css')}}" rel="stylesheet" />
    <link  href="{{asset('frontend/css/owl.carousel.min.css')}}" rel="stylesheet" />
    <link  href="{{asset('frontend/css/owl.theme.default.min.css')}}" rel="stylesheet" />
    <!--     Fonts and icons     -->
    <link rel="stylesheet" type="text/css" href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700,900|Roboto+Slab:400,700" />
    <!-- Nucleo Icons -->
    <link href="{{asset('assets/css/nucleo-icons.css')}}" rel="stylesheet" />
    <link href="{{asset('assets/css/nucleo-svg.css')}}" rel="stylesheet" />
    <!-- Font Awesome Icons -->
    <script src="https://kit.fontawesome.com/42d5adcbca.js" crossorigin="anonymous"></script>
    <!-- Material Icons -->
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons+Round" rel="stylesheet">
    <!-- CSS Files -->
    <link id="pagestyle" href="{{asset('assets/css/material-dashboard.css?v=3.0.0')}}" rel="stylesheet" />



</head>

<body class="g-sidenav-show  bg-gray-200">
<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
    <div class="container">
        <a class="navbar-brand" href="{{url('/')}}"  style="color: white">E-Shop</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav ms-auto">
                <li class="nav-item">
                    <a class="nav-link active" aria-current="page" href="#">Home</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{url('category')}}">Category</a>
                </li>
               <li class="nav-item">
                    <a class="nav-link" href="{{url('cart')}}">Cart</a>

                </li>
                <li class="nav-item">
                    <span class="badge badge-pill bg-gradient-primary cart-count" style="padding: 6px;margin: 9px">0</span>
                </li>

                <li class="nav-item">
                    <a class="nav-link" href="{{url('wishlist')}}">Wishlist</a>

                </li>
                <li class="nav-item">

                    <span class="badge badge-pill bg-success wishlist-count" style="padding: 6px;margin: 9px">0</span>
                </li>
                <li class="nav-item">
                    <a class="nav-link disabled" href="#" tabindex="-1" aria-disabled="true">Disabled</a>
                </li>
                @guest
                    @if (Route::has('login'))
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                        </li>
                    @endif
                        @if (Route::has('register'))
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                            </li>
                        @endif
                @else
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                            {{ Auth::user()->name }}
                        </a>
                        <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                            <li>
                                <a class="dropdown-item" href="{{url('my-orders')}}">
                                    My Orders
                                </a>
                            </li>
                            <li>
                                <a class="dropdown-item" href="#">
                                    My Profile
                                </a>
                            </li>
                            <li>
                                <a class="dropdown-item" href="{{ route('logout') }}" onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                    {{ __('Logout') }}
                                </a>
                                <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                    @csrf
                                </form>
                            </li>

                        </ul>
                    </li>

                @endguest
            </ul>
        </div>
    </div>
</nav>
{{--<div class="content">--}}
{{--<div id="carouselExampleIndicators" class="carousel slide" data-bs-ride="carousel">--}}
{{--    <div class="carousel-indicators">--}}
{{--        <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>--}}
{{--        <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="1" aria-label="Slide 2"></button>--}}
{{--        <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="2" aria-label="Slide 3"></button>--}}
{{--    </div>--}}

{{--    <div class="carousel-inner">--}}
{{--        <div class="carousel-item active">--}}
{{--            <img src="{{asset('assets/img/products/product-4-min.jpg')}}" class="d-block w-100" alt="...">--}}
{{--        </div>--}}
{{--        <div class="carousel-item">--}}
{{--            <img src="{{asset('assets/img/products/product-5-min.jpg')}}" class="d-block w-100" alt="...">--}}
{{--        </div>--}}
{{--        <div class="carousel-item">--}}
{{--            <img src="{{asset('assets/img/products/product-6-min.jpg')}}" class="d-block w-100" alt="...">--}}
{{--        </div>--}}
{{--    </div>--}}
{{--    <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="prev">--}}
{{--        <span class="carousel-control-prev-icon" aria-hidden="true"></span>--}}
{{--        <span class="visually-hidden">Previous</span>--}}
{{--    </button>--}}
{{--    <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="next">--}}
{{--        <span class="carousel-control-next-icon" aria-hidden="true"></span>--}}
{{--        <span class="visually-hidden">Next</span>--}}
{{--    </button>--}}
{{--</div>--}}
{{--</div>--}}

{{--<div class="container-fluid py-4">--}}
<div class="content">
        @yield('content')
{{--</div>--}}
    </div>
    <script src="{{asset('frontend/js/jquery-3.6.0.min.js')}}"></script>


<!-- Github buttons -->
<script async defer src="https://buttons.github.io/buttons.js"></script>
<!-- Control Center for Material Dashboard: parallax effects, scripts for the example pages etc -->
<script src="{{asset('assets/js/material-dashboard.min.js?v=3.0.0')}}"></script>
<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
    <script src="{{asset('frontend/js/bootstrap.bundle.min.js')}}"></script>
    <script src="{{asset('frontend/js/owl.carousel.min.js')}}"></script>
<script src="{{asset('frontend/js/custom.js')}}"></script>







@if(session('status'))
    <script>
        swal("{{session('status')}}");
    </script>
 @endif
@yield('scripts')
</body>

</html>






