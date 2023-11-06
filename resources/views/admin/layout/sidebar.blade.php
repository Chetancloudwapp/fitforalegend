<aside class="main-sidebar sidebar-dark-primary elevation-4"> 
    <a href="{{ url('admin/dashboard')}}" style="background-color:white" class="brand-link"> 
        {{-- <img src="{{ url('admin/images/AdminLTELogo.png')}}" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" > 
        <span class="brand-text font-weight-light">Fit For a Legend</span>  --}}
        <img src="{{ url('admin/images/fitforalegend.png')}}" alt="AdminLTE Logo" style="align-content: center" width="60%" height="80%">
    </a>
    <div class="sidebar">
        <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                {{-- @if(Session::get('page') == 'Dashboard')
                    @php $active = "active" @endphp
                @else
                    @php $active = "" @endphp
                @endif --}}
                <li class="nav-item"> 
                    <a href="{{ url('admin/dashboard')}}" class="nav-link {{ Request::is('admin/dashboard') ? 'active' : '' }}"> <i class="nav-icon fas fa-tachometer-alt"></i>
                        <p> Dashboard </p>
                    </a>
                </li>
                <li class="nav-item"> 
                    <a href="#" class="nav-link"> <i class="nav-icon fas fa-copy"></i>
                        <p> Users <i class="fas fa-angle-left right"></i> </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item"> 
                            <a href="clinic_users.php" class="nav-link"> <i class="far fa-circle nav-icon"></i>
                                <p> Clinic User </p>
                            </a> 
                        </li>
                        <li class="nav-item"> 
                            <a href="patient_users.php" class="nav-link"> <i class="far fa-circle nav-icon"></i>
                                <p> Patient Users </p>
                            </a> 
                        </li>
                    </ul>
                </li>
                <li class="nav-item menu-is-opening menu-open"> 
                    <a href="#" class="nav-link"> <i class="fa-solid fa-gear"></i>
                        <p> Settings <i class="fas fa-angle-left right"></i> </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item"> 
                            <a href="myprofile.php" class="nav-link"> <i class="far fa-circle nav-icon"></i>
                                <p> Edit Profile </p>
                            </a> 
                        </li>
                        <li class="nav-item"> 
                            <a href="change_password.php" class="nav-link"> <i class="far fa-circle nav-icon"></i>
                                <p> Change Password </p>
                            </a> 
                        </li>
                        <li class="nav-item"> 
                            <a href="deactive_account.php" class="nav-link"> <i class="far fa-circle nav-icon"></i>
                                <p> Deactivate Account </p>
                            </a> 
                        </li>
                    </ul>
                </li>
                <li class="nav-item"> 
                    <a href="{{ url('admin/category')}}" class="nav-link {{ Request::is('admin/category') || Request::is('admin/subcategory') ||  Request::is('admin/childcategory') ? 'active' : '' }}"><i class="fa-solid fa-layer-group"></i>
                        <p>Category<i class="fas fa-angle-left right"></i> </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item"> 
                            <a href="{{ url('admin/category')}}" class="nav-link {{ Request::is('admin/category') ? 'active' : '' }}"> <i class="far fa-circle nav-icon"></i>
                                <p> Category </p>
                            </a> 
                        </li>
                        <li class="nav-item"> 
                            <a href="{{ url('admin/subcategory')}}" class="nav-link {{ Request::is('admin/subcategory') ? 'active' : '' }}"> <i class="far fa-circle nav-icon"></i>
                                <p> Sub Category </p>
                            </a> 
                        </li>
                        <li class="nav-item"> 
                            <a href="{{ url('admin/childcategory')}}" class="nav-link {{ Request::is('admin/childcategory') ? 'active' : '' }}"> <i class="far fa-circle nav-icon"></i>
                                <p> Child Category </p>
                            </a> 
                        </li>
                    </ul>
                </li>
                <li class="nav-item"> 
                    <a href="{{ url('admin/product')}}" class="nav-link {{ Request::is('admin/product') || Request::is('admin/product/add') || Request::is('admin/brands') || Request::is('admin/brands/add') || Request::is('admin/color') ||  Request::is('admin/color/add') || Request::is('admin/variation/add/{id}')? 'active' : '' }}"> <i class="fa-solid fa-bag-shopping"></i>
                        <p>Product<i class="fas fa-angle-left right"></i> </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item"> 
                            <a href="{{ url('admin/product')}}" class="nav-link {{ Request::is('admin/product') || Request::is('admin/variation/add/{id}') ? 'active' : '' }}"> <i class="far fa-circle nav-icon"></i>
                                <p> Product </p>
                            </a> 
                        </li>
                        <li class="nav-item"> 
                            <a href="{{ url('admin/brands')}}" class="nav-link {{ Request::is('admin/brands') ? 'active' : '' }}"> <i class="far fa-circle nav-icon"></i>
                                <p> Brands </p>
                            </a> 
                        </li>
                        <li class="nav-item"> 
                            <a href="{{ url('admin/color')}}" class="nav-link {{ Request::is('admin/color') || Request::is('admin/color/add') ? 'active' : '' }}"> <i class="far fa-circle nav-icon"></i>
                                <p> Color </p>
                            </a> 
                        </li>
                    </ul>
                </li>
                <li class="nav-item"> 
                    <a href="{{ url('admin/logout')}}" class="nav-link"> <i class="nav-icon fas fa-th"></i>
                        <p> Logout </p>
                    </a> 
                </li>
            </ul>
        </nav>
    </div>
</aside>