<?php

namespace App\Http\Controllers;

use App\Http\Requests\Frontend\Payment\AddressStoreRequest;
use App\Http\Requests\Frontend\Payment\DeliveryStoreRequest;
use App\Http\Requests\Frontend\Payment\StoreRequest;
use App\Models\Cart;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class OrderController extends Controller
{


    public function index(){

        $address = Session::get('address');
        $oldcart = Session::get('cart');
        $carts = new Cart($oldcart);
        return view('order.index')->withCarts($carts)->withAddress($address);
    }

    public function store(StoreRequest $request){

       $data = $request->except('_token');
        $address = $request->session()->put('address',
            ['firstname'=>$request->firstname,
                'lastname'=>$request->lastname,
                'address'=>$request->address,
                'street'=>$request->street,
                'phone'=>$request->phone,
                'email'=>$request->email,
                'zip_code'=>$request->zip_code,
                'postal_code'=>$request->postal_code
            ]);
        $shipping = Session::get('shipping');

        return view('order.delivery')->withShipping($shipping);


    }
    public function getDelivery(DeliveryStoreRequest $request){

        $data = $request->except('_token');
        $delivery = $request->session()->put('shipping',$request->shipping);
        return view('order.payment');
    }
    public function getPayment(){
        $oldcart = Session::get('cart');
        $carts = new Cart($oldcart);
        $shipping = Session::get('shipping');

        return view('order.detail')->withCarts($carts)->withShipping($shipping);
    }

    public function getBackPayment(Request $request){

        return view('order.payment');
    }
    public function getBackDelivery(Request $request){

        return view('order.delivery');
    }
    public function getBackAddress(){

        $address = Session::get('address');

        return view('order.address')->withAddress($address);

    }
}
