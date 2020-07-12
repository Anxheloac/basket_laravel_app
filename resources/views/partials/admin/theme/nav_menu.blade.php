<ul class="navbar-nav flex-column">
    <li class="nav-divider">
        Menu
    </li>
    <li class="nav-item ">
        <a class="nav-link @if(\Request::is('admin/dashboard')) active  @endif" href="#" >
            <i class="fa fa-fw fa-user-circle"></i>
            Dashboard 
            <span class="badge badge-success">6</span>
        </a>
    </li>
    <li class="nav-item">
        <a class="nav-link @if(\Request::is('admin/cars*')) active  @endif" href="{{ route('admin.cars.index') }}" ><i class="fas fa-fw fa-car"></i>Cars</a>
    </li>
    <li class="nav-item">
        <a class="nav-link @if(\Request::is('admin/orders*')) active  @endif" href="{{ route('admin.orders.index') }}" ><i class="fas fa-fw fa-list-alt"></i>Orders
        </a>
    </li>
</ul>