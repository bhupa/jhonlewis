<table class="table">
    <thead>
    <tr>
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
        @php $totalAmout=0; $totalquantity=0;@endphp
        @foreach($carts->items as $key=>$cart)
            <tr>

                <td>
                    <a href="#">
                        <img src="{{asset('storage/'.$cart['image'])}}" alt="{{$cart['title']}}">
                    </a>
                </td>

                <td><a href="{{url('')}}">{{$cart['title']}}</a></td>
                <td>{{$cart['color']}}</td>
                <td>
                    <div class="cart-increment-btn">
                        <input type="hidden" name="id" id="stock-piece" value="">
                        <button type="button" id="cart-add" class="cart-altera altera acrescimo" data-quantity="{{$cart['total_quantity']}}" data-quantity="{{$cart['piece']}}" data-type="{{$cart['stockId']}}" data-value="{{$cart['piece']}}"><i class="fa fa-plus"></i></button>
                        <input type="number"  name="piece" id="cart-altera-input" min="1" placeholder="0" class="cart-increment-value" data-quantity="{{$cart['piece']}}" data-type="{{$cart['stockId']}}"  class="cart-increment-value"  value="{{$cart['piece']}}">
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
                @php $totalAmout +=  $cart['price'] @endphp
                @php $totalquantity +=  $cart['piece'] @endphp
                <td><a href="{{route('cart.remove',[$key])}}"><i class="fa fa-trash-o"></i></a></td>
            </tr>

        </tbody>

        @endforeach
        <tfoot>
        <tr>
            <th colspan="7">Total Price</th>
            <th colspan="2">£ {{number_format((float)$totalAmout, 2, '.', '')}}</th>

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
