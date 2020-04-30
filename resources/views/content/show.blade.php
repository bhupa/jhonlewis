@extends('frontend.app')
@section('title', $content->title)
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
                                <li aria-current="page" class="breadcrumb-item active">{{$content->title}}</li>
                            </ol>
                        </nav>
                    </div>
                    <div class="col-lg-4">
                            @include('product.lists')
                    </div>
                    <div class="col-lg-8">
                        <div class="service-lists-content">
                            <h4>{{$content->title}}</h4>
                            <hr>
                            <img src="{{asset('storage/'.$content->image)}}" alt="{{$content->title}}">
                            {!! $content->description !!}

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
