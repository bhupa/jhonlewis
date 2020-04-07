@extends('backend.app')
@section('title','Appointment-Lists')
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
{{--                            <li class="breadcrumb-item"><a href="{{route('appointments.create')}}"> Add appointment</a></li>--}}
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
                                <th scope="col">First-Name</th>
                                <th scope="col">Last-Name</th>
                                <th scope="col">Email</th>
                                <th scope="col">Phone</th>
                                <th scope="col" >Address</th>
                                <th scope="col" >Date</th>
                                <th scope="col">action</th>
                            </tr>
                            </thead>
                            <tbody id="sortable">

                            @foreach($appointments as $key=>$item)
                                <tr id="item-{{$item->id}}">
                                    <td>{{$key+1}}</td>
                                    <td>{{$item->firstname}}</td>
                                    <td>{{$item->lastname}}</td>
                                    <td>{{$item->email}}</td>
                                    <td>{{$item->phone}}</td>
                                    <td>{{$item->address}}</td>
                                    <td>{{date('d-M-Y', strtotime($item->date)) }}</td>
                                    <td>
                                        <a href="{{route('appointments.edit', $item->id)}}" class="edit-modal btn btn-info btn-circle btn-sm"
                                           data-info="">
                                            <i class="fas fa-edit"></i>
                                        </a>
                                        {{-- @if(auth()->user()->can('edit-banner')) --}}
                                        <a href="javascript:void(0)" id="reply-appointment-email" class="edit-modal btn btn-success btn-circle btn-sm"
                                           data-type="{{$item->id}}">
                                            <i class="fas fa-envelope"></i>
                                        </a>
                                        {{-- @endif --}}
                                        {{-- @if(auth()->user()->can('delete-banner')) --}}
                                        <a href="javascript:void(0)" class="delete-appointments btn btn-danger btn-circle btn-sm"
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
                <div class="appointment-details">

                </div>
            </div>
            <!-- /.container-fluid -->
        </div>
        <!-- /.content -->
    </div>

@endsection
@section('js_script')
    <script>
        $(document).ready( function () {

            $('#table').on('click','.delete-appointments',function(event){
                event.preventDefault();
                $object = $(this);
                var id  = $(this).attr('data-type');
                var url = baseUrl+"/appointments/"+id;
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
            $('#table').on('click','#reply-appointment-email',function(event){
                event.preventDefault();
                $object = $(this);
                var id  = $(this).attr('data-type');
                var url = baseUrl+"/appointments/"+id;


                $.ajax({
                    type: "get",
                    url: url,
                    data: {
                        id: id,

                    },
                    dataType:'html',
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    },
                    success: function (appointment) {
                        $('.appointment-details').html(appointment);
                        $('#appointment-emails').modal('show');
                    },
                    error: function (e) {
                        if (e.responseJSON.message) {
                            swal('Error', e.responseJSON.message, 'error');
                        } else {
                            swal('Error', 'Something went wrong while processing your request.', 'error')
                        }
                    }
                });

            })

            {{--$("#table").on("click", "#change-status", function () {--}}
            {{--    $object = $(this);--}}
            {{--    var id = $(this).attr('data-type');--}}
            {{--    swal({--}}
            {{--        title: 'Are you sure?',--}}
            {{--        text: 'Do you want to change the status',--}}
            {{--        type: 'warning',--}}
            {{--        showCancelButton: true,--}}
            {{--        confirmButtonText: 'Yes, change it!',--}}
            {{--        cancelButtonText: 'No, keep it'--}}
            {{--    }).then((result) => {--}}
            {{--        if (result.value) {--}}
            {{--            $.ajax({--}}
            {{--                type: "POST",--}}
            {{--                url: "{{ route('appointments.change-status') }}",--}}
            {{--                data: {--}}
            {{--                    'id': id,--}}
            {{--                },--}}
            {{--                headers: {--}}
            {{--                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')--}}
            {{--                },--}}
            {{--                dataType: 'json',--}}
            {{--                success: function (response) {--}}
            {{--                    swal("Thank You!", response.message, "success");--}}
            {{--                    if (response.appointment.is_active == 1) {--}}
            {{--                        $($object).children().removeClass('fa fa-minus');--}}
            {{--                        $($object).children().addClass('fa fa-check');--}}
            {{--                    } else {--}}
            {{--                        $($object).find('.unpublished').html('<i class="fa fa-minus" aria-hidden="true"></i>');--}}
            {{--                        $($object).children().removeClass('fa fa-check');--}}
            {{--                        $($object).children().addClass('fa fa-minus');--}}
            {{--                    }--}}
            {{--                },--}}
            {{--                error: function (e) {--}}
            {{--                    if (e.responseJSON.message) {--}}
            {{--                        swal('Error', e.responseJSON.message, 'error');--}}
            {{--                    } else {--}}
            {{--                        swal('Error', 'Something went wrong while processing your request.', 'error')--}}
            {{--                    }--}}
            {{--                }--}}
            {{--            });--}}

            {{--        }--}}
            {{--    })--}}
            {{--});--}}







        });

    </script>
@endsection
