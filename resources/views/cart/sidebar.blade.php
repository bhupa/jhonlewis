<div id="order-summary" class="card">
    <div class="card-header">
        <h3 class="mt-4 mb-4">Order summary</h3>
    </div>
    <div class="card-body">
        <p class="text-muted">Shipping and additional costs are calculated based on the values you have entered.</p>
        <div class="table-responsive">
            <table class="table">
                <tbody>
                <tr>
                    <td>Total Item</td>
                    <th>
                        @php $cart = Session::get('cart') @endphp
                        @if(!empty($cart))
                            {{$cart->totalItem}}
                        @endif
                    </th>
                </tr>
                <tr>
                    <td>Total Piece</td>
                    <th>
                        @if(!empty($cart))
                            {{$cart->totalPiece}}
                        @endif
                    </th>
                </tr>
                <tr >
                    <td>Total Amount</td>
                    <th>
                        @if(!empty($cart))
                            £ {{number_format((float)$cart->totalPrice, 2, '.', '')}}
                        @endif
                    </th>
                </tr>
                </tbody>
            </table>
        </div>
    </div>
</div>
