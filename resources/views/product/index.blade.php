@extends('frontend.app')
@section('title','Product Lists')
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
                                <li class="breadcrumb-item"><a href="#">Product-Lists</a></li>

                            </ol>
                        </nav>
                    </div>



                    <!-- /.col-md-9-->
                </div>
                <div class="service-lists-content">
                    <h4>Product-Lists</h4>
                    <hr>
                   <ul class="product-type-lists">
                       <li>
                           <div class="top-level">
                               <a href="javascript:void(0)" data-toggle="collapse" data-target="#eye-care">Eye Care
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

            $('#add-whishlist').on('click',function(){
                var id = $(this).attr('data-type');
                $('.show-box').css('display','block');


                $.ajax({
                    type:'Post',
                    url:'{{route('wishlist.store')}}',
                    data:{id:id},
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    },
                    dataType: 'json',
                    success: function (carts) {
                        setTimeout(function(){
                            $(".show-box").fadeOut(3000);
                        },3000);
                        // $('#cart-success').modal('show');
                    },
                    errors:function(xhr){

                        setTimeout(function(){
                            $(".show-box").fadeOut(3000);
                            $("#error-modal").modal('show');

                        },5000);
                    }
                });
            })
        });
    </script>
@endsection
