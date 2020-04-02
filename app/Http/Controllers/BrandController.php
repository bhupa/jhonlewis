<?php

namespace App\Http\Controllers;

use App\Repositories\ProductRepository;
use App\Repositories\SunglassesRepository;
use Illuminate\Http\Request;

class BrandController extends Controller
{
    protected $brand,$products;

    public function __construct(SunglassesRepository $brand,ProductRepository $products)
    {
        $this->brand = $brand;
        $this->products = $products;
    }

    public function show($slug){
        $brand = $this->brand->where('slug',$slug)->first();
        $products = $this->products->where('sunglass_id',$brand->id)->where('is_active','1')->orderBy('created_at','1')->paginate(12);

        return  view('brand.index')->withBrand($brand )->withProducts($products);
    }
}
