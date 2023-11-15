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
                            <a href="{{ url('admin/childcategory')}}">
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
                            <form name="ChildcategoryForm" id="main" 
                            {{-- @if(empty($childcategory['id'])) action="{{ url('admin/addchildcategory')}}" 
                            @else 
                               action="{{ url('admin/addchildcategory/'.$childcategory['id']) }}" 
                            @endif --}}
                            method="post" enctype="multipart/form-data">
                                @csrf
                                <div class="card-body">
                                    <input type="hidden" name="parent_category" value="{{$ChildCategory['id']}}">
                                    {{-- <div class="form-group"> 
                                        <label for="title">Parent Category*</label>
                                        <select class="form-control" id="parent_id" name="parent_id">
                                            <option value="">Select Parent Category</option>
                                            @foreach ($get_parent_category as $value)
                                                <option value="{{ $value['id'] }}"
                                                    {{ $value['id'] == $ChildCategory['cat_id'] ? 'selected' : '' }}>
                                                    {{ $value['name'] }}
                                                </option>
                                            @endforeach
                                        </select> 
                                    </div> --}}
                                    <div class="col-md-6">
                                        <div class="form-group mb-3 {{ $errors->has('parent_category') ? 'has-danger' : '' }}">
                                        <label class="col-form-label">Parent Category<span class="mandatory cls" style="color:red; font-size:15px">*</span></label>
                                        <select class="form-control" name="parent_category" id="parent_category">
                                            <option value="">Select Parent Category</option>                                         
                                                @foreach ($get_parent_category as $value)
                                                <option value="{{ $value['id'] }}"
                                                    {{ $value['id'] == $ChildCategory['cat_id'] ? 'selected' : '' }}>
                                                    {{ $value['name'] }}
                                                </option>
                                            @endforeach
                                        </select>
                                        @error('parent_category')
                                              <div class="col-form-alert-label">
                                                  {{$message}}
                                             </div>  
                                        @enderror
                                        </div>
                                    </div>  
                                    {{-- <div class="col-md-6">
                                        <div class="form-group mb-3 {{ $errors->has('subcategory_id') ? 'has-danger' : '' }}">
                                        <label class="col-form-label">Sub Category<span class="mandatory cls" style="color:red; font-size:15px">*</span></label>
                                        <select class="form-control" name="subcategory_id" id="subcategory_id">
                                            <option value="0">Select Sub Category</option>                                         
                                                
                                        </select>
                                        @error('subcategory_id')
                                              <div class="col-form-alert-label">
                                                  {{$message}}
                                             </div>  
                                        @enderror
                                        </div>
                                    </div>   --}}
                                    <div class="form-group {{ $errors->has('subcategory_id') ? 'has-danger' : '' }}"> 
                                        <label for="title">Sub Category*</label>
                                        <select class="form-control" id="subcategory_id" name="subcategory_id">
                                            <option value="">Select Sub Category</option>
                                            @foreach ($get_sub_category as $value) 
                                            <option value="{{ $value['id'] }}">{{ $value['name']}}</option>

                                            <option value="{{ $value['id'] }}"
                                                {{ $value['id'] == $ChildCategory['subcategories_id'] ? 'selected' : '' }}>
                                                {{ $value['name'] }}
                                            </option>
                                        @endforeach
                                        </select> 
                                        @error('subcategory_id')
                                            <div class="col-form-alert-label">
                                                {{ $message }}
                                            </div>
                                        @enderror
                                    </div>
                                    {{-- <div class="form-group"> 
                                        <label for="title">Name*</label> 
                                        <input type="text" class="form-control" value="{{ old('name' , $ChildCategory['name'])}}" id="name" name="name" placeholder="Enter Title">
                                    </div> --}}
                                    <div class="col-md-6">
                                        <div class="form-group mb-3 {{ $errors->has('name') ? 'has-danger' : '' }}">
                                            <label class="col-form-label">{{('Name')}}<span class="mandatory cls" style="color:red; font-size:15px">*</span></label>
                                            <input
                                                class="form-control {{ $errors->has('name') ? 'form-control-danger' : '' }}"
                                                name="name" id="name" type="text"
                                                value="{{ old('name', $ChildCategory['name']) }}" placeholder="Enter name">      
                                            @error('name')
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
<script type="text/javascript">
   $(document).ready(function () {
      $('#parent_category').change(function () {
         var categoryId = $(this).val();         
         $.ajax({
             url: "{{ url('admin/get-subcategories')}}", 
             method: 'POST',
             data: { category_id: categoryId, _token: "{{ csrf_token() }}" },
            success: function (data) {
               var subcategoryDropdown = $('#subcategory_id');
               subcategoryDropdown.empty(); 
               subcategoryDropdown = $('#subcategory_id').html('<option value="">Select Sub Category</option>'); 
               $.each(data, function (key, value) {
                  subcategoryDropdown.append($('<option value="">Select Sub Category</option>').attr('value', key).text(value));
               });
            }
         });
      });
   });
</script>
@endsection

