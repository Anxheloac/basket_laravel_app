<!DOCTYPE html>
<html lang="zxx">

<head>
    <meta charset="UTF-8">
    <meta name="description" content="HVAC Template">
    <meta name="keywords" content="HVAC, unica, creative, html">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>@yield('title', 'Car')</title>

    <!-- Google Font -->
    <link href="https://fonts.googleapis.com/css2?family=Lato:wght@300;400;700;900&display=swap" rel="stylesheet">

    <!-- Css Styles -->
    <link rel="stylesheet" href="/front_theme/css/bootstrap.min.css" type="text/css">
    <link rel="stylesheet" href="/front_theme/css/font-awesome.min.css" type="text/css">
    <link rel="stylesheet" href="/front_theme/css/elegant-icons.css" type="text/css">
    <link rel="stylesheet" href="/front_theme/css/nice-select.css" type="text/css">
    <link rel="stylesheet" href="/front_theme/css/magnific-popup.css" type="text/css">
    <link rel="stylesheet" href="/front_theme/css/jquery-ui.min.css" type="text/css">
    <link rel="stylesheet" href="/front_theme/css/owl.carousel.min.css" type="text/css">
    <link rel="stylesheet" href="/front_theme/css/slicknav.min.css" type="text/css">
    <link rel="stylesheet" href="/front_theme/css/style.css" type="text/css">
    <link rel="stylesheet" type="text/css" href="//cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css">


    @yield('links')
</head>

<body>
    <!-- Page Preloder -->
    <div id="preloder">
        <div class="loader"></div>
    </div>

    <!-- Offcanvas Menu Begin -->
    <div class="offcanvas-menu-overlay"></div>
    <div class="offcanvas-menu-wrapper">
        <div class="offcanvas__widget">
            <a href="#"><i class="fa fa-cart-plus"></i></a>
            <a href="{{ route('login') }}" class="primary-btn">Login</a>
        </div>
        <div class="offcanvas__logo">
            <a href="./index.html"><img src="img/logo.png" alt=""></a>
        </div>
        <div id="mobile-menu-wrap"></div>
        <ul class="offcanvas__widget__add">
            <li><i class="fa fa-clock-o"></i> Week day: 08:00 am to 18:00 pm</li>
            <li><i class="fa fa-envelope-o"></i>
                @if(Auth::check())
                    {{ Auth::user()->email }}
                @endif
            </li>
        </ul>
    </div>
    <!-- Offcanvas Menu End -->

    <!-- Header Section Begin -->
    <header class="header">
        <div class="header__top">
            <div class="container">
                <div class="row">
                    <div class="col-lg-7">
                        <ul class="header__top__widget">
                            <li>
                                @if(Auth::check())
                                    <i class="fa fa-envelope-o"></i>
                                    {{ Auth::user()->email }}
                                @endif
                            </li>
                        </ul>
                    </div>
                    <div class="col-lg-5">
                        <div class="header__top__right">
                            @if(Auth::check())
                                <div class="header__top__social">
                                    <a href="#" onclick="event.preventDefault();document.getElementById('logout-form').submit();">
                                        <i class="fa fa-sign-out" ></i>
                                    </a>
                                </div>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="container">
            <div class="row">
                <div class="col-lg-2">
                    <div class="header__logo">
                        <a href="./index.html"><img src="img/logo.png" alt=""></a>
                    </div>
                </div>
                <div class="col-lg-10">
                    @include('partials.frontend.theme.nav_menu')
                </div>
            </div>
            <div class="canvas__open">
                <span class="fa fa-bars"></span>
            </div>
        </div>

        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
            @csrf
        </form>
    </header>
    <!-- Header Section End -->

    <!-- Hero Section Begin -->
    @yield('body')
    <!-- Hero Section End -->


    <!-- Footer Section Begin -->
    @include('partials.frontend.theme.footer')
    <!-- Footer Section End -->

    <!-- Search Begin -->
    <div class="search-model">
        <div class="h-100 d-flex align-items-center justify-content-center">
            <div class="search-close-switch">+</div>
            <form class="search-model-form">
                <input type="text" id="search-input" placeholder="Search here.....">
            </form>
        </div>
    </div>
    <!-- Search End -->

    <!-- Js Plugins -->
    <script src="/front_theme/js/jquery-3.3.1.min.js"></script>
    <script src="/front_theme/js/bootstrap.min.js"></script>
    <script src="/front_theme/js/jquery.nice-select.min.js"></script>
    <script src="/front_theme/js/jquery-ui.min.js"></script>
    <script src="/front_theme/js/jquery.magnific-popup.min.js"></script>
    <script src="/front_theme/js/mixitup.min.js"></script>
    <script src="/front_theme/js/jquery.slicknav.js"></script>
    <script src="/front_theme/js/owl.carousel.min.js"></script>
    <script src="/front_theme/js/main.js"></script>
    <script type="text/javascript" src="//cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>

    <script type="text/javascript">
        @if(Session::has('message'))
            toastr.{{Session::get('type', 'info')}}('{{ Session::get('message') }}')
        @endif
    </script>

    <script type="text/javascript" src="/front_theme/js/custom.js"></script>

    @stack('scripts')
</body>

</html>