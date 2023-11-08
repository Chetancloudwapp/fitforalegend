@extends('admin.layout.layout')
@section('content')
<div class="content-wrapper">
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Colors</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="{{ url('admin/dashboard')}}">Home</a></li>
                        <li class="breadcrumb-item active">Color</li>
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
                            <h3 class="card-title nofloat"> <span>Color List</span>
                            	<span> <a href="{{ url('admin/color/add') }}"> <button type="button" class="btn btn-block btn-primary">Add Colors</button> </a></span>
                            </h3>
                        </div>
                        <div class="card-body">
                            <table id="categories" class="table table-bordered table-hover">
                                <thead>
                                    <tr>
                                        <th>S.No.</th>
                                        <th>Color Name</th>
                                        <th>Color Code</th>
                                        <th>Status</th>
                                        <th class="text-center">Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($color as $key => $value)
                                        <tr>
                                            <td>{{ $value['id'] }}</td>
                                            <td>{{ $value['name'] }}</td>
                                            <td>{{ $value['color_code'] }}</td>
                                            <td>
                                                @if($value['status'] == 'Active')
                                                   <span class="badge badge-pill badge-success">{{ $value['status']}}</span>
                                                @else
                                                   <span class="badge badge-pill badge-danger">{{ $value['status'] }}</span>
                                                @endif
                                            </td>
                                            <td class="text-center">
                                                {{-- <a href="javascript:;"> <i class="fa-solid fa-eye"></i> </a> --}}
                                                <a href="{{ url('admin/color/edit/'.encrypt($value['id'])) }}"> <i class="fa-solid fa-pencil"></i></a>
                                                {{-- <a href="{{ url('admin/product/delete/'.$category['id'])}}" class="confirmDelete" name="Category" title="Delete Category Page"> <i class="fa-solid fa-trash" ></i> </a> --}}
                                                <a href="javascript:void(0)" record="color/delete" record_id="{{ encrypt($value['id']) }}" class="confirmDelete" name="color" title="Delete Color Page"> <i class="fa-solid fa-trash" ></i> </a>
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
                window.location.href = "/admin/"+record+"/"+record_id;
            }
            });

       });
    });
</script>
@endsection

