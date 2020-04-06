@extends('frontend.app')
@section('title','Check Out')
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
                                <li aria-current="page" class="breadcrumb-item active">Checkout - Address</li>
                            </ol>
                        </nav>
                    </div>
                    <div id="checkout" class="col-lg-9">
                        <div class="box"  >


                                <h1 id="checkout-title">Checkout - Address</h1>
                                <div class="nav flex-column flex-md-row nav-pills text-center">
                                    <a href="javascript:void(0)" class="nav-link flex-sm-fill text-sm-center active" id="address-bar" >
                                        <i class="fa fa-map-marker"></i>Address
                                    </a>
                                    <a href="javascript:void(0)" class="nav-link flex-sm-fill text-sm-center " id="delivery" >
                                        <i class="fa fa-truck"></i>Delivery Method</a>
                                    <a href="javascript:void(0)" class="nav-link flex-sm-fill text-sm-center " id="payment" >
                                        <i class="fa fa-money"></i>Payment Method</a>
                                    <a href="javascript:void(0)" class="nav-link flex-sm-fill text-sm-center " id="details">
                                        <i class="fa fa-eye"></i>Order Review
                                    </a>
                                </div>
                                <div class="content py-3" id="shipping-form">
                                    {!! Form::open(['route'=>'order.store','method'=>'POST','id'=>'checkout-address']) !!}
                                    <div class="row">
                                        <div class="col-sm-6">
                                            <div class="form-group">
                                                <label for="firstname">Firstname</label>
                                                <input type="text" name="firstname" class="form-control" id="firstname" value="{{$address['firstname']}}">
                                            </div>
                                        </div>
                                        <div class="col-sm-6">
                                            <div class="form-group">
                                                <label for="lastname">Lastname</label>
                                                <input type="text" name="lastname" class="form-control" id="lastname" value="{{$address['firstname']}}">
                                            </div>
                                        </div>
                                    </div>
                                    <!-- /.row-->
                                    <div class="row">
                                        <div class="col-sm-6">
                                            <div class="form-group">
                                                <label for="company">Address</label>
                                                <input type="text" name="address" class="form-control" id="address" value="{{$address['address']}}">
                                            </div>
                                        </div>
                                        <div class="col-sm-6">
                                            <div class="form-group">
                                                <label for="street">Street</label>
                                                <input type="text" name="street" class="form-control" id="street" value="{{$address['street']}}">
                                            </div>
                                        </div>
                                    </div>
                                    <!-- /.row-->
                                    <div class="row">
                                        <div class="col-sm-6">
                                            <div class="form-group">
                                                <label for="phone">Telephone</label>
                                                <input type="text" name="phone" class="form-control" id="phone" value="{{$address['phone']}}">
                                            </div>
                                        </div>
                                        <div class="col-sm-6">
                                            <div class="form-group">
                                                <label for="email">Email</label>
                                                <input type="email" name="email" class="form-control" id="email" value="{{$address['email']}}">
                                            </div>
                                        </div>

                                    </div>

                                    <!-- /.row -->

                                    <!-- /.row-->
                                    <div class="box-footer d-flex justify-content-between"><a href="{{route('cart.index')}}" class="btn btn-outline-secondary"><i class="fa fa-chevron-left"></i>Back to Cart</a>
                                        <button type="submit" id="shipping-address-form" class="btn btn-primary">Continue to Delivery Method<i class="fa fa-chevron-right"></i></button>
                                    </div>
                                    {{--                            </form>--}}
                                    {!! Form::close() !!}
                                </div>

                        </div>
                        <!-- /.box-->
                    </div>
                    <!-- /.col-lg-9-->
                    <div class="col-lg-3">
                        @include('cart.sidebar');
                    </div>
                    <!-- /.col-lg-3-->
                </div>
            </div>
        </div>
    </div>
@endsection
@section('js_script')
    <script type="text/javascript">
        $(document).ready(function () {
            {{--$('#checkout-address').on('submit',function(e){--}}
            {{--    e.preventDefault();--}}

            {{--    var url = '{{route('order.store')}}';--}}

            {{--    var data = $( this ).serialize();--}}
            {{--    $.ajax({--}}
            {{--        type: "POST",--}}
            {{--        url:url,--}}
            {{--        data:data,--}}
            {{--        dataType: 'html',--}}
            {{--        headers: {--}}
            {{--            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')--}}
            {{--        },--}}
            {{--        success:function(shipping){--}}
            {{--        $('#checkout').html(shipping);--}}

            {{--        },--}}
            {{--        error: function (xhr,data) {--}}


            {{--            // $.each(xhr.responseJSON.errors, function (key, value) {--}}
            {{--            //     $('#' + key).css('border','1px solid rgb(243, 78, 15)');--}}
            {{--            //     $('#' + key).attr("placeholder", value);--}}
            {{--            //--}}
            {{--            // });--}}
            {{--        }--}}
            {{--    })--}}
            {{--})--}}

            $('#checkout-address').on('submit', function (event) {
                event.preventDefault();


                var url = '{{route('order.store')}}'

                $.ajax({
                    type: 'POST',
                    url: url, headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    },

                    data: $('#checkout-address').serialize(),
                    success: function (shipping) {
                        $('#shipping-form').html(shipping);
                        $('#checkout .nav a').removeClass('active');
                    $('#delivery').addClass('active');
                    $('#checkout-title').text('Checkout - Delivery method');
                    },
                    error: function (xhr, data) {
                        console.log(xhr);
                        $.each(xhr.responseJSON.errors, function (key, value) {
                            $('#' + key).css('border', '1px solid rgb(243, 78, 15)');
                            $('#' + key).attr("placeholder", value);

                        });
                    }
                })

            })
            $('#shipping-form ').on('click','.back-address', function (event) {
                event.preventDefault();

                var url = '{{route('back-address')}}'

                $.ajax({
                    type: 'POST',
                    url: url,
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    },

                    data: $('#delivery-form').serialize(),
                    success: function (delivery) {
                        $('#shipping-form').html(delivery);
                        $('#checkout .nav a').removeClass('active');
                        $('#address-bar').addClass('active');
                        $('#checkout-title').text('Checkout - Address');
                    },
                    error: function (xhr, data) {
                        console.log(xhr);
                        $.each(xhr.responseJSON.errors, function (key, value) {
                            $('.check-box').text('Please select shipping address');

                            $('.check-box').css('color','red');
                        });
                    }
                })

            })
            $('#shipping-form ').on('submit','#delivery-form', function (event) {
                event.preventDefault();
                var url = '{{route('delivery')}}'

                $.ajax({
                    type: 'POST',
                    url: url,
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    },

                    data: $('#delivery-form').serialize(),
                    success: function (delivery) {
                        $('#shipping-form').html(delivery);
                        $('#checkout .nav a').removeClass('active');
                        $('#payment').addClass('active');
                        $('#checkout-title').text('Checkout - Payment method');
                    },
                    error: function (xhr, data) {
                        console.log(xhr);
                        $.each(xhr.responseJSON.errors, function (key, value) {
                            $('.check-box').text('Please select shipping address');

                            $('.check-box').css('color','red');
                        });
                    }
                })

            })

            $('#shipping-form ').on('click','.back-to-shipping', function (event) {
                event.preventDefault();

                var url = '{{route('backDelivery')}}'

                $.ajax({
                    type: 'POST',
                    url: url,
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    },

                    data: $('#delivery-form').serialize(),
                    success: function (delivery) {
                        $('#shipping-form').html(delivery);
                        $('#checkout .nav a').removeClass('active');
                        $('#delivery').addClass('active');
                        $('#checkout-title').text('Checkout - Delivery method');
                    },
                    error: function (xhr, data) {
                        console.log(xhr);
                        $.each(xhr.responseJSON.errors, function (key, value) {
                            $('.check-box').text('Please select shipping address');

                            $('.check-box').css('color','red');
                        });
                    }
                })

            })

            $('#shipping-form ').on('click','.back-payment', function (event) {
                event.preventDefault();

                var url = '{{route('backPayment')}}'

                $.ajax({
                    type: 'POST',
                    url: url,
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    },

                    data: $('#delivery-form').serialize(),
                    success: function (delivery) {
                        $('#shipping-form').html(delivery);
                        $('#checkout .nav a').removeClass('active');
                        $('#payment').addClass('active');
                        $('#checkout-title').text('Checkout - Payment method');
                    },
                    error: function (xhr, data) {
                        console.log(xhr);
                        $.each(xhr.responseJSON.errors, function (key, value) {
                            $('.check-box').text('Please select shipping address');

                            $('.check-box').css('color','red');
                        });
                    }
                })

            })

            $('#shipping-form').on('click','#delivery-form .check',function() {
                $('#delivery-form .check').not(this).prop('checked', false);
            });
            $('#shipping-form ').on('click','#shipping-order-review', function (event) {
                event.preventDefault();

                var url = '{{route('payment')}}';

                $.ajax({
                    type: 'post',
                    url: url,
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    },

                    data: $('#delivery-form').serialize(),
                    success: function (overview) {
                        $('#shipping-form').html(overview);
                        $('#checkout .nav a').removeClass('active');
                        $('#details').addClass('active');
                        $('#checkout-title').text('Checkout - Order review;');
                    },
                    error: function (xhr, data) {
                        console.log(xhr);
                        $.each(xhr.responseJSON.errors, function (key, value) {
                            $('.check-box').text('Please select shipping address');

                            $('.check-box').css('color','red');
                        });
                    }
                })

            })

        });



    </script>
@endsection
