
    <div class="table-responsive">
        <table class="table">
            <thead>
            <tr>
                <th>No.</th>
                <th colspan="2">Product</th>
                <th>Color</th>
                <th>Quantity</th>
                {{--                                                <th>Discount Price</th>--}}
                <th colspan="2">Total</th>
            </tr>
            </thead>

            @if(!empty(Session::get('cart')))
                <tbody>
                @php $totalAmout=0; $totalquantity=0;@endphp
                @foreach($carts->items as $key=>$cart)
                    <tr>
                        <td>{{$key}}</td>
                        <td>
                            <a href="#">
                                <img src="{{asset('storage/'.$cart['image'])}}" alt="{{$cart['title']}}">
                            </a>
                        </td>

                        <td><a href="{{url('')}}">{{$cart['title']}}</a></td>
                        <td>{{$cart['color']}}</td>
                        <td>
                            <div class="cart-increment-btn">
                                {{$cart['piece']}}
                            </div>
                        </td>

                        {{--                                                        <td> @if(!empty($cart['discount_price']))  £{{$cart['discount_price']}} @endif</td>--}}
                        <td>£ {{$cart['price']}}</td>
                        @php $totalAmout +=  $cart['price'] @endphp
                        @php $totalquantity +=  $cart['piece'] @endphp

                    </tr>

                </tbody>

                @endforeach
                <tfoot>

                <tr>
                    <th colspan="5">Total Items</th>
                    <th colspan="2">{{$carts->totalItem}}</th>

                </tr>
                <tr>
                    <th colspan="5">Total Piece</th>
                    <th colspan="2">{{$totalquantity}}</th>

                </tr>
                <tr>
                    <th colspan="5">Shipping Charge</th>
                    <th colspan="2">
                        <span class="shipping-charge">
                            @if($shipping =='uk')
                                Free
                                @elseif($shipping =='europe')
                                £ 7.50
                                @else
                                £ 25
                            @endif
                        </span>
                    </th>

                </tr>
                <tr>
                    <th colspan="5">Total Price</th>
                    <th colspan="2">
                        @if($shipping =='uk')
                            {{number_format((float)$totalAmout, 2, '.', '')}}
                        @elseif($shipping =='europe')
                            £ {{number_format((float)$totalAmout, 2, '.', '') + 7.50}}
                        @else
                            £ {{number_format((float)$totalAmout, 2, '.', '') + 25}}
                        @endif
                        </th>

                </tr>
                </tfoot>
            @else

                <tr>
                    <td>Product is not add to cart yet.</td>
                </tr>
            @endif

        </table>

    </div>

    <!-- /.table-responsive -->

<!-- /.content -->

    <div class="box-footer d-flex justify-content-between"><a href="javascript:void(0)" class="btn btn-outline-secondary back-payment">Back to Payment</a>
        {!! Form::open(['route'=>'paypal.store','method'=>'post']) !!}
        @if($shipping =='uk')
            <input type="hidden" name="amount"  value="{{number_format((float)$totalAmout, 2, '.', '')}}">

        @elseif($shipping =='europe')

            <input type="hidden" name="amount"  value="{{number_format((float)$totalAmout, 2, '.', '') + 7.50}}">
        @else

            <input type="hidden" name="amount"  value="{{number_format((float)$totalAmout, 2, '.', '') + 25}}">
            @endif

        <button type="submit" id="shipping-delivery-form" class="btn btn-primary">Place Order<i class="fa fa-chevron-right"></i></button>
        {!! Form::close(); !!}
    </div>

