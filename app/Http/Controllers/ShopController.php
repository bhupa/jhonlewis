<?php

namespace App\Http\Controllers;

use App\Repositories\ProductRepository;
use Illuminate\Http\Request;

class ShopController extends Controller
{
    protected $product;

    public  function __construct(ProductRepository $product)
    {
        $this->product = $product;
    }


    public  function index() {
        $products = $this->product->where('is_active','1')->orderBy('created_at','desc')->paginate(20);
        return view('shop.index')->withProducts($products);
    }
    public function getSingle(){
        return view('shop.show');
    }
}
