<?php

namespace App\Http\Controllers;

use App\Repositories\BrandRepository;
use App\Repositories\ProductRepository;
use Illuminate\Http\Request;

class BrandController extends Controller
{
    protected $brand,$products;

    public function __construct(BrandRepository $brand,ProductRepository $products)
    {
        $this->brand = $brand;
        $this->products = $products;
    }

    public function show($slug){

        $brand = $this->brand->where('slug',$slug)->first();
        $products = $this->products->where('is_active','1')->orderBy('created_at','desc')->take(6)->get();
        return  view('brand.index')->withBrand($brand )->withProducts($products);
    }
}
