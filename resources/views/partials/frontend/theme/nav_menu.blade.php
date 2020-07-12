<div class="header__nav">
<nav class="header__menu">
    <ul>
        <li class="active"><a href="./index.html">Home</a></li>
        <li><a href="{{ route('frontend.cars.index') }}">Cars</a></li>
        @if(!Auth::check())
            <li><a href="{{ route('register') }}">Register</a></li>
        @endif
        @if(Auth::check() && Auth::user()->isAdmin())
            <li><a href="{{ route('admin.cars.index') }}">Dashboard</a></li>
        @endif
    </ul>
</nav>
<div class="header__nav__widget">
    <div class="header__nav__widget__btn">
        <a href="{{ route('frontend.basket.view') }}"><i class="fa fa-cart-plus"></i></a>
        <a href="#" class="search-switch"><i class="fa fa-search"></i></a>
    </div>
    @if(!Auth::check())
        <a href="{{ route('login') }}" class="primary-btn">Login</a>
    @endif
</div>
</div>