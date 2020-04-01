@extends('frontend.app')
@section('title',$product->title)
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
                                <li class="breadcrumb-item"><a href="#">Product</a></li>
                                <li aria-current="page" class="breadcrumb-item active">{{$product->glasses->name}}</li>
                            </ol>
                        </nav>
                    </div>
                    <div class="col-lg-3 order-2 order-lg-1">
                        <!--
                        *** MENUS AND FILTERS ***
                        _________________________________________________________
                        -->
                        <div class="card sidebar-menu mb-4">
                            <div class="card-header">
                                <h3 class="h4 card-title">Categories</h3>
                            </div>
                            <div class="card-body">
                                <ul class="nav nav-pills flex-column category-menu">
                                    <li><a href="category.html" class="nav-link">Men <span class="badge badge-secondary">42</span></a>
                                        <ul class="list-unstyled">
                                            <li><a href="category.html" class="nav-link">T-shirts</a></li>
                                            <li><a href="category.html" class="nav-link">Shirts</a></li>
                                            <li><a href="category.html" class="nav-link">Pants</a></li>
                                            <li><a href="category.html" class="nav-link">Accessories</a></li>
                                        </ul>
                                    </li>
                                    <li><a href="category.html" class="nav-link active">Ladies  <span class="badge badge-light">123</span></a>
                                        <ul class="list-unstyled">
                                            <li><a href="category.html" class="nav-link">T-shirts</a></li>
                                            <li><a href="category.html" class="nav-link">Skirts</a></li>
                                            <li><a href="category.html" class="nav-link">Pants</a></li>
                                            <li><a href="category.html" class="nav-link">Accessories</a></li>
                                        </ul>
                                    </li>
                                    <li><a href="category.html" class="nav-link">Kids  <span class="badge badge-secondary">11</span></a>
                                        <ul class="list-unstyled">
                                            <li><a href="category.html" class="nav-link">T-shirts</a></li>
                                            <li><a href="category.html" class="nav-link">Skirts</a></li>
                                            <li><a href="category.html" class="nav-link">Pants</a></li>
                                            <li><a href="category.html" class="nav-link">Accessories</a></li>
                                        </ul>
                                    </li>
                                </ul>
                            </div>
                        </div>
                        <div class="card sidebar-menu mb-4">
                            <div class="card-header">
                                <h3 class="h4 card-title">Brands <a href="#" class="btn btn-sm btn-danger pull-right"><i class="fa fa-times-circle"></i> Clear</a></h3>
                            </div>
                            <div class="card-body">
                                <form>
                                    <div class="form-group">
                                        <div class="checkbox">
                                            <label>
                                                <input type="checkbox"> Armani  (10)
                                            </label>
                                        </div>
                                        <div class="checkbox">
                                            <label>
                                                <input type="checkbox"> Versace  (12)
                                            </label>
                                        </div>
                                        <div class="checkbox">
                                            <label>
                                                <input type="checkbox"> Carlo Bruni  (15)
                                            </label>
                                        </div>
                                        <div class="checkbox">
                                            <label>
                                                <input type="checkbox"> Jack Honey  (14)
                                            </label>
                                        </div>
                                    </div>
                                    <button class="btn btn-default btn-sm btn-primary"><i class="fa fa-pencil"></i> Apply</button>
                                </form>
                            </div>
                        </div>
                        <div class="card sidebar-menu mb-4">
                            <div class="card-header">
                                <h3 class="h4 card-title">Colours <a href="#" class="btn btn-sm btn-danger pull-right"><i class="fa fa-times-circle"></i> Clear</a></h3>
                            </div>
                            <div class="card-body">
                                <form>
                                    <div class="form-group">
                                        <div class="checkbox">
                                            <label>
                                                <input type="checkbox"><span class="colour white"></span> White (14)
                                            </label>
                                        </div>
                                        <div class="checkbox">
                                            <label>
                                                <input type="checkbox"><span class="colour blue"></span> Blue (10)
                                            </label>
                                        </div>
                                        <div class="checkbox">
                                            <label>
                                                <input type="checkbox"><span class="colour green"></span>  Green (20)
                                            </label>
                                        </div>
                                        <div class="checkbox">
                                            <label>
                                                <input type="checkbox"><span class="colour yellow"></span>  Yellow (13)
                                            </label>
                                        </div>
                                        <div class="checkbox">
                                            <label>
                                                <input type="checkbox"><span class="colour red"></span>  Red (10)
                                            </label>
                                        </div>
                                    </div>
                                    <button class="btn btn-default btn-sm btn-primary"><i class="fa fa-pencil"></i> Apply</button>
                                </form>
                            </div>
                        </div>
                        <!-- *** MENUS AND FILTERS END ***-->
                        <div class="banner"><a href="#"><img src="https://d19m59y37dris4.cloudfront.net/obaju/2-1-1/img/banner.jpg" alt="sales 2014" class="img-fluid"></a></div>
                    </div>
                    <div class="col-lg-9 order-1 order-lg-2">
                        <div id="productMain" class="row">
                            <div class="col-md-6">
                                <div data-slider-id="1" class="product-details-wrapper">

                                   <div class="product-wrapper-content">
                                       <div class="product-image-wrapper">
                                           <img src="{{asset('storage/'.$product->image)}}" alt="{{$product->title}}" class="img-fluid">
                                       </div>
                                       <div class="product-wrapper-content">
                                           <ul id="prodcut-details-lists-frontend">
                                               <li><span>Types:</span>{{$product->glasses->name}}</li>
                                               <li><span>Brand:</span>{{$product->brand->name}}</li>
                                               <li><span>Frame:</span>{{$product->frame->name}}</li>
                                               <li><span>Frame Category:</span>{{$product->category->name}}</li>
                                               <li><span>Lense:</span>{{$product->lenses->name}}</li>
                                               <li><span>Size:</span>{{$product->size}}</li>
                                               <li><span>Shape:</span>{{$product->shape}}</li>
                                               <li><span>Style:</span>{{$product->style}}</li>
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
                                </div>
                                @if(!empty($product->discount_id))
                                    <div class="ribbon sale discount-tage">
                                        <div class="theribbon" style="width: 162px;">off {{$product->discount->percentage}}%</div>
                                        <div class="ribbon-background"></div>
                                    </div>
                            @endif
                                <!-- /.ribbon-->
                                <div class="ribbon new">
                                    <div class="theribbon">NEW</div>
                                    <div class="ribbon-background"></div>
                                </div>
                                <!-- /.ribbon-->
                            </div>
                            <div class="col-md-6">
                                <div class="box">
                                    <h1 class="text-center">{{$product->title}}</h1>
                                    <p class="goToDescription"><a href="#details" class="scroll-to">Scroll to product details, material &amp; care and sizing</a></p>
{{--                                    <p class="price">£&nbsp; {{$product->price}}</p>--}}
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

                                    {!! Form::open(['route'=>'cart.store','method'=>'post','id'=>'add-cart']) !!}
                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label for="firstname">Select Color</label>
                                                <select name="stock_id" id="stock" class="form-control">
                                                    <option value="0"> Choose from stock</option>
                                                    @foreach($product->stocks as $stock)

                                                        <option value="{{$stock->id}}" data-type="{{$stock->piece}}">{{$stock->color->name}}</option>
                                                    @endforeach
                                                </select>
                                                @if ($errors->has('stock_id'))
                                                    <span class="text-danger">{{ $errors->first('stock_id') }}</span>
                                                @endif
                                            </div>
                                        </div>
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label for="lastname">Total Quantity : <span id="stock-quantity"></span></label>
                                                <div class="cart-increment-btn">
                                                    <input type="hidden" name="id" id="stock-piece" value="">
                                                    <button type="button" class="altera acrescimo"><i class="fa fa-plus"></i></button>
                                                    <input type="number"  name="piece" id="stepper-input" min="1" placeholder="0" class="cart-increment-value"  value="1">
                                                    <button type="button" class="altera decrescimo"><i class="fa fa-minus"></i></button>
                                                    @if ($errors->has('piece'))
                                                        <span class="text-danger">{{ $errors->first('piece') }}</span>
                                                    @endif
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <p class="text-center buttons">
                                    <button type="submit" class="btn btn-primary">
                                        <i class="fa fa-shopping-cart">
                                        </i> Add to cart
                                    </button>
                                    </p>
                                    {{ Form::hidden('product_id',$product->id) }}
                                    {{Form::close()}}
                                </div>
                                <div data-slider-id="1" class="owl-thumbs">
                                    <ul class="product-lists">
                                        <h3>Colors</h3>
                                        @foreach($product->stocks as $stock)
                                        <li><a href="">{{$stock->color->name}}</a></li>
                                        @endforeach
                                    </ul>

                                </div>
                            </div>
                        </div>
                        <div id="details" class="box">
                            <p></p>
                            <h4>Product details</h4>
                           <p>
                               {!! $product->description !!}
                           </p>
                            <div class="social">
                                <h4>Show it to your friends</h4>
                                <p><a href="#" class="external facebook"><i class="fa fa-facebook"></i></a><a href="#" class="external gplus"><i class="fa fa-google-plus"></i></a><a href="#" class="external twitter"><i class="fa fa-twitter"></i></a><a href="#" class="email"><i class="fa fa-envelope"></i></a></p>
                            </div>
                        </div>
                        <div class="row same-height-row">
                            <div class="col-md-3 col-sm-6">
                                <div class="box same-height">
                                    <h3>You may also like these products</h3>
                                </div>
                            </div>
                            <div class="col-md-3 col-sm-6">
                                <div class="product same-height">
                                    <div class="flip-container">
                                        <div class="flipper">
                                            <div class="front"><a href="detail.html"><img src="https://d19m59y37dris4.cloudfront.net/obaju/2-1-1/img/product2.jpg" alt="" class="img-fluid"></a></div>
                                            <div class="back"><a href="detail.html"><img src="https://d19m59y37dris4.cloudfront.net/obaju/2-1-1/img/product2_2.jpg" alt="" class="img-fluid"></a></div>
                                        </div>
                                    </div><a href="detail.html" class="invisible"><img src="https://d19m59y37dris4.cloudfront.net/obaju/2-1-1/img/product2.jpg" alt="" class="img-fluid"></a>
                                    <div class="text">
                                        <h3>Fur coat</h3>
                                        <p class="price">$143</p>
                                    </div>
                                </div>
                                <!-- /.product-->
                            </div>
                            <div class="col-md-3 col-sm-6">
                                <div class="product same-height">
                                    <div class="flip-container">
                                        <div class="flipper">
                                            <div class="front"><a href="detail.html"><img src="https://d19m59y37dris4.cloudfront.net/obaju/2-1-1/img/product1.jpg" alt="" class="img-fluid"></a></div>
                                            <div class="back"><a href="detail.html"><img src="https://d19m59y37dris4.cloudfront.net/obaju/2-1-1/img/product1_2.jpg" alt="" class="img-fluid"></a></div>
                                        </div>
                                    </div><a href="detail.html" class="invisible"><img src="https://d19m59y37dris4.cloudfront.net/obaju/2-1-1/img/product1.jpg" alt="" class="img-fluid"></a>
                                    <div class="text">
                                        <h3>Fur coat</h3>
                                        <p class="price">$143</p>
                                    </div>
                                </div>
                                <!-- /.product-->
                            </div>
                            <div class="col-md-3 col-sm-6">
                                <div class="product same-height">
                                    <div class="flip-container">
                                        <div class="flipper">
                                            <div class="front"><a href="detail.html"><img src="https://d19m59y37dris4.cloudfront.net/obaju/2-1-1/img/product3.jpg" alt="" class="img-fluid"></a></div>
                                            <div class="back"><a href="detail.html"><img src="https://d19m59y37dris4.cloudfront.net/obaju/2-1-1/img/product3_2.jpg" alt="" class="img-fluid"></a></div>
                                        </div>
                                    </div><a href="detail.html" class="invisible"><img src="https://d19m59y37dris4.cloudfront.net/obaju/2-1-1/img/product3.jpg" alt="" class="img-fluid"></a>
                                    <div class="text">
                                        <h3>Fur coat</h3>
                                        <p class="price">$143</p>
                                    </div>
                                </div>
                                <!-- /.product-->
                            </div>
                        </div>
                        <div class="row same-height-row">
                            <div class="col-md-3 col-sm-6">
                                <div class="box same-height">
                                    <h3>Products viewed recently</h3>
                                </div>
                            </div>
                            <div class="col-md-3 col-sm-6">
                                <div class="product same-height">
                                    <div class="flip-container">
                                        <div class="flipper">
                                            <div class="front"><a href="detail.html"><img src="https://d19m59y37dris4.cloudfront.net/obaju/2-1-1/img/product2.jpg" alt="" class="img-fluid"></a></div>
                                            <div class="back"><a href="detail.html"><img src="https://d19m59y37dris4.cloudfront.net/obaju/2-1-1/img/product2_2.jpg" alt="" class="img-fluid"></a></div>
                                        </div>
                                    </div><a href="detail.html" class="invisible"><img src="https://d19m59y37dris4.cloudfront.net/obaju/2-1-1/img/product2.jpg" alt="" class="img-fluid"></a>
                                    <div class="text">
                                        <h3>Fur coat</h3>
                                        <p class="price">$143</p>
                                    </div>
                                </div>
                                <!-- /.product-->
                            </div>
                            <div class="col-md-3 col-sm-6">
                                <div class="product same-height">
                                    <div class="flip-container">
                                        <div class="flipper">
                                            <div class="front"><a href="detail.html"><img src="https://d19m59y37dris4.cloudfront.net/obaju/2-1-1/img/product1.jpg" alt="" class="img-fluid"></a></div>
                                            <div class="back"><a href="detail.html"><img src="https://d19m59y37dris4.cloudfront.net/obaju/2-1-1/img/product1_2.jpg" alt="" class="img-fluid"></a></div>
                                        </div>
                                    </div><a href="detail.html" class="invisible"><img src="https://d19m59y37dris4.cloudfront.net/obaju/2-1-1/img/product1.jpg" alt="" class="img-fluid"></a>
                                    <div class="text">
                                        <h3>Fur coat</h3>
                                        <p class="price">$143</p>
                                    </div>
                                </div>
                                <!-- /.product-->
                            </div>
                            <div class="col-md-3 col-sm-6">
                                <div class="product same-height">
                                    <div class="flip-container">
                                        <div class="flipper">
                                            <div class="front"><a href="detail.html"><img src="https://d19m59y37dris4.cloudfront.net/obaju/2-1-1/img/product3.jpg" alt="" class="img-fluid"></a></div>
                                            <div class="back"><a href="detail.html"><img src="https://d19m59y37dris4.cloudfront.net/obaju/2-1-1/img/product3_2.jpg" alt="" class="img-fluid"></a></div>
                                        </div>
                                    </div><a href="detail.html" class="invisible"><img src="https://d19m59y37dris4.cloudfront.net/obaju/2-1-1/img/product3.jpg" alt="" class="img-fluid"></a>
                                    <div class="text">
                                        <h3>Fur coat</h3>
                                        <p class="price">$143</p>
                                    </div>
                                </div>
                                <!-- /.product-->
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
        $('document').ready(function(){
           $('#stock').on('change',function(){
               var quantity = $('#stock option:selected').attr('data-type');
               $('#stock-quantity').text(quantity);
               $('#stock-piece').val(quantity);
           })
            current = 1;
            $('#add-cart ').on('click','.altera',function(event) {

                event.stopImmediatePropagation();

                var quantity =  $('#stock-piece').val();
                var data =  $('#stepper-input').val();


                if (data < parseInt(quantity)) {

                    if ($(this).hasClass('acrescimo')) {
                        var value =Number(data)+1;
                        $('.cart-increment-value').val(value);
                        $('#cart-submit').removeAttr("disabled");
                        $('.decrescimo').removeAttr("disabled");
                        $('.cart-increment-value').css('border','1px solid black');


                    }
                }
                if (data > 0){
                    if ($(this).hasClass('decrescimo')) {
                        if(data >1){
                            var value =Number(data)-1;
                            $('.cart-increment-value').val(value);
                        }else{
                            alert('Select the piece is lower than default value ');
                            $('.cart-increment-value').css('border','1px solid red');
                            $('.decrescimo').prop("disabled", true);
                        }


                    }
                }

            });
            $(window).on('load', function() {
                var quantity = $('#stock option:selected').attr('data-type');
                $('#stock-quantity').text(quantity);
                $('#stock-piece').val(quantity);
            })


        });
    </script>
@endsection
