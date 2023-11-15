@extends('front.layout.master')
@section('content')
<div class="page-content page-content2">
    <div class="holder breadcrumbs-wrap mt-0">
        <div class="container">
            <ul class="breadcrumbs">
                <li><a href="{{ route('web.dashboard')}}">Home</a></li>
                <li><span>Edit Profile</span></li>
            </ul>
        </div>
    </div>
    <div class="holder">
        <div class="container">
            <div class="row">
                <div class="col-md-4 aside aside--left">
                    <div class="list-group">
                        <ul class="side-ulist mb-2">
                            <li>
                                <a href="javascript:;" class="list-group-item ">
                                <img src="https://static-assets-web.flixcart.com/fk-p-linchpin-web/fk-cp-zion/img/profile-pic-male_4811a1.svg" />
                                <span class="pro-name">Hello <span class="dash-nm">{{ Auth::guard('web')->user()->first_name}} {{ Auth::guard('web')->user()->last_name}} </span></span> </a>
                            </li>
                        </ul>
                        <ul class="side-ulist side-ulist2">
                            <li>
                                <a href="account-history.html" class="list-group-item">
                                <i class="fa fa-shopping-cart mr-1" aria-hidden="true"></i> My Orders </a>
                            </li>
                            <li>
                                <a href="javascript:;" class="list-group-item">
                                <i class="icon-user mr-1" ></i> Account Setting</a>
                                <div>
                                    <ul class="profile-list">
                                        <li> <a href="dashboard.html">Profile Information </a> </li>
                                    </ul>
                                </div>
                            </li>
                            <li>
                                <a href="javascript:;" class="list-group-item">
                                <i class="fas fa-id-card-alt mr-1" ></i> My Stuff</a>
                                <div>
                                    <ul class="profile-list">
                                        <li> <a href="account-review.html">My reviews and ratings </a> </li>
                                        <li> <a href="account-notification.html">All Notifications</a> </li>
                                        <li> <a href="account-wishlist.html">My Wishlist</a> </li>
                                    </ul>
                                </div>
                            </li>
                            <li>
                                <a href="{{ route('web.logout')}}" class="list-group-item">
                                <i class="fa fa-sign-out mr-1" ></i> Logout</a>
                            </li>
                        </ul>
                    </div>
                </div>
                <div class="col-md-14 aside">
                    <div class=" vert-margin">
                        <div class="card mt-3 card2" >
                            <div class="card-body">
                                <h3 class="mb-1 profile-nm mb-2">Edit personal Information</h3>
                                @if ($errors->any())
                                <div class="alert alert-danger">
                                    <ul>
                                        @foreach ($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                        @endforeach
                                    </ul>
                                </div>
                                @endif
                                @if(Session::has('success_message'))
                                <div class="alert alert-success alert-dismissible fade show" role="alert">
                                    <strong>success:</strong> {{ Session::get('success_message')}}
                                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                      <span aria-hidden="true">&times;</span>
                                    </button>
                                  </div>
                                @endif
                                <form action="{{ route('web.editProfile')}}" method="POST" enctype="multipart/form-data">
                                    @csrf
                                    <div class="row mt-2">
                                        <div class="col-sm-9">
                                            <label class="text-uppercase">First Name:</label>
                                            <div class="form-group">
                                                <input type="text" name="first_name" id="first_name" class="form-control form-control--sm" value="{{ Auth::guard('web')->user()->first_name}}" placeholder="Enter First Name">
                                            </div>
                                        </div>
                                        <div class="col-sm-9">
                                            <label class="text-uppercase">Last Name:</label>
                                            <div class="form-group">
                                                <input type="text" name="last_name" value="{{ Auth::guard('web')->user()->last_name}}" class="form-control form-control--sm" placeholder="Enter Last Name">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row mt-2">
                                        <div class="col-sm-9">
                                            <label class="text-uppercase">E-mail:</label>
                                            <div class="form-group">
                                                <input type="email" name="email" value="{{ Auth::guard('web')->user()->email}}" class="form-control form-control--sm" placeholder="example@gmail.com">
                                            </div>
                                        </div>
                                        <div class="col-sm-9">
                                            <label class="text-uppercase">Phone:</label>
                                            <div class="form-group">
                                                {{-- <input type="text" name="mobile" value="{{ Auth::guard('web')->user()->mobile}}" class="form-control form-control--sm" placeholder="876-432-4323"> --}}
                                                <div class="row">
                                                    <div class="col-2 pr-0"> 
                                                         <select class="form-control" name="country_code" id="country_code">
                                                         <option value="">{{ Auth::guard('web')->user()->country_code}}</option>
                                                             @foreach($get_countries as $value)
                                                                 <option value="{{ $value['phoneCode']}}">{{ $value['phoneCode']}}</option>
                                                             @endforeach
                                                         </select>
                                                    </div>
                                                     <div class="col-16 pl-0">
                                                 <input type="text" value="{{ Auth::guard('web')->user()->mobile}}" placeholder="Enter your Phone number" class="form-control" name="mobile">
                                                 </div>
                                                 </div>
                                            </div>
                                        
                                        </div>
                                       
                                        <!--<div class="col-sm-9">-->
                                        <!--    <label class="d-block">Your Gender</label>-->
                                        <!--      <div class="form-check-inline">-->
                                        <!--        <label class="form-check-label">-->
                                        <!--          <input type="radio" class="form-check-input" name="optradio">Male-->
                                        <!--        </label>-->
                                        <!--      </div>-->
                                        <!--      <div class="form-check-inline">-->
                                        <!--    <label class="form-check-label">-->
                                        <!--      <input type="radio" class="form-check-input" name="optradio">Female-->
                                        <!--    </label>-->
                                        <!--  </div>-->
                                        <!--</div>-->
                                    </div>
                                    <div class="mt-2">
                                        {{-- <a href="dashboard.html"> --}}
                                        {{-- <button type="reset" class="btn btn--alt ">Cancel</button> --}}
                                        {{-- </a> --}}
                                        {{-- <a href="dashboard.html"> --}}
                                        <button type="submit" class="btn ml-1">Update</button>
                                        {{-- </a> --}}
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection