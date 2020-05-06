@extends('frontend.app')
@section('title',$brand->title)
@section('css_script')
@endsection
@section('content')
    <div id="all">
        <div id="content">
            <div class="container">
                <div class="service-lists-content">
                    <h4>{{$brand->name}}</h4>
                    <hr>
                    <div class="row" id="frames-brand">
                        <div class="col-lg-6">
                            <div class="frame-wrapper-title brand-product-lists">
                                <img src="{{asset('storage/'.$brand->image)}}" alt="{{$brand->name}}">
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="frame-wrapper">
                                {!! $brand->description !!}
                            </div>
                        </div>
                    </div>


                        <div class="row products">

                            @foreach($products as $product)
                                <div class="col-lg-3 col-md-6">
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
                        <div class="pages" style="margin-bottom: 100px;">
                            <nav aria-label="Page navigation example" class="d-flex justify-content-center">
                                <nav aria-label="Page navigation example" class="d-flex justify-content-center">
                                    {{ $products->links('vendor.pagination.default') }}
                                </nav>
                            </nav>
                        </div>
                    </div>

                <!-- /.col-lg-9-->
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
