<nav class="main-header navbar navbar-expand navbar-white navbar-light">
    <ul class="navbar-nav">
        <li class="nav-item"> <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a> </li>
        <li class="nav-item"> <a class="nav-link" href="#" style="float:right" role="button"></i>Hello, {{ Auth::guard('vendor')->user()->first_name }}</a> </li>
        <li class="nav-item d-none d-sm-inline-block" style="float:right; display:inline-block"> <a href="{{ url('vendor/vendor-login')}}" class="nav-link" role="button"><i class="fa-solid fa-right-from-bracket"></i>&nbsp;&nbsp;Logout</a></li>
    </ul>
</nav>