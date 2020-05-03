<?php

namespace App\Http\Controllers;

use App\Repositories\ContentRepository;
use App\Repositories\ProductRepository;
use Illuminate\Http\Request;

class ShopController extends Controller
{
    protected $product,$content;

    public  function __construct(ProductRepository $product,ContentRepository $content)
    {
        $this->product = $product;
        $this->content = $content;
    }


    public  function index() {
        $products = $this->product->where('is_active','1')->orderBy('created_at','desc')->paginate(20);

        return view('shop.index')->withProducts($products);
    }
    public function getSingle(){
        return view('shop.show');
    }
}
