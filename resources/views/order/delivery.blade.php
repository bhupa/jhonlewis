{!! Form::open(['route'=>'delivery','method'=>'POST','id'=>'delivery-form']) !!}
<div class="row">
    <div class="col-sm-6">
        <div class="box shipping-method">

            <h4>Europe</h4>

            <p>Get it right on next day - fastest option possible.</p>

            <div class="box-footer text-center">

                <input type="checkbox" name="shipping" @if(Session::get('shipping') == 'europe') checked @endif value="europe" class="check">
                <spna class="check-box"></spna>
            </div>
        </div>
    </div>
    <div class="col-sm-6">
        <div class="box shipping-method">

            <h4>UK</h4>

            <p>Get it right on next day - fastest option possible.</p>

            <div class="box-footer text-center">

                <input type="checkbox" name="shipping" value="uk" @if(Session::get('shipping') == 'uk') checked @endif class="check">
                <spna class="check-box"></spna>
            </div>
        </div>
    </div>

    <div class="col-sm-6">
        <div class="box shipping-method">

            <h4>International</h4>

            <p>Get it right on next day - fastest option possible.</p>

            <div class="box-footer text-center">

                <input type="checkbox" name="shipping" value="internatioal" @if(Session::get('shipping') == 'international') checked @endif class="check">
                <spna class="check-box"></spna>
            </div>
        </div>
    </div>
</div>
<div class="box-footer d-flex justify-content-between"><a href="javascript:void(0)" class="btn btn-outline-secondary back-address">Back to Address</a>
    <button type="submit" id="shipping-delivery-form" class="btn btn-primary">Continue to Delivery Method<i class="fa fa-chevron-right"></i></button>
</div>
{{--                            </form>--}}
{!! Form::close() !!}
