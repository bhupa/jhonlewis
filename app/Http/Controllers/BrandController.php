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
//        $products = $this->products->where('is_active','1')->orderBy('created_at','desc')->pagination('20');

        $products = $this->products->where('is_active','1')->where('brand_id',$brand->id)->orderBy('created_at','desc')->paginate(20);
        return  view('brand.show')->withBrand($brand )->withProducts($products);
    }
}
