@extends('admin.layout.layout')
@section('content')
<div class="content-wrapper">
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Categories</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active">Categories</li>
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
                            @if(Session::has('success_message'))
                            <div class="alert alert-success alert-dismissible fade show" role="alert">
                                <strong>Success:</strong> {{ Session::get('success_message')}}
                                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                  <span aria-hidden="true">&times;</span>
                                </button>
                              </div>
                            @endif
                            <h3 class="card-title nofloat"> <span>Category List</span>
                            	<span> <a href="{{ url('admin/add-edit-category') }}"> <button type="button" class="btn btn-block btn-primary">Add Categories</button> </a> </span>
                            </h3>
                        </div>
                        <div class="card-body">
                            <table id="categories" class="table table-bordered table-hover">
                                <thead>
                                    <tr>
                                        <th>S.No.</th>
                                        <th>Name</th>
                                        <th>Parent Category</th>
                                        <th>Image</th>
                                        <th>Created on</th>
                                        <th>Status</th>
                                        <th class="text-center">Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($categories as $category)
                                        <tr>
                                            <td>{{ $category['id'] }}</td>
                                            <td>{{ $category['category_name'] }}</td>
                                            <td>
                                                @if(isset($category['parentcategory']['category_name']))
                                                {{ $category['parentcategory']['category_name']}}
                                                @endif
                                            </td>
                                            <td><img class="tbl-img-css rounded-circle" width="50px"
                                                src="{{ url('uploads/categories', $category['category_image']) }}">
                                            </td>
                                            <td>{{ date("F j, Y, g:i a", strtotime($category['created_at'])); }}</td>
                                            {{-- <td>{{ $category['status'] }}</td> --}}
                                            <td>
                                                <a href="javascript:void(0)"><i class="fas fa-toggle-on"></i><a>
                                            </td>
                                            <td class="text-center">
                                                <a href="javascript:;"> <i class="fa-solid fa-eye"></i> </a>
                                                <a href="{{ url('admin/add-edit-category/'.$category['id']) }}"> <i class="fa-solid fa-pencil"></i></a>
                                                {{-- <a href="{{ url('admin/delete_category/'.$category['id'])}}" class="confirmDelete" name="Category" title="Delete Category Page"> <i class="fa-solid fa-trash" ></i> </a> --}}
                                                <a href="javascript:void(0)" record="category" record_id="{{ $category['id'] }}" class="confirmDelete" name="Category" title="Delete Category Page"> <i class="fa-solid fa-trash" ></i> </a>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
<script type="text/javascript">
    $(document).ready(function(){
        // $(document).on("click", ".confirmDelete", function(){

        //     var name = $(this).attr('name');
        //     if(confirm('Are You sure you want to Delete this ' + name + '?')){
        //         return true;
        //     }
        //     return false;
        // });

       $(document).on('click', ".confirmDelete", function(){
           var record = $(this).attr('record');
           var record_id = $(this).attr('record_id');
           Swal.fire({
            title: 'Are you sure?',
            text: "You won't be able to revert this!",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Yes, delete it!'
            }).then((result) => {
            if (result.isConfirmed) {
                Swal.fire(
                'Deleted!',
                'Your file has been deleted.',
                'success'
                )
                window.location.href = "/admin/delete_"+record+"/"+record_id;
            }
            });

       });
    });
</script>
@endsection

