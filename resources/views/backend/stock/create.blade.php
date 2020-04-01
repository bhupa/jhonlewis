@extends('backend.app')
@section('title','Add-Stock')
@section('content')
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0 text-dark">Dashboard</h1>
                    </div><!-- /.col -->
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="{{route('products.index')}}"> View Product</a></li>
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
                <div class="row justify-content-center">
                    <div class="col-11 ">
                        <div class="card card-primary">
                            <div class="card-header">
                                <h3 class="card-title">Add Stock</h3>
                            </div>
                            <!-- /.card-header -->
                            <!-- form start -->
                            {!! Form::open(['route'=>['stocks.store'],'class'=>'needs-validation"','enctype'=>   "multipart/form-data"])!!}

                            <div class="card-body">
                                <div class="form-row">
                                    <div class="col">
                                        <label for="validationCustom01">Title</label>
                                        <input type="text" class="form-control" name="title" placeholder="Enter Title" value="{{old('title')}}">
                                        @if ($errors->has('title'))
                                            <span class="text-danger">{{ $errors->first('title') }}</span>
                                        @endif
                                    </div>
                                    <div class="col">
                                        <label for="validationCustom01">Piece</label>
                                        <input type="number" class="form-control" name="piece" placeholder="Enter Piece" value="{{old('piece')}}">
                                        @if ($errors->has('piece'))
                                            <span class="text-danger">{{ $errors->first('piece') }}</span>
                                        @endif
                                    </div>
                                    <div class="col">
                                        <label for="validationCustom01">Color</label>
                                        <input type="text" class="form-control" id="color"  name="color" id="validationCustom01" placeholder="Color" value="{{ old('color') }}" >
                                        <div id="colorLists">
                                        </div>
                                        @if ($errors->has('color'))
                                            <span class="text-danger">{{ $errors->first('color') }}</span>
                                        @endif
                                    </div>

                                    <div class="col stock-image">
                                        <label for="validationCustom01">Image</label>
                                        <div class="upload-btn-wrapper">
                                                                                    <button type="button" class="btn">Upload a file</button>
                                                                                    <input type="file" class="form-control" accept="image/*" id="upload-image" name="image">

                                                                                </div>
                                                                                @if ($errors->has('image'))
                                                                                    <span class="text-danger">{{ $errors->first('image') }}</span>
                                                                                @endif
                                                                                <div class="cover">
                                                                                    <a href="#">

                                                                                        <img id="output" title="click to delete image" data-toggle="tooltip">

                                                                                    </a>
                                                                                    <div class="details">
                                                                                        <a href="javascript:void(0)" id="clear-image"><i class="fa fa-trash"></i></a>
                                                                                    </div>

                                    </div>
                                    </div>

                                </div>
                                    <div class="card-footer">
                                        <button type="submit" class="btn btn-primary">Submit</button>
                                    </div>

{{--                                    <div class="col stock-submit">--}}
{{--                                        <button type="submit" class="btn btn-primary">Add</button>--}}
{{--                                    </div>--}}
                                    <input type="hidden" name="id" value="{{$product->id}}">

                            {!! Form::close() !!}
                        </div>
                    </div>

                </div>
                    </div>
                </div>
                <!-- /.row -->

            </div>
            <!-- /.container-fluid -->
            <div class="table-responsive">
                <table class="table text-center" id="table">
                    <thead class="text-uppercase bg-primary">
                    <tr class="text-white">
                        <th scope="col">ID</th>
                        <th scope="col">Title</th>
                        <th scope="col">Product Token</th>
                        <th scope="col">Color</th>
                        <th scope="col">Piece</th>
                        <th scope="col">Image</th>
                        <th scope="col">Status</th>
                        <th scope="col">action</th>
                    </tr>
                    </thead>
                    <tbody id="sortable">

                    @foreach($stocks as $key=>$item)
                        <tr id="item-{{$item->id}}">
                            <td>{{$key+1}}</td>
                            <td>{{$item->title}}</td>
                            <td>{{$item->products->product_number}}</td>
                            <td>{{$item->color->name}}</td>
                            <td>{{$item->piece}}</td>
                            <td>
                                @if(file_exists('storage/'.$item->image) && $item->image != '')
                                    <img style="width:100px;height:100px;" src="{{asset('storage/'.$item->image)}}" alt="{{$item->name}}">
                                @else
                                    <img style="width:100px;height:100px;" src="{{asset('backend/dist/img/placeholder.png')}}" alt="{{$item->name}}">
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
                            <td>
                                {{-- @if(auth()->user()->can('edit-banner')) --}}
                                <a href="{{route('stocks.edit', $item->slug)}}" class="edit-stock btn btn-info btn-circle btn-sm"
                                   data-info="">
                                    <i class="fas fa-edit"></i>
                                </a>

                                {{-- @endif --}}
                                {{-- @if(auth()->user()->can('delete-banner')) --}}
                                <a href="javascript:void(0)" class="delete-stock btn btn-danger btn-circle btn-sm"
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
        <!-- /.content -->
    </div>
    <div class="stock-details">

    </div>


@endsection
@section('js_script')
    <script>
        $(document).ready( function () {
            $('#upload-image').on('change',function(){

                readImgUrlAndPreview(this);
                function readImgUrlAndPreview(input){
                    $('#output').css('display','block');
                    $('.cover').css('display','block');
                    if (input.files && input.files[0]) {
                        var reader = new FileReader();
                        reader.onload = function (e) {
                            $('#output').attr('src', e.target.result);
                        }
                    };
                    reader.readAsDataURL(input.files[0]);
                }
            })

            $('#clear-image').on('click',function(){
                var logo = $('#upload-image-details').attr('data-logo');

                if(logo == 1){
                    $('#upload-image-details').attr('data-image','0');
                    $( '#upload-image-details').css('margin-bottom','200px');
                }
                else{
                    $('#upload-image-details').attr('data-image','0');
                    $( '#upload-image-details').css('margin-bottom','0px');
                }
                $('#output').css('display','none');
                $('.cover').css('display','none');
                $('#output').attr('src', '');
            })
            $('#color').keyup(function(){
                var query = $(this).val();
                if(query != '')
                {
                    var _token = $('input[name="_token"]').val();
                    $.ajax({
                        url:"{{ route('colors.index') }}",
                        method:"get",
                        data:{query:query, _token:_token},
                        success:function(data){
                            $('#colorLists').fadeIn();
                            $('#colorLists').html(data);
                        }
                    });
                }
            });

            $(document).on('click', 'li', function(){
                $('#color').val($(this).text());
                $('#colorLists').fadeOut();
            });
            $('#table').on('click','.delete-stock',function(event){
                event.preventDefault();
                $object = $(this);
                var id  = $(this).attr('data-type');
                var url = baseUrl+"/stocks/"+id;
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
                            type: "Post",
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
                            type: "get",
                            url: "{{ route('stocks.change-status') }}",
                            data: {
                                'id': id,
                            },
                            headers: {
                                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                            },
                            dataType: 'json',
                            success: function (response) {
                                swal("Thank You!", response.message, "success");
                                if (response.stocks.is_active == '1') {
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
            $('#table').on('click','.edit-stock-details',function(event){
                event.preventDefault();
                $object = $(this);
                var url  = $(this).attr('data-type');



                $.ajax({
                    type: "get",
                    url: url,
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    },
                    success: function (contact) {
                        $('.stock-details').html(contact);
                        $('#stock-edit-details').modal('show');
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

            $('#upload-stock-image').on('change',function(){

                readImgUrlAndPreview(this);
                function readImgUrlAndPreview(input){
                    $('#edit-logo-output').css('display','none');
                    $('.edit-delete-img').css('display','block');
                    $('#output').css('display','block');
                    $('.cover').css('display','block');
                    if (input.files && input.files[0]) {
                        var reader = new FileReader();
                        reader.onload = function (e) {
                            $('#output').attr('src', e.target.result);
                        }
                    };
                    reader.readAsDataURL(input.files[0]);
                }
            })

            $('#clear-image').on('click',function(){
                $('#edit-logo-output').css('display','block');;
                $('.edit-delete-img').css('display','none');
                $('#output').css('display','none');


            })

        });
    </script>
@endsection
