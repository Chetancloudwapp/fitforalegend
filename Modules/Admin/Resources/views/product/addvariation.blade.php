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
                                <a href="{{ url('admin/product')}}">
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
                                @foreach($product as $productData)
                                <div class="row">
                                    <input type="hidden" name="id" value="{{$products['id']}}">
                                    <div class="col-md-6">
                                        <div class="form-group mb-3 {{ $errors->has('name') ? 'has-danger' : '' }}">
                                            <label class="col-form-label">{{('Name')}}<span class="mandatory cls" style="color:red; font-size:15px">*</span></label>
                                            <input value="{{ $productData['name']}}"
                                                class="form-control {{ $errors->has('name') ? 'form-control-danger' : '' }}"
                                                name="name" type="text"
                                                placeholder="Enter name">  
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
                                                    <option value="{{ $value['id'] }}">{{ $value['name']}}</option>
                                                    {{-- <option value="{{ $value['id'] }}" 
                                                    {{ $value['id'] == $subcategory['cat_id'] ? 'selected' : '' }}>
                                                        {{ $value['name'] }}
                                                    </option> --}}
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
                                            <select class="form-control" id="size" name="size">
                                                <option value="">Select Size</option>
                                                @foreach($get_size as $value)
                                                    <option value="{{ $value['id']}}" {{ $value['id'] == $products['size'] ? 'selected' : ''}}>{{ $value['name']}}</option>
                                                @endforeach
                                            </select>    
                                            @error('size')
                                            <div class="col-form-alert-label">
                                                {{ $message }}
                                            </div>
                                            @enderror
                                        </div>
                                    </div>
                                    {{-- <div class="col-md-6">
                                        <div class="form-group mb-3 {{ $errors->has('color') ? 'has-danger' : '' }}">
                                            <label for="colorPicker">Color</label>
                                            <input type="color" class="form-control" id="colorPicker" name="colorPicker" value="#ff0000">
                                            @error('color')
                                            <div class="col-form-alert-label">
                                                {{ $message }}
                                            </div>
                                            @enderror
                                        </div>
                                    </div> --}}
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
                                    <div class="col-md-6" style="display:none;">
                                        <div class="form-group mb-3 {{ $errors->has('parent_id') ? 'has-danger' : '' }}"> 
                                            <label class="col-form-label">Category*</label>
                                            <select class="form-control {{ $errors->has('parent_id') ? 'form-control-danger' : '' }}" id="parent_id" name="parent_id">
                                                <option value="{{ $productData['category'] }}">Select Category</option>
                                                {{-- @foreach ($get_parent_category as $value)
                                                    <option value="{{ $value['id'] }}" 
                                                    {{ $value['id'] == $products['category'] ? 'selected' : '' }}>
                                                        {{ $value['name'] }}
                                                    </option>
                                                @endforeach --}}
                                            </select> 
                                            @error('parent_id')
                                            <div class="col-form-alert-label">
                                                {{ $message }}
                                            </div>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-md-6"  style="display:none;">
                                        <div class="form-group {{ $errors->has('subcategory_id') ? 'has-danger' : '' }}"> 
                                            <label class="col-form-label">Sub Category*</label>
                                            <select class="form-control {{ $errors->has('subcategory_id') ? 'form-control-danger' : ''}}" id="subcategory_id" name="subcategory_id"> 
                                                <option value="{{ $productData['subcategory']}}">Select Sub Category</option>
                                            </select> 
                                            @error('subcategory_id')
                                            <div class="col-form-alert-label">
                                             {{$message}}
                                            </div>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-md-6"  style="display:none;">
                                        <div class="form-group {{ $errors->has('childcategory_id') ? 'has-danger' : '' }}"> 
                                            <label class="col-form-label">Child Category*</label>
                                            <select class="form-control {{ $errors->has('childcategory_id') ? 'form-control-danger' : ''}}" id="childcategory_id" name="childcategory_id">
                                                <option value="{{ $productData['childcategory']}}">Select Child Category</option>                     
                                            </select> 
                                            @error('childcategory_id')
                                                <div class="col-form-alert-label">
                                                {{$message}}
                                                </div>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <div class="form-group mb-3 {{ $errors->has('short_description') ? 'has-danger' : '' }}">
                                            <label class="col-form-label">Short Description</label>
                                            <textarea
                                               class="form-control summernote {{ $errors->has('short_description') ? 'form-control-danger' : ''}}"
                                               name="short_description" type="message"
                                                placeholder="Enter Short Description">{{ $productData['short_description'] }}</textarea>   
                                               @error('short_description')
                                                   <div class="col-form-alert-label">
                                                    {{$message}}
                                                   </div>
                                                @enderror
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <div class="form-group mb-3 {{ $errors->has('description') ? 'has-danger' : '' }}">
                                            <label class="col-form-label">Description</label>
                                            <textarea
                                               class="form-control summernote {{ $errors->has('description') ? 'form-control-danger' : ''}}"
                                               name="description" type="message"
                                                placeholder="Enter Description">{{ $productData['description'] }}</textarea>   
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
                                            @if(!empty($products['featured_image']))
                                            <input type="hidden" name="current_image" value="{{ $products['featured_image'] }}">
                                            @endif
                                            @error('featured_image')
                                            <div class="col-form-alert-label">
                                                {{ $message }}
                                            </div>
                                            @enderror
                                        </div>
                                        <div class="media-left">
                                            <a href="#" class="profile-image">
                                            <img class="user-img img-css" id="image_1"
                                                src="{{ $products['featured_image'] != '' ? asset('uploads/products/'. $products['featured_image']) : asset('assets/upload//placeholder.png') }}">
                                            </a>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group mb-3 {{ $errors->has('images') ? 'has-danger' : '' }}">
                                            <label class="col-form-label">Gallery Images : (Recommend Size: Less than 2 Mb)</label>
                                            <input type="file"
                                                class="form-control {{ $errors->has('images') ? 'form-control-danger' : '' }}"
                                                onchange="loadFile(event,'image_1')"  name="images[]" multiple="" id="images">
                                            @error('images')
                                            <div class="col-form-alert-label">
                                                {{ $message }}
                                            </div>
                                            @enderror
                                        </div>
                                        <div class="media-left">
                                            <a href="#" class="profile-image">
                                                <table cellpadding="4" cellspacing="4" border="1" style="margin:15px;">
                                                <tr>
                                                @foreach($products['images'] as $value)
                                                    <td style="background-color: #f9f9f9;">
                                                    @if($value['product_id'] == $products['id'])
                                                        <a target="_blank" href="{{ asset('uploads/products/galleryImages/small/'. $value['image'])}}"><img src="{{ $value['image'] != '' ? asset('uploads/products/galleryImages/small/'. $value['image']) : asset('assets/upload//placeholder.png') }}" width="120px" class="user-img img-css" id="image_1">
                                                        </a>&nbsp;
                                                        <a href="javascript:void(0)" title="Delete Product" record="product/deleteImage" record_id="{{ $value['id']}}" 
                                                        class="confirmDelete" name="product" title="Delete Product Image"> <i class="fa-solid fa-trash"></i> 
                                                        </a>
                                                    @endif  
                                                    </td>    
                                                @endforeach
                                                </tr>
                                                </table>
                                            </a>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group mb-3 {{ $errors->has('specification_name') ? 'has-danger' : '' }}">
                                            <label class="col-form-label">Specification Name</label>
                                            <input
                                                class="form-control {{ $errors->has('specification_name') ? 'form-control-danger' : '' }}"
                                                name="specification_name" type="text"
                                                value="{{  $productData['specification_name'] }}" placeholder="Enter Specification Name">      
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
                                                placeholder="Enter Description">{{ $productData['specification_description'] }}</textarea>   
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
                                                value="{{ $productData['meta_keywords'] }}" placeholder="Enter Meta Keywords">      
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
                                                placeholder="Enter Description">{{  $productData['meta_description'] }}</textarea>   
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
                                @endforeach
                                <div class="card-footer"> <button type="submit" class="btn btn-primary">Submit</button> </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>
@endsection