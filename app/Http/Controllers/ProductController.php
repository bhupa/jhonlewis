<?php

namespace App\Http\Controllers;

use App\Repositories\ContentRepository;
use App\Repositories\ProductListRepository;
use App\Repositories\ProductRepository;
use Illuminate\Http\Request;

class ProductController extends Controller
{

    protected  $product,$productlists,$content;

    public  function __construct(ProductRepository $product,ProductListRepository $productlists,ContentRepository $content)
    {
        $this->product = $product;
        $this->productlists = $productlists;
        $this->content = $content;
    }


    public function index(){
        $sunglasses = $this->productlists->where('is_active','1')->where('type','sunglass')->orderBy('created_at','desc')->take(50)->get();
        $eyecares = $this->productlists->where('is_active','1')->where('type','eye-care')->orderBy('created_at','desc')->take(50)->get();
        $kidwears = $this->productlists->where('is_active','1')->where('type','kid-wear')->orderBy('created_at','desc')->take(50)->get();
        $frames = $this->content->where('is_active','1')->where('slug','frame-brand')->first();
      return view('product.index')->withSunglasses($sunglasses)->withEyecares($eyecares)->withKidwears($kidwears)->withFrames($frames);
    }

    public function show($slug){
        $category = url()->previous();
        $uri_segments = explode('/', $category);
        $type = $uri_segments[3] ;
        $product = $this->product->where('slug',$slug)->first();
        return view('product.show')->withProduct($product)->withType($type );
    }
}
