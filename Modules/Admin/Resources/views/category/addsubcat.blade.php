@extends('admin.layout.layout')
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
                            <a href="{{ url('admin/subcategory')}}">
                                <button onClick="back();"
                                    class="btn btn-primary waves-effect waves-light f-right d-inline-block md-trigger"
                                    data-modal="modal-13" style="float: right"> <i class="ti-control-backward m-r-5"></i> Back
                                </button>
                            </a></h3>
                        </div>
                        <div class="card-body">
                            @if ($errors->any())
                                <div class="alert alert-danger">
                                    <ul>
                                        @foreach ($errors->all() as $error)
                                            <li>{{ $error }}</li>
                                        @endforeach
                                    </ul>
                                </div>
                            @endif
                            <form name="SubcategoryForm" id="SubcategoryForm" 
                            @if(empty($subcategory['id'])) action="{{ url('admin/addsubcat')}}" 
                            @else 
                               action="{{ url('admin/addsubcat/'.$subcategory['id']) }}" 
                            @endif
                            method="post" enctype="multipart/form-data">
                                @csrf
                                <div class="card-body">
                                    <input type="hidden" name="id" value="{{$subcategory['id']}}">
                                    <div class="form-group"> 
                                        <label for="title">Parent Category*</label>
                                        <select class="form-control" name="parent_id">
                                            <option value="">Select Category</option>
                                            @foreach ($get_parent_category as $value)
                                                {{-- <option value="{{ $value['id'] }}">{{ $value['name']}}</option> --}}
                                                <option value="{{ $value['id'] }}" 
                                                {{ $value['id'] == $subcategory['cat_id'] ? 'selected' : '' }}>
                                                    {{ $value['name'] }}
                                                </option>
                                            @endforeach
                                        </select> 
                                    </div>
                                    <div class="form-group"> 
                                        <label for="name">Name*</label> 
                                        <input type="text" class="form-control" value="{{ old('name' , $subcategory['name'])}}" id="name" name="name" placeholder="Enter Category">
                                    </div>
                                    <div class="form-group mb-3 {{ $errors->has('status') ? 'has-danger' : '' }}">
                                        <label class="col-form-label">Status</label>
                                        <select id="status" name="status" class="form-control stock">
                                            <option value="Active">Active</option>
                                            <option value="Deactive"
                                                {{ $subcategory['status'] == 'Deactive' ? 'selected' : '' }}>Deactive
                                            </option>
                                        </select>
                                        @error('status')
                                            <div class="col-form-alert-label">
                                                {{ $message }}
                                            </div>
                                        @enderror
                                    </div>
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

