@extends('backend.app')
@section('title','Edit-Product-Lists')
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
                            <li class="breadcrumb-item"><a href="{{route('product-lists.create')}}"> Add Product-Lists Lists</a></li>
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
                    <div class="col-8 ">
                        <div class="card card-primary">
                            <div class="card-header">
                                <h3 class="card-title">Edit Product-Lists Lists</h3>
                            </div>
                            <!-- /.card-header -->
                            <!-- form start -->
                            {!! Form::model($productlists,['route'=>['product-lists.update',$productlists->id],'class'=>'needs-validation','method'=>'PUT','enctype'=>   "multipart/form-data"])!!}

                            <div class="card-body">
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Name</label>
                                    <input type="text" class="form-control" name="name" placeholder="Enter Name" value="{{$productlists->name}}">

                                    @if ($errors->has('name'))
                                        <span class="text-danger">{{ $errors->first('name') }}</span>
                                    @endif
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Model</label>
                                    <input type="text" class="form-control" name="model" placeholder="Enter Model" value="{{$productlists->model}}">

                                    @if ($errors->has('model'))
                                        <span class="text-danger">{{ $errors->first('model') }}</span>
                                    @endif
                                </div>

                                <div class="form-row">
                                    <div class="col-md-12 mb-3">
                                        <label for="validationCustom01">Brand</label>
                                        <select name="brand_id" class="form-control">

                                            @foreach($brands as $brand)
                                                <option value="{{$brand->id}}" @if($brand->id == $productlists->category_id) selected="selected" @endif>{{$brand->name}}</option>
                                            @endforeach
                                        </select>
                                        @if ($errors->has('brand_id'))
                                            <span class="text-danger">{{ $errors->first('brand_id') }}</span>
                                        @endif
                                    </div>

                                </div>
                                <div class="form-group">
                                    <div class="col-md-12 mb-3">
                                        <label for="validationCustom01">Type</label>
                                        <select name="type" class="form-control">
                                            <option value="0">Select Type</option>
                                            <option value="eye-care" {{$productlists->type== 'eye-care' ? 'selected':''}}>Eye Wear</option>
                                            <option value="kid-wear" {{$productlists->type== 'kid-wear' ? 'selected':''}}>Kid Wear</option>
                                            <option value="sunglass" {{$productlists->type== 'sunglass' ? 'selected':''}}>Sunglass</option>

                                        </select>
                                        @if ($errors->has('type'))
                                            <span class="text-danger">{{ $errors->first('type') }}</span>
                                        @endif
                                    </div>

                                </div>

                                <div class="form-group">
                                    <label for="exampleInputFile">Upload Image</label>
                                    <div class="upload-btn-wrapper">
                                        <button type="button" class="btn">Upload a file</button>
                                        <input type="file" class="form-control" accept="image/*" id="upload-image" name="image">

                                    </div>
                                    @if ($errors->has('image'))
                                        <span class="text-danger">{{ $errors->first('image') }}</span>
                                    @endif
                                    <div class="cover edit-cover" >
                                        <a href="#">
                                            @if(file_exists('storage/'.$productlists->image) && $productlists->image != '')
                                                <img id="edit-logo-output"
                                                     src="{{asset('storage/'.$productlists->image)}}"
                                                     title="{{$productlists->name}}"
                                                     data-toggle="tooltip"/>

                                            @endif

                                            <img id="output" title="click to delete image" data-toggle="tooltip">

                                        </a>
                                        <div class="details edit-delete-img">
                                            <a href="javascript:void(0)" id="clear-image"><i class="fa fa-trash"></i></a>
                                        </div>

                                    </div>
                                </div>

                                <div class="form-group">
                                    <label for="exampleInputFile">Short Description</label>
                                    {{Form::textarea('short_description',$productlists->short_description,['class'=>'form-control','id'=>'short_description'])}}
                                    {{--                                        <textarea class="form-control" rows="3" placeholder="Enter ..." style="margin-top: 0px; margin-bottom: 0px; height: 115px;"></textarea>--}}
                                    @if ($errors->has('short_description'))
                                        <span class="text-danger">{{ $errors->first('short_description') }}</span>
                                    @endif
                                </div>
                                {{--<div class="form-group">--}}
                                    {{--<label for="exampleInputFile">Description</label>--}}
                                    {{--{{Form::textarea('description',$product-lists->description,['class'=>'form-control editor','id'=>'description'])}}--}}
                                    {{--                                        <textarea class="form-control" rows="3" placeholder="Enter ..." style="margin-top: 0px; margin-bottom: 0px; height: 115px;"></textarea>--}}
                                    {{--@if ($errors->has('description'))--}}
                                        {{--<span class="text-danger">{{ $errors->first('description') }}</span>--}}
                                    {{--@endif--}}
                                {{--</div>--}}
                            </div>
                            <!-- /.card-body -->

                            <div class="card-footer">
                                <button type="submit" class="btn btn-primary">Submit</button>
                            </div>
                            {{Form::hidden('id',$productlists->id)}}
                            {!! Form::close() !!}
                        </div>
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
            $('#upload-image').on('change',function(){

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
