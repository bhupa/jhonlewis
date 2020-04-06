@extends('frontend.app')
@section('title','Wishlist')
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
                                <li aria-current="page" class="breadcrumb-item"><a href="{{route('order-lists.index')}}">My Wishlists</a></li>
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
                                <th scope="col">Title</th>
                                <th scope="col">Image</th>
                                <th scope="col">Price</th>
                                <th scope="col">Colors</th>
                                <th scope="col">Discount</th>
                                <th scope="col">action</th>
                            </tr>
                            </thead>
                            <tbody id="sortable">

                            @foreach($wishlists as $key=>$item)
                                <tr id="item-{{$item->id}}">
                                    <td>{{$key+1}}</td>
                                    <td>
                                        <a href="{{route('product.show',[$item->product->slug])}}">{{$item->product->title}}</a>

                                    </td>
                                    <td>
                                        <img src="{{asset('storage/'.$item->product->image)}}" alt="{{$item->product->title}}">
                                    </td>
                                    <td>£{{$item->product->price}}</td>
                                    <td>
                                        @foreach($item->product->stocks as $stock)
                                            <span class="badge badge-secondary">{{$stock->color->name}}</span>
                                            @endforeach
                                    </td>


                                    <td>
                                        @if(!empty($item->product->discount_id))
                                            {{$item->product->discount->percentage}}%
                                            @endif
                                    </td>
                                    <td>

                                        <a href="javascript:void(0)" id="delte-wishlist" data-type="{{$item->id}}" class="edit-modal btn btn-info btn-circle btn-sm"
                                           data-info="">
                                            <i class="fa fa-trash"></i>
                                        </a>

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
@endsection
@section('js_script')
    <script>
        $(document).ready( function () {

            $('#table').on('click','#delte-wishlist',function(event){
                event.preventDefault();
                $object = $(this);
                var id  = $(this).attr('data-type');
                var url = baseUrl+"/wishlist/"+id;
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
                            url: "{{ route('blogs.change-status') }}",
                            data: {
                                'id': id,
                            },
                            headers: {
                                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                            },
                            dataType: 'json',
                            success: function (response) {
                                swal("Thank You!", response.message, "success");
                                if (response.blog.is_active == 1) {
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
