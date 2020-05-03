@extends('backend.app')
@section('title','Product Details')
@section('content')
    <div class="content-wrapper" style="min-height: 1416.81px;">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1>E-commerce</h1>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="{{route('products.index')}}">View Product Lists</a></li>
                            {{--<li class="breadcrumb-item active">Prdouct</li>--}}

                        </ol>
                    </div>
                </div>
            </div><!-- /.container-fluid -->
        </section>

        <!-- Main content -->
        <section class="content">

            <!-- Default box -->
            <div class="card card-solid">
                <div class="card-body">
                    <div class="row">
                        <div class="col-12 col-sm-6">
                            <h3 class="d-inline-block d-sm-none">{{$product->title}}</h3>
                            <div class="col-12">
                                    @if(file_exists('storage/'.$product->image) && $product->image != '')
                                <img src="{{asset('storage/'.$product->image)}}" class="product-image" alt="{{$product->title}}">
                                    @endif
                            </div>
                            <div class="custom-control form-control-lg custom-checkbox" style="margin-top: -15px;margin-bottom: 10px;">
                                @if($product->shipping =='1')
                                    <input type="checkbox" checked class="custom-control-input" name="shipping" id="customCheck1" disabled="disabled">
                                    <label class="custom-control-label" for="customCheck1">Shipping </label>
                                @else
                                    <input type="checkbox" class="custom-control-input" name="shipping" id="customCheck1" disabled="disabled">
                                    <label class="custom-control-label" for="customCheck1">Shipping</label>
                                @endif

                            </div>
                            <div class="col-12 product-image-thumbs">


                                <div class="bg-gray py-2 px-3 mt-4">
                                    <h2 class="mb-0">
                                        £ {{$product->price}}
                                    </h2>
                                    <h4 class="mt-0">
                                        @if(!empty($product->discount))
                                            <span>Discount Percentage: {{$product->discount->percentage}}</span><br>
                                            @php $discount =  ($product->price * ($product->discount->percentage / 100))@endphp
                                            <span>Discount Price: {{$product->price}} - {{$discount}}</span><br>
                                            <small>Actual Price:   £{{$product->price - $discount}}</small>

                                        @endif
                                    </h4>
                                </div>

                                {{--                                @foreach($product->stocks as $stock)--}}


{{--                                <div class="product-image-thumb active">--}}

{{--                                    @if(file_exists('storage/'.$stock->image) && $stock->image != '')--}}
{{--                                        <img src="{{asset('storage/'.$stock->image)}}" class="product-image" alt="{{$stock->title}}">--}}

{{--                                    @endif--}}


{{--                                </div>--}}


{{--                                @endforeach--}}
                            </div>
                        </div>
                        <div class="col-12 col-sm-6">
                            <h3 class="my-3">{{$product->title}}</h3>

                            <hr>
                            <h4>Available Colors</h4>
                            <div class="btn-group btn-group-toggle" data-toggle="buttons">
                                @foreach($product->stocks as $stock)
                                <label class="btn btn-default text-center">
                                    <input type="radio" name="color_option" id="color_option1" autocomplete="off" checked="">
                                    {{$stock->color->name}}
                                    <br>
                                    <i class="fas fa-circle fa-2x " style="color: {{$stock->color->name}}"></i>
                                </label>
                               @endforeach
                            </div>

                            <ul id="prodcut-details-lists">
                                {{--<li><span>Types:</span>{{$product->glasses->name}}</li>--}}
                                <li><span>Brand:</span>{{$product->brand->name}}</li>
                                {{--<li><span>Frame:</span>{{$product->frame->name}}</li>--}}
                                {{--<li><span>Frame Category:</span>{{$product->category->name}}</li>--}}
                                {{--<li><span>Lense:</span>{{$product->lenses->name}}</li>--}}
                                <li><span>Size:</span>{{$product->size}}</li>
                                <li><span>Model:</span>{{$product->shape}}</li>
                                {{--<li><span>Style:</span>{{$product->model}}</li>--}}
                                <li><span>Warranty:</span>
                                    @if(!empty($product->warranty))
                                    {{$product->warranty}}
                                    @else
                                        No
                                    @endif
                                </li>
                            </ul>













                        </div>
                    </div>
                    <div class="row mt-4">
                        <nav class="w-100">
                            <div class="nav nav-tabs" id="product-tab" role="tablist">
                                <a class="nav-item nav-link " id="product-desc-tab" data-toggle="tab" href="#product-desc" role="tab" aria-controls="product-desc" aria-selected="false">Description</a>
                                <a class="nav-item nav-link" id="product-comments-tab" data-toggle="tab" href="#product-comments" role="tab" aria-controls="product-comments" aria-selected="false">Stock</a>
                            </div>
                        </nav>
                        <div class="tab-content p-3" id="nav-tabContent">
                            <div class="tab-pane fade  active show" id="product-desc" role="tabpanel" aria-labelledby="product-desc-tab">
                                {!! $product->description !!}
                            </div>
                            <div class="tab-pane fade active " id="product-comments" role="tabpanel" aria-labelledby="product-comments-tab">
                                <ul class="stock-view-image">
                                    @foreach($product->stocks as $stock)
                                    <li>
                                        @if(file_exists('storage/'.$stock->image) && $stock->image != '')
                                            <img src="{{asset('storage/'.$stock->image)}}" class="img-fluid" alt="{{$stock->title}}"><br>

                                        @endif
                                        <span>Total::{{$stock->piece}}</span><br>
                                        <span>Color:: <i class="fas fa-circle fa-2x " style="color: {{$stock->color->name}}"></i></span>
                                    </li>
                                        @endforeach
                                </ul>
                            </div>
                            </div>
                    </div>
                </div>
                <!-- /.card-body -->
            </div>
            <!-- /.card -->

        </section>
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
