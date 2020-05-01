<?php

namespace App\Http\Controllers;

use App\Repositories\ProductListRepository;
use App\Repositories\ProductRepository;
use Illuminate\Http\Request;

class ProductController extends Controller
{

    protected  $product,$productlists;

    public  function __construct(ProductRepository $product,ProductListRepository $productlists)
    {
        $this->product = $product;
        $this->productlists = $productlists;
    }


    public function index(){
        $sunglasses = $this->productlists->where('is_active','1')->where('type','sunglass')->orderBy('created_At','desc')->take(50)->get();
        $eyecares = $this->productlists->where('is_active','1')->where('type','eye-care')->orderBy('created_At','desc')->take(50)->get();
        $kidwears = $this->productlists->where('is_active','1')->where('type','kid-wear')->orderBy('created_At','desc')->take(50)->get();

      return view('product.index')->withSunglasses($sunglasses)->withEyecares($eyecares)->withKidwears($kidwears);
    }

    public function show($slug){
        $category = url()->previous();
        $uri_segments = explode('/', $category);
        $type = $uri_segments[3] ;
        $product = $this->product->where('slug',$slug)->first();
        return view('product.show')->withProduct($product)->withType($type );
    }
}
