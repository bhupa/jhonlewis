@extends('frontend.app')
@section('title','SunGlass')
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
                                <li class="breadcrumb-item"><a href="{{route('home')}}">Home</a></li>
                                <li aria-current="page" class="breadcrumb-item active">SunGlasses</li>
                                <li aria-current="page" class="breadcrumb-item active">{{$brand->title}}</li>
                            </ol>
                        </nav>
                    </div>
                    <div class="col-lg-3">
                        @include('product.lists')
                    </div>
                    <div class="col-lg-9">
                        <div class="row ">
                            @foreach($products as $product)
                                <div class="col-md-4 col-sm-6">
                                    <div class="product">
                                        <div class="flip-container">
                                            <a href="{{route('product.show',[$product->slug])}}">
                                                <img style="height: 200px;" src="{{asset('storage/'.$product->image)}}" alt="{{$product->title}}" class="img-fluid">
                                            </a>
                                        </div>

                                        <div class="text column">
                                            <h3><a href="{{route('product.show',[$product->slug])}}">{{$product->title}}</a></h3>
                                            @if(!empty($product->discount_id))
                                                <p class="price">
                                                    <strike>£{{$product->price}}</strike><br>
                                                    @php $discount = $product->price - ($product->price * ($product->discount->percentage / 100))@endphp
                                                    £ &nbsp;{{ $discount}}
                                                </p>
                                            @else
                                                <p class="price">
                                                    <del></del>£&nbsp;{{$product->price}}
                                                </p>
                                            @endif
                                            @if(!empty($product->discount_id))
                                                <div class="ribbon sale discount-tage">
                                                    <div class="theribbon" style="width: 162px;">off {{$product->discount->percentage}}%</div>
                                                    <div class="ribbon-background"></div>
                                                </div>
                                            @endif

                                            <p class="buttons">
                                                <a href="{{route('product.show',[$product->slug])}}" class="btn btn-default">View detail</a>
                                                <a href="javascript:void(0)" class="btn btn-primary"> @if($product->stocks->isNotEmpty()) Total Colors-{{count($product->stocks)}} @else One Item @endif</a>
                                            </p>
                                        </div>
                                        <!-- /.text -->
                                    </div>
                                    <!-- /.product -->
                                </div>
                        @endforeach
                        <!-- /.col-md-4 -->
                        </div>
                        <div class="pages">
                            <nav aria-label="Page navigation example" class="d-flex justify-content-center">
                                <nav aria-label="Page navigation example" class="d-flex justify-content-center">
                                    {{ $products->links('vendor.pagination.default') }}
                                </nav>
                            </nav>
                        </div>
                    </div>
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
