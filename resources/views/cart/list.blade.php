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
