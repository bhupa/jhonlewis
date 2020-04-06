@extends('frontend.app')
@section('title','Appointment-Lists')
@section('css_script')
@endsection
@section('content')
    <div id="all">
        <div id="content">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12">
                        <!-- breadcrumb-->
                        <nav aria-label="breadcrumb">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="#">Home</a></li>
                                <li aria-current="page" class="breadcrumb-item">My Appointment Lists</li>
                            </ol>
                        </nav>
                    </div>
                    <div class="col-lg-3">

                        @include('profile.menu')

                    </div>
                    <div id="customer-order" class="col-lg-9">
                        <table class="table text-center" id="table">
                            <thead class="text-uppercase bg-primary">
                            <tr class="text-white">
                                <th scope="col">ID</th>
                                <th scope="col">Name</th>
                                <th scope="col">Email</th>
                                <th scope="col">Phone</th>
                                <th scope="col" >Address</th>
                                <th scope="col" >Date</th>
{{--                                <th scope="col">action</th>--}}
                            </tr>
                            </thead>
                            <tbody id="sortable">

                            @foreach($appointments as $key=>$item)
                                <tr id="item-{{$item->id}}">
                                    <td>{{$key+1}}</td>
                                    <td>{{$item->firstname}} &nbsp;{{$item->lastname}}</td>
                                    <td>{{$item->email}}</td>
                                    <td>{{$item->phone}}</td>
                                    <td>{{$item->address}}</td>
                                    <td>{{date('d-M-Y', strtotime($item->date)) }}</td>
{{--                                    <td>--}}
{{--                                        --}}{{-- @if(auth()->user()->can('edit-banner')) --}}

{{--                                        --}}{{-- @endif --}}
{{--                                        --}}{{-- @if(auth()->user()->can('delete-banner')) --}}
{{--                                        <a href="javascript:void(0)" class="delete-appointments btn btn-danger btn-circle btn-sm"--}}
{{--                                           data-type="{{$item->id}}">--}}
{{--                                            <i class="fa fa-trash"></i>--}}
{{--                                        </a>--}}
{{--                                        --}}{{-- @endif --}}
{{--                                    </td>--}}
                                </tr>
                            @endforeach


                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
@section('js_script')
    <script>
        $(document).ready( function () {

            $('#table').on('click','.delete-appointments',function(event){
                event.preventDefault();
                $object = $(this);
                var id  = $(this).attr('data-type');
                var url = baseUrl+"/appointment/"+id;
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







        });

    </script>
@endsection
