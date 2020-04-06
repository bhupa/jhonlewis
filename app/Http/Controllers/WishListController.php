<?php

namespace App\Http\Controllers;

use App\Repositories\ProductRepository;
use App\Repositories\WishListRepository;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class WishListController extends Controller
{
    protected $wishlist,$product;

    public  function __construct(WishListRepository $wishlist,ProductRepository $product)
    {
        $this->wishlist =$wishlist;
        $this->product = $product;
    }

    public function index(){
        $wishlists =$this->wishlist->where('user_id',Auth::user()->id)->orderBy('created_at','desc')->get();
        return view('wishlists.index')->withWishlists($wishlists);
    }
    public function store(Request $request){
        $data = $request->except('__token');
        $data['product_id'] = $request->id;
        $data['user_id'] = Auth::user()->id;
        $product = $this->product->find($request->id);
        if(!empty($product->id)){
            $this->wishlist->firstOrCreate([
                'product_id'=>$product->id,
                'user_id'=>Auth::user()->id
            ]);
            return response()->json(['success'=>true],200);
        }

            return response()->json(['errors'=>true],422);

    }
    public function destroy($id)
    {
        $wishlists = $this->wishlist->find($id);

        if($this->wishlist->destroy($wishlists->id)){

            $message = 'Wishlist delete successfully';
            return response()->json(['status'=>'ok','message'=>$message],200);

        }
        return response()->json(['status'=>'ok','message'=>'Wishlist cannot be delete'],422);
    }
}
