<?php

namespace App\Http\Controllers;

use App\Repositories\ProductRepository;
use Illuminate\Http\Request;

class ProductController extends Controller
{

    protected  $product;

    public  function __construct(ProductRepository $product)
    {
        $this->product = $product;
    }

    public function show($slug){
        $product = $this->product->where('slug',$slug)->first();
        return view('product.show')->withProduct($product);
    }
}
