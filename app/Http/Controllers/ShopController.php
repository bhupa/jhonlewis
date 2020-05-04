<?php

namespace App\Http\Controllers;

use App\Repositories\BrandRepository;
use App\Repositories\ContentRepository;
use App\Repositories\ProductRepository;
use Illuminate\Http\Request;

class ShopController extends Controller
{
    protected $product,$content,$brand;

    public  function __construct(ProductRepository $product,ContentRepository $content,BrandRepository $brand)
    {
        $this->product = $product;
        $this->content = $content;
        $this->brand = $brand;
    }


    public  function index() {
        $products = $this->product->where('is_active','1')->orderBy('created_at','desc')->paginate(20);


        $brands = $this->brand->where('is_active','1')->where('selling','1')->orderBy('name')->get();
        return view('shop.index')->withProducts($products)->withBrands( $brands );
    }
    public function getSingle(){
        return view('shop.show');
    }
}
