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
				<h2 class="text-center">Create an Account</h2>
				<div class="form-wrapper">
					<p>To access your whishlist, address book and contact preferences and to take advantage of our speedy checkout, create an account with us now.</p>
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
                            <strong>Success:</strong> {{ Session::get('success_message')}}
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                    @endif
					<form action="{{ route('web.registerUser')}}" method="post" enctype="multipart/form-data">
                        @csrf
						<div class="row">
							<div class="col-sm-9">
								<div class="form-group">
									<input type="text" name="first_name" class="form-control" placeholder="First name">
								</div>
                                @error('first_name')
                                <div class="col-form-alert-label">
                                    {{ $message }}
                                </div>
                            @enderror
							</div>
							<div class="col-sm-9">
								<div class="form-group">
									<input type="text" name="last_name" class="form-control" placeholder="Last name">
								</div>
                                @error('last_name')
                                <div class="col-form-alert-label">
                                    {{ $message }}
                                </div>
                            @enderror
							</div>
							<div class="col-sm-9">
								<div class="form-group">
									<input type="text" name="email" class="form-control" placeholder="Enter email">
								</div>
                                @error('email')
                                <div class="col-form-alert-label">
                                    {{ $message }}
                                </div>
                            @enderror
							</div>
						</div>
						<div class="form-group">
							<input type="password" name="password" class="form-control" placeholder="Password">
                            @error('password')
                            <div class="col-form-alert-label">
                                {{ $message }}
                            </div>
                        @enderror
						</div>
						<div class="form-group">
							<input type="password" name="confirm_password" class="form-control" placeholder="Confirm Password">
                            @error('confirm_password')
                            <div class="col-form-alert-label">
                                {{ $message }}
                            </div>
                        @enderror
						</div>
						<div class="clearfix">
							<input id="checkbox1" name="checkbox1" type="checkbox" checked="checked">
							<label for="checkbox1">By registering your details you agree to our <a href="javascript:;" class="custom-color" >Terms and Conditions</a> and <a href="javascript:;" class="custom-color" >Cookie Policy</a></label>
						</div>
						<div class="text-center">
							<button class="btn">create an account</button>
						</div>
                            <div class="clearfix text-center">
                            <label for="checkbox1">Already have an account ? <a href="{{ route('web.login')}}" class="custom-color" > Login here</label>
                        </div>
					</form>
				</div>
			</div>
		</div>
	</div>
</div>
</div>
@endsection