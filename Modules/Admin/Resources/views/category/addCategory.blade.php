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
                            <a href="{{ url('admin/category')}}">
                                <button onClick="back();"
                                    class="btn btn-primary waves-effect waves-light f-right d-inline-block md-trigger"
                                    data-modal="modal-13" style="float: right"> <i class="ti-control-backward m-r-5"></i> Back
                                </button>
                            </a></h3>
                        </div>
                        <div class="card-body">
                            {{-- @if ($errors->any())
                                <div class="alert alert-danger">
                                    <ul>
                                        @foreach ($errors->all() as $error)
                                            <li>{{ $error }}</li>
                                        @endforeach
                                    </ul>
                                </div>
                            @endif --}}
                            <form name="categoryForm" id="categoryForm" 
                            @if(empty($category['id'])) action="{{ url('admin/addcategory')}}" 
                            @else 
                               action="{{ url('admin/addcategory/'.$category['id']) }}" 
                            @endif
                            method="post" enctype="multipart/form-data">
                                @csrf
                                <div class="card-body">
                                    <input type="hidden" name="id" value="{{$category['id']}}">
                                    {{-- <div class="form-group"> 
                                        <label for="title">Name*</label> 
                                        <input type="text" class="form-control" value="{{ old('name', $category['name'])}}" id="name" name="name" placeholder="Enter Category">
                                    </div> --}}
                                    {{-- <div class="col-md-4"> --}}
                                        <div class="form-group mb-3 {{ $errors->has('name') ? 'has-danger' : '' }}">
                                            <label class="col-form-label">{{('Name')}}<span class="mandatory cls" style="color:red; font-size:15px">*</span></label>
                                            <input
                                                class="form-control {{ $errors->has('name') ? 'form-control-danger' : '' }}"
                                                name="name" type="text"
                                                value="{{ old('name', $category['name']) }}" placeholder="Enter name">      
                                            @error('name')
                                                <div class="col-form-alert-label">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                    {{-- </div> --}}
                                    <div class="form-group mb-3 {{ $errors->has('image') ? 'has-danger' : '' }}">
                                        <label class="col-form-label">Image<span class="mandatory cls" style="color:red; font-size:15px">*</span></label>
                                        <input type="file"
                                            class="form-control {{ $errors->has('image') ? 'form-control-danger' : '' }}"
                                            onchange="loadFile(event,'image_1')" name="image">
                                            @if(!empty($category['image']))
                                            <input type="hidden" name="current_image" value="{{ $category['image'] }}">
                                            @endif
                                        @error('image')
                                            <div class="col-form-alert-label">
                                                {{ $message }}
                                            </div>
                                        @enderror
                                    </div>
                                    <div class="media-left">
                                        <a href="#" class="profile-image">
                                            <img class="user-img img-css" id="image_1"
                                                src="{{ $category['image'] != '' ? asset('uploads/categories/'. $category['image']) : asset('assets/upload//placeholder.png') }}">
                                        </a>
                                    </div>
                                    <div class="form-group mb-3 {{ $errors->has('status') ? 'has-danger' : '' }}">
                                        <label class="col-form-label">Status</label>
                                        <select id="status" name="status" class="form-control stock">
                                            <option value="Active">Active</option>
                                            <option value="Deactive"
                                                {{ $category['status'] == 'Deactive' ? 'selected' : '' }}>Deactive
                                            </option>
                                        </select>
                                        @error('status')
                                            <div class="col-form-alert-label">
                                                {{ $message }}
                                            </div>
                                        @enderror
                                    </div>
                                    {{-- <div class="form-group"> 
                                        <label for="category_name">Category Level*</label> 
                                        <select name="parent_id" class="form-control">
                                            <option value="">Select</option>
                                            <option value="0">Main Category</option>
                                            @foreach($getCategories as $cat)
                                               <option value="{{ $cat['id'] }}">{{ $cat['category_name']}}</option>
                                               @if(!empty($cat['subcategories']))
                                                    @foreach($cat['subcategories'] as $subcat)
                                                    <option value="{{ $subcat['id'] }}">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&raquo;{{ trim($subcat['category_name'])}}<option>
                                                        @if(!empty($subcat['subcategories']))
                                                                @foreach($subcat['subcategories'] as $subsubcat)
                                                                <option value="{{ $subsubcat['id'] }}">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&raquo;{{ $subsubcat['category_name']}}<option>
                                                                @endforeach
                                                        @endif
                                                    @endforeach
                                               @endif
                                            @endforeach
                                        </select>
                                    </div> --}}
                                    {{-- <div class="form-group"> 
                                        <label for="category_image">Category Image</label> 
                                        <input type="file" class="form-control" name="category_image" id="category_image" 
                                        placeholder="Enter Image"> 
                                    </div> --}}
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
@endsection

