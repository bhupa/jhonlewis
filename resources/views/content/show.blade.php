@extends('frontend.app')
@section('title', $content->title)
@section('css_script')
@endsection
@section('content')
    <div id="all">
        <div id="content">
            <div class="container">
                <div class="row">
                    {{--<div class="col-lg-12">--}}
                        {{--<!-- breadcrumb-->--}}
                        {{--<nav aria-label="breadcrumb">--}}
                            {{--<ol class="breadcrumb">--}}
                                {{--<li class="breadcrumb-item"><a href="{{route('home')}}">Home</a></li>--}}
                                {{--<li aria-current="page" class="breadcrumb-item active">{{$content->title}}</li>--}}
                            {{--</ol>--}}
                        {{--</nav>--}}
                    {{--</div>--}}

                    @if($content->slug =='frame-brand')
                        <div class="service-lists-content">
                            <h4>{{$content->title}}</h4>
                            <hr>
                            <div class="row" id="frames-brand">
                                <div class="col-lg-6">
                                    <div class="frame-wrapper-title">
                                        <h1>{{$content->title}}</h1>
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="frame-wrapper">
                                        {!! $content->description !!}
                                    </div>
                                </div>
                            </div>

                            <ul class="product-type-lists">
                                <li>
                                    <div class="top-level">
                                        <a href="javascript:void(0)" data-toggle="collapse" data-target="#eye-care">Eye Wear
                                            <span class="close"></span>
                                        </a>


                                    </div>

                                    <div id="eye-care" class="collapse show">
                                        <div class="row">
                                            @foreach($eyecares as $care)
                                                <div class="col-lg-4">
                                                    <div class="product-lists">
                                                        <a href="">
                                                            <div class="new"></div>
                                                            <img src="{{asset('storage/'.$care->image)}}" alt="{{$care->title}}">

                                                            {{--@if(file_exists('storage/'.$product->image) && $product->image != '')--}}
                                                            {{--<img src="{{asset('storage/'.$product->image)}}" alt="{{$product->title}}">--}}
                                                            {{--@endif--}}
                                                            <div class="product-lists-overlay">
                                                                {!! $care->short_description !!}
                                                            </div>
                                                        </a>
                                                    </div>
                                                </div>
                                            @endforeach

                                        </div>

                                    </div>
                                </li>
                                <li>
                                    <div class="top-level">
                                        <a href="javascript:void(0)" data-toggle="collapse" data-target="#kid-care">Kid Wear
                                            <span class="close"></span>
                                        </a>


                                    </div>

                                    <div id="kid-care" class="collapse">
                                        <div class="row">
                                            @foreach($kidwears as $ware)
                                                <div class="col-lg-4">
                                                    <div class="product-lists">
                                                        <a href="">
                                                            <div class="new"></div>
                                                            <img src="{{asset('storage/'.$ware->image)}}" alt="{{$ware->title}}">

                                                            {{--@if(file_exists('storage/'.$product->image) && $product->image != '')--}}
                                                            {{--<img src="{{asset('storage/'.$product->image)}}" alt="{{$product->title}}">--}}
                                                            {{--@endif--}}
                                                            <div class="product-lists-overlay">
                                                                {!! $ware->short_description !!}
                                                            </div>
                                                        </a>
                                                    </div>
                                                </div>
                                            @endforeach

                                        </div>

                                    </div>
                                </li>
                                <li>
                                    <div class="top-level">
                                        <a href="javascript:void(0)" data-toggle="collapse" data-target="#sunglass">Sunglass
                                            <span class="close"></span>
                                        </a>


                                    </div>

                                    <div id="sunglass" class="collapse">
                                        <div class="row">
                                            @foreach($sunglasses as $glass)
                                                <div class="col-lg-4">
                                                    <div class="product-lists">
                                                        <a href="">
                                                            <div class="new"></div>
                                                            <img src="{{asset('storage/'.$glass->image)}}" alt="{{$glass->title}}">

                                                            {{--@if(file_exists('storage/'.$product->image) && $product->image != '')--}}
                                                            {{--<img src="{{asset('storage/'.$product->image)}}" alt="{{$product->title}}">--}}
                                                            {{--@endif--}}
                                                            <div class="product-lists-overlay">
                                                                {!! $glass->short_description !!}
                                                            </div>
                                                        </a>
                                                    </div>
                                                </div>
                                            @endforeach

                                        </div>

                                    </div>
                                </li>

                            </ul>



                        </div>
                    @else
                        {{--<div class="col-lg-4">--}}
                                {{--@include('product.lists')--}}
                        {{--</div>--}}
                        <div class="col-lg-12">

                            <div class="service-lists-content">
                                <h4>{{$content->title}}</h4>
                                <hr>
                                @if(file_exists('storage/'.$content->image) && $content->image != '')
                                <img src="{{asset('storage/'.$content->image)}}" alt="{{$content->title}}">
                                @endif
                                    {!! $content->description !!}

                            </div>

                    </div>
                    @endif
                </div>
                <!-- /.col-md-9-->

            </div>
        </div>
    </div>
    </div>
@endsection
@section('js_script')
    <script type="text/javascript">
        $(document).ready(function () {
            $('#check-out-link').on('click',function(){
                var url = $(this).attr('data-type');
                $('#url').val(url)
                $('#login-modal').modal('show');
            })

            $(document).on('click','.cartlist  #cart-add',function(event){

                $("#overlay-load").fadeIn(300);
                var data = $(this).attr('data-value');
                var stock = $(this).attr('data-quantity');
                var id = $(this).attr('data-type');
                var totalPiece = $(this).attr('data-quantity');


                if (parseInt(data) < parseInt(totalPiece) && parseInt(data) != '') {
                    var quantity = Number(data) + 1;
                    cartupdate(id, quantity,totalPiece);
                }

                $('#cart-altera-input'+id).css('border','1px solid red');


                event.preventDefault();


            });
            $(document).on('click','.cartlist   #cart-sub',function(event){
                event.stopPropagation();
                var object = $(this);
                $("#overlay-load").fadeIn(300);
                var data = $(this).attr('data-value');
                var stock = $(this).attr('data-quantity');
                var id = $(this).attr('data-type');
                var totalPiece = $(this).attr('data-quantity');
                var url = baseUrl+"/cart/add/";
                if (parseInt(data) <= parseInt(totalPiece) && parseInt(data) != '') {
                    var quantity =Number(data)-1;
                    cartupdate(id,quantity, totalPiece);
                }else{
                    $(object).parent('.cart-increment-btn').find('#cart-altera-input').css('border','1px solid red');
                }

                event.preventDefault();

            });
            function cartupdate(id,quantity, totalPiece){
                $.ajax({
                    type:'Post',
                    url:baseUrl+"/cart/add/",
                    data:{stock_id:id,piece:quantity,id: totalPiece},
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    },
                    dataType: 'html',
                    success: function (carts) {
                        $('.cartlist').html(carts);
                        setTimeout(function(){
                            $("#overlay-load").fadeOut(300);
                        },500);
                        // $('#cart-success').modal('show');
                    }
                });
            }


        })

    </script>
@endsection
