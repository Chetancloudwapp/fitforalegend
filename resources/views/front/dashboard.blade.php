@extends('front.layout.master')
@section('content')
<div class="page-content page-content2" style="min-height:500px !impoportant;">
    <div class="holder breadcrumbs-wrap mt-0">
        <div class="container">
            <ul class="breadcrumbs">
                <li><a href="{{ route('web.home') }}">Home</a></li>
                <li><span>My account</span></li>
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
                                <span class="pro-name">Hello <span class="dash-nm"> Jhon Doe </span></span> </a>
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
                    <div class="row vert-margin">
                        <div class="col-sm-18 col-md-18">
                            <div class="card card2">
                                <div class="card-body">
                                    <div class="row">
                                        <div class="col-md-18">
                                            <h3 class="mb-1 profile-nm mb-2">Personal Information</h3>
                                        </div>
                                        <div class="col-md-6 ac-dtl mb-2">
                                            <label>First Name</label>
                                            <h6>Jenny</h6>
                                        </div>
                                        <div class="col-md-6 ac-dtl mb-2">
                                            <label>Last Name</label>
                                            <h6>Raider</h6>
                                        </div>
                                        <div class="col-md-6 ac-dtl mb-2">
                                            <label>Email Address</label>
                                            <h6>jennyraider@hotmail.com</h6>
                                        </div>
                                        <div class="col-md-6 ac-dtl mb-2">
                                            <label>Gender</label>
                                            <h6>Male</h6>
                                        </div>
                                        <div class="col-md-6 ac-dtl mb-2">
                                            <label>Phone Number</label>
                                            <h6> 876-432-4323</h6>
                                        </div>
                                    </div>
                                    <div class="mt-2 clearfix clearfix2">
                                        <a href="profile-edit.html" class="link-icn "><i class="icon-pencil"></i>Edit</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection