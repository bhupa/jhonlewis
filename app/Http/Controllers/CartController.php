<?php

namespace App\Http\Controllers;

use App\Http\Requests\Frontend\Cart\CartStoreRequest;
use App\Models\Cart;
use App\Repositories\ProductRepository;
use App\Repositories\StockRepository;
use Illuminate\Http\Request;
use Illuminate\Filesystem\Cache;
use Illuminate\Support\Facades\Session;

class CartController extends Controller
{
    protected  $product,$stock;

    public function __construct(ProductRepository $product,StockRepository $stock)
    {
        $this->product = $product;
        $this->stock = $stock;
    }

    public function index() {
        $oldcart = Session::get('cart');
        $carts = new Cart($oldcart);

        return view('cart.index')->withCarts($carts);
    }

    public function store(CartStoreRequest $request){

        $stock = $this->stock->find($request->stock_id);
        $product = $this->product->find($request->product_id);
        if ($request->ajax()) {

            $oldCart = Session::has('cart') ? Session::get('cart') : null;
            $cart = new Cart($oldCart);
            $peice = $request->piece;
            $cart->add($stock,$product, $peice);
            $products = Session::put('cart', $cart);
            $oldcart = Session::get('cart');
            $carts = new Cart($oldcart);
            return view('.cart.list')->withCarts($carts);
        }



        $oldCart = Session::has('cart') ? Session::get('cart') : null;
        $cart = new Cart($oldCart);
        $peice = $request->piece;
        $cart->add($stock,$product, $peice);
        $products = Session::put('cart', $cart);
        $oldcart = Session::get('cart');
        $cart = new Cart($oldcart);
        return redirect()->to('/product/'.$product->slug)->with('success','Product added to cart Successfully!'.'<br>'.'You can buy more product');
    }
    public function add(CartStoreRequest $request){

        $stock = $this->stock->find($request->stock_id);
        $product = $this->product->find($stock->product_id);

            $oldCart = Session::has('cart') ? Session::get('cart') : null;
            $cart = new Cart($oldCart);
            $peice = $request->piece;
            $cart->add($stock,$product, $peice);
            $products = Session::put('cart', $cart);
            $oldcart = Session::get('cart');
            $carts = new Cart($oldcart);
            return view('.cart.list')->withCarts($carts);



    }
    public function delete(Request $request){
        Session::forget('cart');
        $oldCart = Session::has('cart') ? Session::get('cart') : null;
        $carts = new Cart($oldCart);
        return view('cart.index')->withCarts($carts)->with('cart-message','Cart singel record has been flush');

    }
    public function remove($id){

        $data = Session::get('cart');
        unset($data->items[$id]);
        $oldcart = Session::get('cart');
        $carts = new Cart($oldcart);

        return view('cart.index')->withCarts($carts)->with('cart-message','Cart singel record has been flush');

    }

}
