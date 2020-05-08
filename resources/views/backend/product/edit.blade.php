@extends('backend.app')
@section('title','Edit-Products')
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
                    <div class="col-8 ">
                        <div class="card card-primary">
                            <div class="card-header">
                                <h3 class="card-title">Edit Product</h3>
                            </div>
                            <!-- /.card-header -->
                            <!-- form start -->
                            {!! Form::model($products,['route'=>['products.update',$products->id],'class'=>'needs-validation','method'=>'PUT','id'=>'product-edit','enctype'=>   "multipart/form-data"])!!}

                            <div class="card-body">
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Title</label>
                                    <input type="text" class="form-control" name="title" placeholder="Enter Title" value="{{$products->title}}">

                                    @if ($errors->has('title'))
                                        <span class="text-danger">{{ $errors->first('title') }}</span>
                                    @endif </div>
                                <div class="form-group">
                                    <div class="col-md-12 mb-3">
                                        <label for="validationCustom01">Type</label>
                                        <select name="type" class="form-control">
                                            <option value="0">Select Type</option>
                                            <option value="eye-care" {{$products->type== 'eye-care' ? 'selected':''}}>Eye Wear</option>
                                            <option value="kid-wear" {{$products->type== 'kid-wear' ? 'selected':''}}>Kid Wear</option>
                                            <option value="sunglass" {{$products->type== 'sunglass' ? 'selected':''}}>Sunglass</option>

                                        </select>
                                        @if ($errors->has('type'))
                                            <span class="text-danger">{{ $errors->first('type') }}</span>
                                        @endif
                                    </div>

                                </div>

                                {{--<div class="form-group">--}}
                                    {{--<div class="row">--}}
                                        {{--<div class="col-md-6 mb-3">--}}
                                            {{--<label for="validationCustom01">Frame </label>--}}
                                            {{--<select name="frame_id" class="form-control" id="frame_id" data-type="{{$products->id}}">--}}
                                                {{--<option value="">Select Frame </option>--}}

                                                {{--@foreach($frames as $category)--}}
                                                    {{--<option value="{{$category->id}}" @if($products->frame_id == $category->id) selected="selected" @endif>{{$category->name}}</option>--}}
                                                {{--@endforeach--}}
                                            {{--</select>--}}
                                            {{--@if ($errors->has('frame_id'))--}}
                                                {{--<span class="text-danger">{{ $errors->first('frame_id') }}</span>--}}
                                            {{--@endif--}}
                                        {{--</div>--}}

                                        {{--<div class="col-md-6 mb-3">--}}
                                            {{--<label for="validationCustom01">Frame Category</label>--}}
                                            {{--<select name="frame_category_id"  class="form-control"id="frame_category_id">--}}
                                            {{--</select>--}}
                                            {{--@if ($errors->has('frame_category_id'))--}}
                                                {{--<span class="text-danger">{{ $errors->first('frame_category_id') }}</span>--}}
                                            {{--@endif--}}
                                        {{--</div>--}}
                                    {{--</div>--}}


                                {{--</div>--}}
                                <div class="row">
                                    <div class="col-md-6 mb-3">
                                        <label for="validationCustom01">Brand </label>
                                        <select name="brand_id" class="form-control" id="frame_id">
                                            <option value="">Select Brand </option>

                                            @foreach($brands as $category)
                                                <option value="{{$category->id}}" @if($products->brand_id == $category->id) selected="selected" @endif>{{$category->name}}</option>
                                            @endforeach
                                        </select>
                                        @if ($errors->has('brand_id'))
                                            <span class="text-danger">{{ $errors->first('brand_id') }}</span>
                                        @endif
                                    </div>
                                    <div class="col-md-6 mb-3">
                                        <label for="exampleInputEmail1">Model</label>
                                        <input type="text" class="form-control" name="shape" placeholder="Enter Model" value="{{$products->shape}}">

                                        @if ($errors->has('shape'))
                                            <span class="text-danger">{{ $errors->first('shape') }}</span>
                                        @endif
                                    </div>
                                </div>
                                {{--<div class="form-group">--}}
                                    {{--<div class="row">--}}
                                        {{--<div class="col-md-6 mb-3">--}}
                                            {{--<label for="validationCustom01">Glasses</label>--}}
                                            {{--<select name="glass_id" class="form-control">--}}
                                                {{--<option value="">Select Glass</option>--}}

                                                {{--@foreach($glasses as $category)--}}
                                                    {{--<option value="{{$category->id}}" @if($products->glass_id == $category->id) selected="selected" @endif>{{$category->name}}</option>--}}
                                                {{--@endforeach--}}
                                            {{--</select>--}}
                                            {{--@if ($errors->has('glass_id'))--}}
                                                {{--<span class="text-danger">{{ $errors->first('cglassid') }}</span>--}}
                                            {{--@endif--}}
                                        {{--</div>--}}

                                        {{--<div class="col-md-6 mb-3">--}}
                                            {{--<label for="validationCustom01">Sunglasses</label>--}}
                                            {{--<select name="sunglass_id" class="form-control">--}}
                                                {{--<option value="">Select Sunglass</option>--}}

                                                {{--@foreach($sunglasses as $category)--}}
                                                    {{--<option value="{{$category->id}}"@if($products->sunglass_id == $category->id) selected="selected" @endif>{{$category->name}}</option>--}}
                                                {{--@endforeach--}}
                                            {{--</select>--}}
                                            {{--@if ($errors->has('sunglass_id'))--}}
                                                {{--<span class="text-danger">{{ $errors->first('sunglass_id') }}</span>--}}
                                            {{--@endif--}}
                                        {{--</div>--}}

                                    {{--</div>--}}

                                {{--</div>--}}
                                {{--<div class="form-group">--}}
                                    {{--<div class="row">--}}
                                        {{--<div class="col-md-6 mb-3">--}}
                                            {{--<label for="validationCustom01">Lense</label>--}}
                                            {{--<select name="lens_id" class="form-control">--}}
                                                {{--<option value="">Select Lense</option>--}}

                                                {{--@foreach($lenses as $category)--}}
                                                    {{--<option value="{{$category->id}}" @if($products->lens_id == $category->id) selected="selected" @endif>{{$category->name}}</option>--}}
                                                {{--@endforeach--}}
                                            {{--</select>--}}
                                            {{--@if ($errors->has('lens_id'))--}}
                                                {{--<span class="text-danger">{{ $errors->first('lens_id') }}</span>--}}
                                            {{--@endif--}}
                                        {{--</div>--}}

                                        {{--<div class="col-md-6 mb-3">--}}
                                            {{--<label for="validationCustom01">Discount</label>--}}
                                            {{--<select name="discount_id" class="form-control">--}}
                                                {{--<option value="">Select Discount</option>--}}

                                                {{--@foreach($discounts as $category)--}}
                                                    {{--<option value="{{$category->id}}" @if($products->discount_id == $category->id) selected="selected" @endif>{{$category->title}}</option>--}}
                                                {{--@endforeach--}}
                                            {{--</select>--}}
                                            {{--@if ($errors->has('discount_id'))--}}
                                                {{--<span class="text-danger">{{ $errors->first('discount_id') }}</span>--}}
                                            {{--@endif--}}
                                        {{--</div>--}}
                                    {{--</div>--}}

                                {{--</div>--}}
                                <div class="form-group">
                                    <div class="row">
                                        <div class="col-md-6 mb-3">
                                            <label for="validationCustom01">Price</label>
                                            <input type="text" class="form-control" name="price" placeholder="Price" value="{{ $products->price}}">
                                            @if ($errors->has('price'))
                                                <span class="text-danger">{{ $errors->first('price') }}</span>
                                            @endif
                                        </div>

                                        <div class="col-md-6 mb-3">
                                            <label for="validationCustom01">Warrranty</label>
                                            <input type="text" class="form-control" name="warranty" placeholder="Warranty" value="{{ $products->warranty}}">

                                            @if ($errors->has('wrranty'))
                                                <span class="text-danger">{{ $errors->first('wrranty') }}</span>
                                            @endif
                                        </div>
                                    </div>

                                </div>
                                <div class="form-group">
                                    <div class="row">
                                        {{--<div class="col-md-6 mb-3">--}}
                                            {{--<label for="validationCustom01">Shape</label>--}}
                                            {{--<input type="text" class="form-control" name="shape" placeholder="Shape" value="{{ $products->shape}}">--}}
                                            {{--@if ($errors->has('shape'))--}}
                                                {{--<span class="text-danger">{{ $errors->first('shape') }}</span>--}}
                                            {{--@endif--}}
                                        {{--</div>--}}

                                        <div class="col-md-6 mb-3">
                                            <label for="validationCustom01">Size</label>
                                            <input type="text" class="form-control" name="size" placeholder="Size" value="{{ $products->size}}">

                                            @if ($errors->has('size'))
                                                <span class="text-danger">{{ $errors->first('size') }}</span>
                                            @endif
                                        </div>
                                        <div class="col-md-6 mb-3">
                                        <label for="validationCustom01">Discount</label>
                                        <select name="discount_id" class="form-control">
                                        <option value="">Select Discount</option>

                                        @foreach($discounts as $category)
                                        <option value="{{$category->id}}" @if($products->discount_id == $category->id) selected="selected" @endif>{{$category->title}}</option>
                                        @endforeach
                                        </select>
                                        @if ($errors->has('discount_id'))
                                        <span class="text-danger">{{ $errors->first('discount_id') }}</span>
                                        @endif
                                        </div>
                                        {{--</div>--}}
                                    </div>

                                </div>
                                {{--<div class="form-group">--}}
                                    {{--<div class="row">--}}
                                        {{--<div class="col-md-6 mb-3">--}}
                                            {{--<label for="validationCustom01">Style</label>--}}
                                            {{--<input type="text" class="form-control" name="style" placeholder="Style" value="{{ $products->style}}">--}}
                                            {{--@if ($errors->has('style'))--}}
                                                {{--<span class="text-danger">{{ $errors->first('style') }}</span>--}}
                                            {{--@endif--}}
                                        {{--</div>--}}

                                        {{--<div class="col-md-6 mb-3">--}}
                                            {{--<div class="custom-control form-control-lg custom-checkbox">--}}
                                                {{--<input type="checkbox" class="custom-control-input" name="shipping" id="customCheck1">--}}
                                                {{--<label class="custom-control-label" for="customCheck1">Shipping</label>--}}
                                            {{--</div>--}}
                                            {{--@if ($errors->has('size'))--}}
                                                {{--<br><span class="text-danger">{{ $errors->first('size') }}</span>--}}
                                            {{--@endif--}}
                                        {{--</div>--}}
                                    {{--</div>--}}

                                {{--</div>--}}

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
                                            @if(file_exists('storage/'.$products->image) && $products->image != '')
                                                <img id="edit-logo-output"
                                                     src="{{asset('storage/'.$products->image)}}"
                                                     title="{{$products->name}}"
                                                     data-toggle="tooltip"/>

                                            @endif

                                            <img id="output" title="click to delete image" data-toggle="tooltip">

                                        </a>
                                        <div class="details edit-delete-img">
                                            <a href="javascript:void(0)" id="clear-image"><i class="fa fa-trash"></i></a>
                                        </div>

                                    </div>
                                    <div class="custom-control form-control-lg custom-checkbox">
                                        <input type="checkbox" class="custom-control-input" @if($products->shipping =='1')  checked @endif="shipping" id="customCheck1">
                                        <label class="custom-control-label" for="customCheck1">Shipping</label>
                                    </div>
                                    @if ($errors->has('size'))
                                        <br><span class="text-danger">{{ $errors->first('size') }}</span>
                                    @endif
                                    {{--<label for="exampleInputFile">Description</label>--}}
                                    {{--{{Form::textarea('description',$products->description,['class'=>'form-control editor','id'=>'description'])}}--}}
                                    {{--                                        <textarea class="form-control" rows="3" placeholder="Enter ..." style="margin-top: 0px; margin-bottom: 0px; height: 115px;"></textarea>--}}
                                    {{--@if ($errors->has('description'))--}}
                                        {{--<span class="text-danger">{{ $errors->first('description') }}</span>--}}
                                    {{--@endif--}}
                                </div>
                            </div>
                            <!-- /.card-body -->

                            <div class="card-footer">
                                <button type="submit" class="btn btn-primary">Submit</button>
                            </div>
                            {{Form::hidden('id',$products->id)}}
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
            $(window).on('load', function() {
                var id = $( "#frame_id option:selected" ).val();
                var url = "{{route('products.get-product-category')}}";
                var productId = $('#frame_id').attr('data-type');
                    $.ajax({
                        type: 'post',
                        url: url,
                        data: {id:id,productId:productId},
                        dataType: 'json',
                        headers: {
                            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                        },
                        success: function (response) {
                            if (response.success == true) {

                                $('#frame_category_id').html(response.option);
                            } else {
                                $('#frame_category_id').empty();
                            }
                        }
                    })

            })
            $("#product-edit").on("change","#frame_id", function() {
                var id = $("#frame_id option:selected").val();

                    var url = "{{route('frames.get-category')}}";
                    $.ajax({
                        type: 'post',
                        url: url,
                        data: {id: id},
                        dataType: 'json',
                        headers: {
                            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                        },
                        success: function (response) {

                            if (response.success == true) {

                                var value = response.categories;
                                var option = '';
                                // option  +='<option selected="selected" value="0">Select Frame Category</option:selectedoption>';
                                $.each(value, function (key, value) {

                                    option += '<option value="' + value.id + '">' + value.name + '</option:selectedoption>';
                                });
                                // option  +='<option selected="selected" value="0">Select Frame Category</option:selectedoption>';
                                $('#frame_category_id').html(option);
                            } else {
                                $('#frame_category_id').empty();
                            }
                        }
                    })

            })



        });
    </script>
@endsection
