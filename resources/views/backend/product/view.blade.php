@extends('backend.app')
@section('title','Products-Lists')
@section('content')
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0 text-dark">Dashboard</h1>
                        @if (\Session::has('success'))
                            <div class="alert alert-success">
                                <ul>
                                    <li>{!! \Session::get('success') !!}</li>
                                </ul>
                            </div>

                        @endif
                    </div><!-- /.col -->
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="{{route('products.create')}}"> Add Product</a></li>
                            <li class="breadcrumb-item active">Dashboard </li>
                        </ol>
                    </div><!-- /.col -->
                </div><!-- /.row -->
            </div><!-- /.container-fluid -->
        </div>
        <!-- /.content-header -->

        <!-- Main content -->
        <div class="content">
            <div class="container-fluid">
                <div class="single-table">
                    <div class="table-responsive">
                        <table class="table text-center" id="table">
                            <thead class="text-uppercase bg-primary">
                            <tr class="text-white">
                                <th scope="col">ID</th>
                                <th scope="col">Serial No</th>
                                <th scope="col">Name</th>
                                <th scope="col">Shape</th>
                                <th scope="col">Warranty</th>
                                <th scope="col">Style</th>
                                <th scope="col">Price</th>
                                <th scope="col">Shipping</th>
                                <th scope="col">Status</th>
                                <th scope="col">action</th>
                            </tr>
                            </thead>
                            <tbody id="sortable">

                            @foreach($products as $key=>$item)
                                <tr id="item-{{$item->id}}">
                                    <td>{{$key+1}}</td>
                                    <td>{{$item->product_number}}</td>
                                    <td>{{$item->title}}</td>
                                    <td>{{$item->shape}}</td>
                                    <td>{{$item->warranty}}</td>
                                    <td>{{$item->style}}</td>
                                    <td>{{$item->price}}</td>
                                    <td>
                                        @if($item->shipping == '1')
                                            <a href="javascript:void(0)"  data-type="{{$item->id}}" id="shipping" class="edit-modal btn btn-sm btn-circle btn-success published"  title="change-status"
                                               data-toggle="tooltip"> <i class="fas fa-check" aria-hidden="true"></i></a>
                                        @else
                                            <a href="javascript:void(0)"  data-type="{{$item->id}}" id="shipping" class="edit-modal btn btn-sm btn-circle btn-success unpublished"   title="change-status"
                                               data-toggle="tooltip"> <i class="fas fa-minus" aria-hidden="true"></i></a>
                                        @endif
                                    </td>
                                    <td>
                                        @if($item->is_active == '1')
                                            <a href="javascript:void(0)"  data-type="{{$item->id}}" id="change-status" class="edit-modal btn btn-sm btn-circle btn-success published"  title="change-status"
                                               data-toggle="tooltip"> <i class="fas fa-check" aria-hidden="true"></i></a>
                                        @else
                                            <a href="javascript:void(0)"  data-type="{{$item->id}}" id="change-status" class="edit-modal btn btn-sm btn-circle btn-success unpublished"   title="change-status"
                                               data-toggle="tooltip"> <i class="fas fa-minus" aria-hidden="true"></i></a>
                                        @endif
                                    </td>
                                    <td colspan="3">
                                        <a href="{{route('products.show', $item->slug)}}" class="edit-modal btn btn-info btn-circle btn-sm"
                                           data-info="">
                                            <i class="fas fa-eye"></i>
                                        </a>
                                        <a href="{{route('stocks.create', $item->slug)}}" class="edit-modal btn btn-info btn-circle btn-sm"
                                           data-info="">
                                            <i class="fas fa-plus-circle"></i>
                                        </a>
                                        {{-- @if(auth()->user()->can('edit-banner')) --}}
                                        <a href="{{route('products.edit', $item->slug)}}" class="edit-modal btn btn-info btn-circle btn-sm"
                                           data-info="">
                                            <i class="fas fa-edit"></i>
                                        </a>
                                        {{-- @endif --}}
                                        {{-- @if(auth()->user()->can('delete-banner')) --}}
                                        <a href="javascript:void(0)" class="delete-products btn btn-danger btn-circle btn-sm"
                                           data-type="{{$item->id}}">
                                            <i class="fas fa-trash"></i>
                                        </a>
                                        {{-- @endif --}}
                                    </td>
                                </tr>
                            @endforeach

                            </tbody>
                        </table>
                    </div>
                </div>

                <!-- /.row -->

            </div>
            <!-- /.container-fluid -->
        </div>
        <!-- /.content -->
    </div>

@endsection
@section('js_script')
            <script>
                $(document).ready( function () {

                    $('#table').on('click','.delete-products',function(event){
                        event.preventDefault();
                        $object = $(this);
                        var id  = $(this).attr('data-type');
                        var url = baseUrl+"/products/"+id;
                        swal({
                            title: 'Are you sure?',
                            text: 'You will not be able to recover this !',
                            type: 'warning',
                            showCancelButton: true,
                            confirmButtonText: 'Yes, delete it!',
                            cancelButtonText: 'No, keep it'
                        }).then((result) => {
                            if (result.value
                            )
                            {

                                $.ajax({
                                    type: "Delete",
                                    url: url,
                                    data: {
                                        id: id,
                                        _method: 'DELETE'
                                    },
                                    headers: {
                                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                                    },
                                    success: function (response) {
                                        swal("Deleted!", response.message, "success");

                                        var nRow = $($object).parents('tr')[0];
                                        nRow.remove();
                                    },
                                    error: function (e) {
                                        if (e.responseJSON.message) {
                                            swal('Error', e.responseJSON.message, 'error');
                                        } else {
                                            swal('Error', 'Something went wrong while processing your request.', 'error')
                                        }
                                    }
                                });
                            }
                        })
                    })


                    $("#table").on("click", "#change-status", function () {
                        $object = $(this);
                        var id = $(this).attr('data-type');
                        swal({
                            title: 'Are you sure?',
                            text: 'Do you want to change the status',
                            type: 'warning',
                            showCancelButton: true,
                            confirmButtonText: 'Yes, change it!',
                            cancelButtonText: 'No, keep it'
                        }).then((result) => {
                            if (result.value) {
                                $.ajax({
                                    type: "POST",
                                    url: "{{ route('products.change-status') }}",
                                    data: {
                                        'id': id,
                                    },
                                    headers: {
                                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                                    },
                                    dataType: 'json',
                                    success: function (response) {
                                        swal("Thank You!", response.message, "success");
                                        if (response.products.is_active == 1) {
                                            $($object).children().removeClass('fa fa-minus');
                                            $($object).children().addClass('fa fa-check');
                                        } else {
                                            $($object).find('.unpublished').html('<i class="fa fa-minus" aria-hidden="true"></i>');
                                            $($object).children().removeClass('fa fa-check');
                                            $($object).children().addClass('fa fa-minus');
                                        }
                                    },
                                    error: function (e) {
                                        if (e.responseJSON.message) {
                                            swal('Error', e.responseJSON.message, 'error');
                                        } else {
                                            swal('Error', 'Something went wrong while processing your request.', 'error')
                                        }
                                    }
                                });

                            }
                        })
                    });

                    $("#table").on("click", "#shipping", function () {
                        $object = $(this);
                        var id = $(this).attr('data-type');
                        swal({
                            title: 'Are you sure?',
                            text: 'Do you want to change the status',
                            type: 'warning',
                            showCancelButton: true,
                            confirmButtonText: 'Yes, change it!',
                            cancelButtonText: 'No, keep it'
                        }).then((result) => {
                            if (result.value) {
                                $.ajax({
                                    type: "POST",
                                    url: "{{ route('products.change-shipping') }}",
                                    data: {
                                        'id': id,
                                    },
                                    headers: {
                                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                                    },
                                    dataType: 'json',
                                    success: function (response) {
                                        swal("Thank You!", response.message, "success");
                                        if (response.products.shipping == 1) {
                                            $($object).children().removeClass('fa fa-minus');
                                            $($object).children().addClass('fa fa-check');
                                        } else {
                                            $($object).find('.unpublished').html('<i class="fa fa-minus" aria-hidden="true"></i>');
                                            $($object).children().removeClass('fa fa-check');
                                            $($object).children().addClass('fa fa-minus');
                                        }
                                    },
                                    error: function (e) {
                                        if (e.responseJSON.message) {
                                            swal('Error', e.responseJSON.message, 'error');
                                        } else {
                                            swal('Error', 'Something went wrong while processing your request.', 'error')
                                        }
                                    }
                                });

                            }
                        })
                    });






                });

            </script>
@endsection
