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
            <input type="text" name="lastname" class="form-control" id="lastname" value="{{$address['lastname']}}">
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
