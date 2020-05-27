<?php

namespace App\Http\Controllers;

use App\Repositories\BrandBannerRepository;
use App\Repositories\BrandRepository;
use App\Repositories\ProductRepository;
use Illuminate\Http\Request;

class NewArrivalController extends Controller
{
    protected $brand, $product;

    public function __construct(BrandRepository $brand, ProductRepository $product)
    {
        $this->brand = $brand;
        $this->product = $product;
    }

    public function show($slug){

        $brand = $this->brand->where('slug',$slug)->first();

        $products = $this->product->where('is_active','1')->where('brand_id',$brand->id)->orderBy('created_at','desc')->paginate(20);

        return  view('arrival.index')->withBrand($brand)->withProducts($products);
    }
}
