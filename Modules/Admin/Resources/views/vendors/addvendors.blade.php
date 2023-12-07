@extends('admin::admin.layout.layout')
@section('content')
<div class="content-wrapper">
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>{{ $title }}</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="{{ url('admin/dashboard')}}">Home</a></li>
                        <li class="breadcrumb-item active">{{ $title }}</li>
                    </ol>
                </div>
            </div>
        </div>
    </section>
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-title nofloat"> <span>{{ $title}} </span>
                                <span>
                                <a href="{{ url('admin/vendors')}}">
                                <button onClick="back();"
                                    class="btn btn-primary waves-effect waves-light f-right d-inline-block md-trigger"
                                    data-modal="modal-13" style="float: right"> <i class="ti-control-backward m-r-5"></i> Back
                                </button>
                                </a>
                                </span>
                            </h3>
                        </div>
                        <div class="card-body">
                            <form id="main" method="post" autocomplete="off" enctype="multipart/form-data">
                                @csrf
                                <div class="row">
                                    <input type="hidden" name="id" value="{{$vendors['id']}}">
                                    <div class="col-md-6">
                                        <div class="form-group mb-3 {{ $errors->has('first_name') ? 'has-danger' : '' }}">
                                            <label class="col-form-label">First Name<span class="mandatory cls" style="color:red; font-size:15px">*</span></label>
                                            <input
                                                class="form-control {{ $errors->has('name') ? 'form-control-danger' : '' }}"
                                                name="first_name" type="text"
                                                value="{{ old('first_name', $vendors['first_name']) }}" placeholder="Enter first name">      
                                            @error('first_name')
                                            <div class="col-form-alert-label">
                                                {{ $message }}
                                            </div>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group mb-3 {{ $errors->has('last_name') ? 'has-danger' : '' }}">
                                            <label class="col-form-label">Last Name<span class="mandatory cls" style="color:red; font-size:15px">*</span></label>
                                            <input
                                                class="form-control {{ $errors->has('last_name') ? 'form-control-danger' : '' }}"
                                                name="last_name" type="text"
                                                value="{{ old('last_name', $vendors['last_name']) }}" placeholder="Enter last name">      
                                            @error('last_name')
                                            <div class="col-form-alert-label">
                                                {{ $message }}
                                            </div>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group mb-3">
                                            <!--<input type="text" id="mobile_code" class="form-control" placeholder="Phone Number" name="name">-->
                                            <label class="col-form-label">Mobile Number<span class="mandatory cls" style="color:red; font-size:15px">*</span></label>
                                            <div class="row">
                                               <div class="col-2 pr-0"> 
                                                    <select class="form-control" name="country_code" id="country_code">
                                                    <option value="">+1</option>
                                                        @foreach($get_countries as $value)
                                                            <option value="{{ $value['phoneCode']}}" {{ $value['phoneCode'] == $vendors['country_code'] ? 'selected' : ''}}>{{ $value['phoneCode']}}</option>
                                                        @endforeach
                                                    </select>
                                               </div>
                                                <div class="col-16 pl-0">
                                            <input placeholder="Enter your Phone number" value="{{ old('mobile', $vendors['mobile']) }}" class="form-control" name="mobile" type="text" value="">
                                            </div>
                                            </div>
                                        </div>
                                    </div>
                                    {{-- <div class="col-md-6">
                                        <div class="form-group mb-3 {{ $errors->has('country_code') ? 'has-danger' : '' }}">
                                            <label class="col-form-label">Country Code</label>
                                            <select class="form-control" name="country_code" id="country_code">
                                                <option value="">Select Country Code</option>
                                                @foreach($get_countries as $value)
                                                    <option value="{{ $value['phoneCode']}}" {{ $value['phoneCode'] == $vendors['country_code'] ? 'selected' : ''}}>{{ $value['phoneCode']}}</option>
                                                   <option value="{{ $value['id']}}" {{ $value['id'] == $products['color'] ? 'selected' : ''}}>{{ $value['name']}}</option>

                                                @endforeach
                                            </select>
                                            @error('country_code')
                                            <div class="col-form-alert-label">
                                                {{ $message }}
                                            </div>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group mb-3 {{ $errors->has('mobile') ? 'has-danger' : '' }}">
                                            <label class="col-form-label">Mobile<span class="mandatory cls" style="color:red; font-size:15px">*</span></label>
                                            <input
                                                class="form-control {{ $errors->has('mobile') ? 'form-control-danger' : '' }}"
                                                name="mobile" type="number"
                                                value="{{ old('mobile', $vendors['mobile']) }}" placeholder="Enter mobile number">      
                                            @error('mobile')
                                            <div class="col-form-alert-label">
                                                {{ $message }}
                                            </div>
                                            @enderror
                                        </div>
                                    </div> --}}
                                    <div class="col-md-6">
                                        <div class="form-group mb-3 {{ $errors->has('email') ? 'has-danger' : '' }}">
                                            <label class="col-form-label">Email<span class="mandatory cls" style="color:red; font-size:15px">*</span></label>
                                            <input
                                                class="form-control {{ $errors->has('email') ? 'form-control-danger' : '' }}"
                                                name="email" type="text" autocomplete="off"
                                                value="{{ old('email', $vendors['email']) }}" placeholder="Enter your email">      
                                            @error('email')
                                            <div class="col-form-alert-label">
                                                {{ $message }}
                                            </div>
                                            @enderror
                                        </div>
                                    </div>
                                    @if($vendors['id'] =='')
                                    <div class="col-md-6">
                                        <div class="form-group mb-3 {{ $errors->has('password') ? 'has-danger' : '' }}">
                                            <label class="col-form-label">Password<span class="mandatory cls" style="color:red; font-size:15px">*</span></label>
                                            <input
                                                class="form-control {{ $errors->has('password') ? 'form-control-danger' : '' }}"
                                                name="password" type="password" autocomplete="off"
                                                value="{{ old('password', $vendors['password']) }}" placeholder="Enter Password">      
                                            @error('password')
                                            <div class="col-form-alert-label">
                                                {{ $message }}
                                            </div>
                                            @enderror
                                        </div>
                                    </div>     
                                    @endif
                                    <div class="col-md-6">
                                        <div class="form-group mb-3 {{ $errors->has('shop_name') ? 'has-danger' : '' }}">
                                            <label class="col-form-label">Shop Name</label>
                                            <input
                                                class="form-control {{ $errors->has('shop_name') ? 'form-control-danger' : '' }}"
                                                name="shop_name" type="text"
                                                value="{{ old('shop_name', $vendors['shop_name']) }}" placeholder="Enter Shop name">      
                                            @error('shop_name')
                                            <div class="col-form-alert-label">
                                                {{ $message }}
                                            </div>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group mb-3 {{ $errors->has('shop_address') ? 'has-danger' : '' }}">
                                            <label class="col-form-label">Shop Address</label>
                                            <input
                                                class="form-control {{ $errors->has('shop_address') ? 'form-control-danger' : '' }}"
                                                name="shop_address" type="text"
                                                value="{{ old('shop_address', $vendors['shop_address']) }}" placeholder="Enter Shop Address">      
                                            @error('shop_address')
                                            <div class="col-form-alert-label">
                                                {{ $message }}
                                            </div>
                                            @enderror
                                        </div>
                                    </div>

                                    <div class="col-md-6">
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
                                    </div>
                                </div>
                                <div class="card-footer"> <button type="submit" class="btn btn-primary">Submit</button> </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script type="text/javascript">
      
//    $(document).ready(function () {
//       $('#parent_id').change(function () {
//          var categoryId = $(this).val();  
         
//          if(categoryId == ''){
//             // $('#subcategory_id').hide();
//             subcategoryDropdown.style.display = "none"; 
//         }else{
//             $.ajax({
//                 url: "{{ url('admin/get-subcategory')}}", 
//                 method: 'POST',
//                 data: { category_id: categoryId, _token: "{{ csrf_token() }}" },
//                 success: function (data) {
//                     // subcategoryDropdown.style.display = "block"; 
//                     var subcategoryDropdown = $('#subcategory_id');
//                     subcategoryDropdown.empty(); 
//                     subcategoryDropdown = $('#subcategory_id').html('<option value="">Select Sub Category</option>'); 
//                     $.each(data, function (key, value) {
//                         subcategoryDropdown.append($('<option value="">Select Sub Category</option>').attr('value', key).text(value));
//                     });
//                 //    subcategoryDropdown.show();
//                 }
//              });
//          }
//       });
//    });

   $(document).ready(function () {
      $('#parent_id').change(function () {
         var categoryId = $(this).val();       
         $.ajax({
            url: "{{ url('admin/get-subcategory')}}", 
            method: 'POST',
            data: { category_id: categoryId, _token: "{{ csrf_token() }}" },
            success: function (data) {
                // if(count(data>0)){
                    var subcategoryDropdown = $('#subcategory_id');
                    subcategoryDropdown.empty(); 
                    subcategoryDropdown = $('#subcategory_id').html('<option value="">Select Sub Category</option>'); 
                    $.each(data, function (key, value) {
                       subcategoryDropdown.append($('<option value="">Select Sub Category</option>').attr('value', key).text(value));   
                   });
                // }else{
                //     alert("Error_message");
                // }
            }
         });
      });
   });
</script>
<script type="text/javascript">
   $(document).ready(function () {
      $('#subcategory_id').change(function () {
         var subcategoryId = $(this).val();       
         $.ajax({
             url: "{{ url('admin/get-childcategory')}}", 
             method: 'POST',
             data: { subcategory_id: subcategoryId, _token: "{{ csrf_token() }}" },
            success: function (data) {
               var childcategoryDropdown = $('#childcategory_id');
               childcategoryDropdown.empty(); 
               childcategoryDropdown = $('#childcategory_id').html('<option value="">Select Child Category</option>'); 
               $.each(data, function (key, value) {
                childcategoryDropdown.append($('<option value="">Select child Category</option>').attr('value', key).text(value));
               });
            }
         });
      });
   });
</script>
@endsection