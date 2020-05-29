<?php

namespace App\Http\Controllers;

use App\Repositories\BrandRepository;
use App\Repositories\ProductRepository;
use Illuminate\Http\Request;

class EyewearController extends Controller
{
    protected $brand, $product;

    public function __construct(BrandRepository $brand, ProductRepository $product)
    {
        $this->brand = $brand;
        $this->product = $product;
    }

    public function show($request,$slug){

        $brand = $this->brand->where('slug',$request)->first();
//        $products = $this->products->where('is_active','1')->orderBy('created_at','desc')->pagination('20');

        $products = $this->product->where('is_active','1')->where('brand_id',$brand->id)->where('gender',$slug)->orderBy('created_at','desc')->paginate(20);


        return  view('eye-wear.show')->withBrand($brand)->withProducts($products);
    }
}
