@extends('front.layout.master')
@section('content')
<div class="page-content">
    <div class="holder breadcrumbs-wrap mt-0">
        <div class="container">
            <ul class="breadcrumbs">
                <li><a href="{{ route('web.home')}}">Home</a></li>
                <li><span>Create account</span></li>
            </ul>
        </div>
    </div>
    <div class="holder">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-18 col-lg-12">
                    <h2 class="text-center">Login</h2>
                    <div class="form-wrapper">
                        @if ($errors->any())
                        <div class="alert alert-danger">
                            <ul>
                                @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                        @endif
                        @if(Session::has('error_message'))
                        <div class="alert alert-danger alert-dismissible fade show" role="alert">
                            <strong>Error:</strong> {{ Session::get('error_message')}}
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                              <span aria-hidden="true">&times;</span>
                            </button>
                          </div>
                        @endif
                        <form action="{{ route('web.login')}}" method="post" enctype="multipart/form-data">
                            @csrf
                            <div class="row">
                                <div class="col-sm-11 m-auto">
                                    <div class="form-group">
                                        <input type="text" name="email" class="form-control" placeholder="E-mail">
                                    </div>
                                </div>
                                <div class="col-sm-11 m-auto">
                                    <div class="form-group">
                                        <input type="password" name="password" class="form-control" placeholder="Password">
                                    </div>
                                </div>
                                <div class="col-md-18 mt-2">
                                    <div class="text-center">
                                        {{-- <a href="{{ url('/user_login')}}"> --}}
                                        <button class="btn">Login</button>
                                        </a>
                                    </div>
                                </div>
                                <div class="col-md-18 m-auto text-center mt-2 pt-2">
                                    <div class="clearfix">
                                        <label for="checkbox1">Don't have an account ? <a href="{{ route('web.registerUser')}}" class="custom-color" > Sign Up here </a> 
                                    </div>
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