@extends('vendor.layout.layout')
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
                                <a href="{{ url('vendor/vendor-product')}}">
                                <button onClick="back();"
                                    class="btn btn-primary waves-effect waves-light f-right d-inline-block md-trigger"
                                    data-modal="modal-13" style="float: right"> <i class="ti-control-backward m-r-5"></i> Back
                                </button>
                                </a>
                                </span>
                            </h3>
                        </div>
                        <div class="card-body">
                            <form id="main" method="post" enctype="multipart/form-data">
                                @csrf
                                <div class="row">
                                    <input type="hidden" name="id" value="{{$products['id']}}">
                                    <div class="col-md-6">
                                        <div class="form-group mb-3 {{ $errors->has('name') ? 'has-danger' : '' }}">
                                            <label class="col-form-label">Name<span class="mandatory cls" style="color:red; font-size:15px">*</span></label>
                                            <input
                                                class="form-control {{ $errors->has('name') ? 'form-control-danger' : '' }}"
                                                name="name" type="text"
                                                value="{{ old('name', $products['name']) }}" placeholder="Enter name">      
                                            @error('name')
                                            <div class="col-form-alert-label">
                                                {{ $message }}
                                            </div>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group mb-3 {{ $errors->has('selling_price') ? 'has-danger' : '' }}">
                                            <label class="col-form-label">Selling Price<span class="mandatory cls" style="color:red; font-size:15px">*</span></label>
                                            <input
                                                class="form-control {{ $errors->has('selling_price') ? 'form-control-danger' : '' }}"
                                                name="selling_price" type="text"
                                                value="{{ old('selling_price', $products['selling_price']) }}" placeholder="Enter Selling Price">      
                                            @error('selling_price')
                                            <div class="col-form-alert-label">
                                                {{ $message }}
                                            </div>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group mb-3 {{ $errors->has('cost_price') ? 'has-danger' : '' }}">
                                            <label class="col-form-label">Cost Price<span class="mandatory cls" style="color:red; font-size:15px">*</span></label>
                                            <input
                                                class="form-control {{ $errors->has('cost_price') ? 'form-control-danger' : '' }}"
                                                name="cost_price" type="text"
                                                value="{{ old('cost_price', $products['cost_price']) }}" placeholder="Enter Cost Price">      
                                            @error('cost_price')
                                            <div class="col-form-alert-label">
                                                {{ $message }}
                                            </div>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group mb-3 {{ $errors->has('brand') ? 'has-danger' : '' }}">
                                            <label class="col-form-label">Brand<span class="mandatory cls" style="color:red; font-size:15px">*</span></label>
                                            <select class="form-control" id="brand" name="brand">
                                                <option value="">Select Brands</option>
                                                @foreach ($get_brands as $value)
                                                    <option value="{{ $value['id']}}" {{ $value['id'] == $products['brand'] ? 'selected' : ''}}>{{ $value['name']}}</option>
                                                @endforeach
                                            </select> 
                                            @error('brand')
                                            <div class="col-form-alert-label">
                                                {{ $message }}
                                            </div>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group mb-3 {{ $errors->has('size') ? 'has-danger' : '' }}">
                                            <label class="col-form-label">Size<span class="mandatory cls" style="color:red; font-size:15px">*</span></label>
                                            <input
                                                class="form-control {{ $errors->has('size') ? 'form-control-danger' : '' }}"
                                                name="size" type="text"
                                                value="{{ old('size', $products['size']) }}" placeholder="Enter Size">      
                                            @error('size')
                                            <div class="col-form-alert-label">
                                                {{ $message }}
                                            </div>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group mb-3 {{ $errors->has('color') ? 'has-danger' : '' }}">
                                            <label for="colorPicker">Color</label>
                                            {{-- <input type="color" class="form-control" id="colorPicker" name="colorPicker" value="#ff0000"> --}}
                                            <select class="form-control" id="color" name="color">
                                                <option value="">Select Color</option>
                                                @foreach($get_colors as $value)
                                                   <option value="{{ $value['id']}}" {{ $value['id'] == $products['color'] ? 'selected' : ''}}>{{ $value['name']}}</option>
                                                @endforeach
                                            </select>
                                            @error('color')
                                            <div class="col-form-alert-label">
                                                {{ $message }}
                                            </div>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group mb-3 {{ $errors->has('quantity') ? 'has-danger' : '' }}">
                                            <label class="col-form-label">Quantity</label>
                                            <input
                                                class="form-control {{ $errors->has('quantity') ? 'form-control-danger' : '' }}"
                                                name="quantity" type="text"
                                                value="{{ old('quantity', $products['quantity']) }}" placeholder="Enter Price">      
                                            @error('quantity')
                                            <div class="col-form-alert-label">
                                                {{ $message }}
                                            </div>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group mb-3 {{ $errors->has('product_weight') ? 'has-danger' : '' }}">
                                            <label class="col-form-label">Product Weight</label>
                                            <input
                                                class="form-control {{ $errors->has('product_weight') ? 'form-control-danger' : '' }}"
                                                name="product_weight" type="text"
                                                value="{{ old('product_weight', $products['product_weight']) }}" placeholder="Enter Product Weight">      
                                            @error('product_weight')
                                            <div class="col-form-alert-label">
                                                {{ $message }}
                                            </div>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group mb-3 {{ $errors->has('product_dimension') ? 'has-danger' : '' }}">
                                            <label class="col-form-label">Product Dimensions</label>
                                            <input
                                                class="form-control {{ $errors->has('product_dimension') ? 'form-control-danger' : '' }}"
                                                name="product_dimension" type="text"
                                                value="{{ old('product_dimension', $products['product_dimension']) }}" placeholder="Enter Product Dimension">      
                                            @error('product_dimension')
                                            <div class="col-form-alert-label">
                                                {{ $message }}
                                            </div>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group mb-3 {{ $errors->has('video_link') ? 'has-danger' : '' }}">
                                            <label class="col-form-label">Video Link</label>
                                            <input
                                                class="form-control {{ $errors->has('video_link') ? 'form-control-danger' : '' }}"
                                                name="video_link" type="text"
                                                value="{{ old('video_link', $products['video_link']) }}" placeholder="Enter Price">      
                                            @error('video_link')
                                            <div class="col-form-alert-label">
                                                {{ $message }}
                                            </div>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group"> 
                                            <label for="parent_category">Category*</label>
                                            <select class="form-control" id="parent_id" name="parent_id">
                                                <option value="0">Select Category</option>
                                                @foreach ($get_parent_category as $value)
                                                    <option value="{{ $value['id'] }}" 
                                                    {{ $value['id'] == $products['category'] ? 'selected' : '' }}>
                                                        {{ $value['name'] }}
                                                    </option>
                                                @endforeach
                                            </select> 
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group"> 
                                            <label for="title">Sub Category*</label>
                                            <select class="form-control" id="subcategory_id" name="subcategory_id"> 
                                            {{-- style="display:none;"> --}}
                                                <option value="0">Select Sub Category</option>
                                                {{-- <option value="0"
                                                    {{ 0 == $get_category['is_parent'] ? 'selected' : '' }}>Is Parent
                                                </option> --}}
                                                {{-- @foreach ($get_sub_category as $value) --}}
                                                    {{-- <option value="{{ $value['id'] }}">{{ $value['name']}}</option> --}}
    
                                                    {{-- <option value="{{ $value['id'] }}"
                                                        {{ $value['id'] == $ChildCategory['subcategories_id'] ? 'selected' : '' }}>
                                                        {{ $value['name'] }}
                                                    </option> --}}
                                                {{-- @endforeach --}}
                                            </select> 
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group"> 
                                            <label for="title">Child Category*</label>
                                            <select class="form-control" id="childcategory_id" name="childcategory_id">
                                                <option value="">Select Child Category</option>
                                            
                                                {{-- @foreach ($get_child_category as $value) --}}
                                                    {{-- <option value="{{ $value['id'] }}">{{ $value['name']}}</option> --}}
    
                                                    {{-- <option value="{{ $value['id'] }}"
                                                        {{ $value['id'] == $ChildCategory['subcategories_id'] ? 'selected' : '' }}>
                                                        {{ $value['name'] }}
                                                    </option> --}}
                                                {{-- @endforeach --}}
                                            </select> 
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <div class="form-group mb-3 {{ $errors->has('description') ? 'has-danger' : '' }}">
                                            <label class="col-form-label">Description</label>
                                            <textarea
                                               class="form-control summernote {{ $errors->has('description') ? 'form-control-danger' : ''}}"
                                               name="description" type="message"
                                                placeholder="Enter Description">{{ old('description',  $products['description']) }}</textarea>   
                                               @error('description')
                                                   <div class="col-form-alert-label">
                                                    {{$message}}
                                                   </div>
                                                @enderror
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group mb-3 {{ $errors->has('featured_image') ? 'has-danger' : '' }}">
                                            <label class="col-form-label">Featured Image</label>
                                            <input type="file"
                                                class="form-control {{ $errors->has('featured_image') ? 'form-control-danger' : '' }}"
                                                onchange="loadFile(event,'image_1')" name="featured_image">
                                            @error('featured_image')
                                            <div class="col-form-alert-label">
                                                {{ $message }}
                                            </div>
                                            @enderror
                                        </div>
                                        <div class="media-left">
                                            <a href="#" class="profile-image">
                                            <img class="user-img img-css" id="image_1"
                                                src="{{ $products['featured_image'] != '' ? url('uploads/products', $products['featured_image']) : asset('assets/upload//placeholder.png') }}">
                                            </a>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group mb-3 {{ $errors->has('gallery_images') ? 'has-danger' : '' }}">
                                            <label class="col-form-label">Gallery Images</label>
                                            <input type="file"
                                                class="form-control {{ $errors->has('gallery_images') ? 'form-control-danger' : '' }}"
                                                onchange="loadFile(event,'image_1')" name="gallery_images">
                                            @error('gallery_images')
                                            <div class="col-form-alert-label">
                                                {{ $message }}
                                            </div>
                                            @enderror
                                        </div>
                                        <div class="media-left">
                                            <a href="#" class="profile-image">
                                            <img class="user-img img-css" id="image_1"
                                                src="{{ $products['gallery_images'] != '' ? url('uploads/products', $products['gallery_images']) : asset('assets/upload//placeholder.png') }}">
                                            </a>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group mb-3 {{ $errors->has('specification_name') ? 'has-danger' : '' }}">
                                            <label class="col-form-label">Specification Name</label>
                                            <input
                                                class="form-control {{ $errors->has('specification_name') ? 'form-control-danger' : '' }}"
                                                name="specification_name" type="text"
                                                value="{{ old('specification_name', $products['specification_name']) }}" placeholder="Enter Specification Name">      
                                            @error('specification_name')
                                            <div class="col-form-alert-label">
                                                {{ $message }}
                                            </div>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <div class="form-group mb-3 {{ $errors->has('specification_description') ? 'has-danger' : '' }}">
                                            <label class="col-form-label">Specification Description</label>
                                            <textarea
                                               class="form-control summernote {{ $errors->has('specification_description') ? 'form-control-danger' : ''}}"
                                               name="specification_description" type="message"
                                                placeholder="Enter Description">{{ old('specification_description',  $products['specification_description']) }}</textarea>   
                                               @error('specification_description')
                                                   <div class="col-form-alert-label">
                                                    {{$message}}
                                                   </div>
                                                @enderror
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group mb-3 {{ $errors->has('meta_keywords') ? 'has-danger' : '' }}">
                                            <label class="col-form-label">Meta Keywords</label>
                                            <input
                                                class="form-control {{ $errors->has('meta_keywords') ? 'form-control-danger' : '' }}"
                                                name="meta_keywords" type="text"
                                                value="{{ old('meta_keywords', $products['meta_keywords']) }}" placeholder="Enter Meta Keywords">      
                                            @error('meta_keywords')
                                            <div class="col-form-alert-label">
                                                {{ $message }}
                                            </div>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <div class="form-group mb-3 {{ $errors->has('meta_description') ? 'has-danger' : '' }}">
                                            <label class="col-form-label">Meta Description</label>
                                            <textarea
                                               class="form-control summernote {{ $errors->has('meta_description') ? 'form-control-danger' : ''}}"
                                               name="meta_description" type="message"
                                                placeholder="Enter Description">{{ old('meta_description',  $products['meta_description']) }}</textarea>   
                                               @error('meta_description')
                                                   <div class="col-form-alert-label">
                                                    {{$message}}
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
                                                {{ $products['status'] == 'Deactive' ? 'selected' : '' }}>Deactive
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
            url: "{{ url('vendor/get-subcategory')}}", 
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
             url: "{{ url('vendor/get-childcategory')}}", 
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