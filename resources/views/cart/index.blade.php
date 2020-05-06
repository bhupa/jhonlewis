@extends('frontend.app')
@section('title','Cart Details')
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
                                <li aria-current="page" class="breadcrumb-item active">Shopping cart</li>
                            </ol>
                        </nav>
                    </div>
                    <div id="basket" class="col-lg-12">
                        <div class="box">
                            <form method="post" action="checkout1.html">
                                <h1>Shopping cart</h1>
                                <p class="text-muted">You currently have {{$carts->totalItem}} item(s) in your cart.</p>
                                @if ($message = Session::get('cart-message'))
                                    <div class="alert alert-info alert-block">
                                        <button type="button" class="close" data-dismiss="alert">×</button>
                                        <strong>{{ $message }}</strong>
                                    </div>
                                @endif
                                @if(session()->has('flaserror'))
                                    <div class="alert alert-danger">
                                        {{ session()->get('flaserror') }}
                                    </div>
                                @endif
                                <div class="table-responsive">
                                    <div class="cartlist">
                                    <table class="table">
                                        <thead>
                                        <tr>
                                            <th>No.</th>
                                            <th colspan="2">Product</th>
                                            <th>Color</th>
                                            <th>Quantity</th>
                                            <th>Unit price</th>
                                            <th>Discount</th>
                                            <th>Discount Price</th>
                                            <th colspan="2">Total</th>
                                        </tr>
                                        </thead>

                                        @if(!empty(Session::get('cart')))
                                            <tbody>
                                            @php $i=1; @endphp
                                            @foreach($carts->items as $key=>$cart)
                                        <tr>
                                            <td>{{$i++}}</td>
                                            <td>
                                                <a href="{{route('product.show',[$cart['slug']])}}">
                                                    <img src="{{asset('storage/'.$cart['image'])}}" alt="{{$cart['title']}}">
                                                </a>
                                            </td>

                                            <td><a href="{{route('product.show',[$cart['slug']])}}">{{$cart['title']}}</a></td>
                                            <td>{{$cart['color']}}</td>
                                            <td>
                                                <div class="cart-increment-btn">
                                                    <input type="hidden" name="id" id="stock-piece" value="">
                                                    <button type="button" id="cart-add" class="cart-altera altera acrescimo" data-quantity="{{$cart['total_quantity']}}" data-quantity="{{$cart['piece']}}" data-type="{{$cart['stockId']}}" data-value="{{$cart['piece']}}"><i class="fa fa-plus"></i></button>
                                                    <input type="number"  name="piece" id="cart-altera-input-{{$cart['stockId']}}" min="1" placeholder="0" class="cart-increment-value" data-quantity="{{$cart['piece']}}" data-type="{{$cart['stockId']}}"  class="cart-increment-value"  value="{{$cart['piece']}}">
                                                    <button type="button" id="cart-sub" class="cart-altera altera decrescimo" data-quantity="{{$cart['total_quantity']}}" data-quantity="{{$cart['piece']}}" data-type="{{$cart['stockId']}}" data-value="{{$cart['piece']}}"><i class="fa fa-minus"></i></button>
                                                    @if ($errors->has('piece'))
                                                        <span class="text-danger">{{ $errors->first('piece') }}</span>
                                                    @endif
                                                </div>
                                            </td>

                                            <td>£ {{$cart['unit_price']}}</td>
                                            <td>{{$cart['discount']}}</td>
                                            <td> @if(!empty($cart['discount_price']))  £{{$cart['discount_price']}} @endif</td>
                                            <td>£ {{$cart['price']}}</td>
{{--                                           --}}
                                            <td><a href="{{route('cart.remove',[$key])}}"><i class="fa fa-trash-o"></i></a></td>
                                        </tr>

                                            </tbody>

                                            @endforeach
                                            <tfoot>
                                            <tr>
                                                <th colspan="2">Total </th>
                                                <th colspan="1">{{$carts->totalItem}}</th>
                                                <th colspan="4">{{$carts->totalPiece}}</th>
                                                <th colspan="2">£ {{number_format((float)$carts->totalPrice, 2, '.', '')}}</th>

                                            </tr>
{{--                                            <tr>--}}
{{--                                                <th colspan="7">Total Items</th>--}}
{{--                                                <th colspan="2">{{$carts->totalItem}}</th>--}}

{{--                                            </tr>--}}
                                            </tfoot>
                                        @else

                                            <tr>
                                                <td>Product is not add to cart yet.</td>
                                            </tr>
                                        @endif

                                    </table>
                                    </div>
                                </div>
                                <!-- /.table-responsive-->
                                <div class="box-footer d-flex justify-content-between flex-column flex-lg-row">
                                    <a href="{{route('cart.clear')}}" class="btn btn-outline-secondary"><i class="fa fa-refresh"></i>Clear Cart</a>
                                    <div class="right">
                                        @if(Auth::check())
                                            @if(!empty(Session::get('cart')))
                                        <a href="{{route('order.index')}}" class="btn btn-primary">Proceed to checkout <i class="fa fa-chevron-right"></i></a>
                                        @endif
                                        @else
                                            <a href="javascript:void(0)" id="check-out-link" data-type="{{route('order.index')}}" class="btn btn-primary">Proceed to checkout <i class="fa fa-chevron-right"></i></a>

                                        @endif
                                    </div>
                                </div>
                            </form>
                        </div>
                        <!-- /.box-->
                        <div class="row  products">

                                @foreach($products as $product)
                                    <div class="col-lg-3 col-md-4">
                                        <div class="product-single-item">
                                            <a href="{{route('product.show',[$product->slug ])}}" class="shop-lists">
                                                <img src="{{asset('storage/'.$product->image)}}" alt="{{$product->title}}">

                                            </a>
                                            <p><span class="model text-left">Mod: {{$product->shape}}</span>
                                            </p>
                                            <p>
                                                <span class="brand">Brand:{{$product->brand->name}}</span></p>
                                        </div>

                                        <!-- /.product            -->
                                    </div>
                            @endforeach

                            <!-- /.products-->
                        </div>
                    </div>
                    <!-- /.col-lg-9-->
{{--                    <div class="col-lg-2">--}}
{{--                        @include('cart.sidebar')--}}
{{--                        <div class="box">--}}
{{--                            <div class="box-header">--}}
{{--                                <h4 class="mb-0">Coupon code</h4>--}}
{{--                            </div>--}}
{{--                            <p class="text-muted">If you have a coupon code, please enter it in the box below.</p>--}}
{{--                            <form>--}}
{{--                                <div class="input-group">--}}
{{--                                    <input type="text" class="form-control"><span class="input-group-append">--}}
{{--                      <button type="button" class="btn btn-primary"><i class="fa fa-gift"></i></button></span>--}}
{{--                                </div>--}}
{{--                                <!-- /input-group-->--}}
{{--                            </form>--}}
{{--                        </div>--}}
{{--                    </div>--}}
                    <!-- /.col-md-3-->
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
