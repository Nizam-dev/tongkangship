<nav class="navbar navbar-expand-lg bg-white navbar-light shadow border-top border-5 border-primary sticky-top p-0">
    <a href="{{url('')}}" class="navbar-brand bg-primary d-flex align-items-center px-4 px-lg-5">
        <h2 class="mb-2 text-white">
        <img src="{{asset('images/logo.png')}}" class="img-fluid" width="50px" alt="" srcset="">    
        TongkangShip</h2>
    </a>
    <button type="button" class="navbar-toggler me-4" data-bs-toggle="collapse" data-bs-target="#navbarCollapse">
        <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarCollapse">
        <div class="navbar-nav ms-auto p-4 p-lg-0">
            <a href="{{url('')}}" class="nav-item nav-link {{ request()->is('/') ? 'active' : '' }}">Home</a>
            <a href="{{url('kapal')}}" class="nav-item nav-link {{ request()->is('kapal') ? 'active' : '' }}">Kapal Tongkang</a>
            <a href="{{url('trackingall')}}" class="nav-item nav-link {{ request()->is('trackingall') ? 'active' : '' }}">Tracking</a>
            <a href="{{url('about')}}" class="nav-item nav-link {{ request()->is('about') ? 'active' : '' }}">About</a>
            @if(auth()->check())
            <div class="nav-item dropdown border border-left px-2">
                <a href="#" class="nav-link dropdown-toggle" data-bs-toggle="dropdown"> <i class="bi bi-person"></i> User</a>
                <div class="dropdown-menu fade-up m-0">
                    <a href="{{url('profile')}}" class="dropdown-item">Profle</a>
                    <a href="{{url('transaksi')}}" class="dropdown-item">Transaksi</a>
                    <a href="{{url('logout')}}" class="dropdown-item text-danger">
                        <i class="bi bi-box-arrow-right me-2"></i>Logout</a>
                </div>
            </div>
            @else
            <a href="{{url('login')}}" class="nav-item nav-link {{ request()->is('login') ? 'active' : '' }}">Login</a>
            @endif
        </div>
</nav>