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
							<div class="col-sm-9">
								<div class="form-group">
									<select id="gender" name="gender" class="form-control stock">
										<option value="">Select gender</option>
										<option value="Male">Male</option>
										<option value="Female">Female</option>
										<option value="Transgender">Transgender</option>
										<option value="Others">Others</option>
										{{-- <option value="Female"
										{{ $vendors['status'] == 'Deactive' ? 'selected' : '' }}>Deactive
										</option> --}}
									</select>
								</div>
                                @error('gender')
                                <div class="col-form-alert-label">
                                    {{ $message }}
                                </div>
                            @enderror
							</div>
							{{-- <div class="col-md-6">
								<div class="form-group mb-3 {{ $errors->has('status') ? 'has-danger' : '' }}">
									<label class="col-form-label">Status</label>
									<select id="status" name="status" class="form-control stock">
										<option value="Active">Active</option>
										<option value="Deactive"
										{{ $vendors['status'] == 'Deactive' ? 'selected' : '' }}>Deactive
										</option>
									</select>
									@error('status')
									<div class="col-form-alert-label">
										{{ $message }}
									</div>
									@enderror
								</div>
							</div> --}}
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
						<div class="form-group">
							<!--<input type="text" id="mobile_code" class="form-control" placeholder="Phone Number" name="name">-->
							<div class="row">
							   <div class="col-2 pr-0"> 
								    <select class="form-control" name="country_code" id="country_code">
									<option value="">+1</option>
										@foreach($get_countries as $value)
											<option value="{{ $value['phoneCode']}}">{{ $value['phoneCode']}}</option>
										@endforeach
									</select>
							   </div>
								<div class="col-16 pl-0">
							<input placeholder="Enter your Phone number" class="form-control" name="mobile" type="text" value="">
							</div>
							</div>
						</div>
						<div class="clearfix">
							<input id="checkbox1" name="checkbox1" type="checkbox" checked="checked">
							<label for="checkbox1">By registering your details you agree to our <a href="javascript:;" class="custom-color" >Terms and Conditions</a> and <a href="javascript:;" class="custom-color" >Cookie Policy</a></label>
						</div>
						<div class="text-center">
							<button type="submit" class="btn">create an account</button>
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