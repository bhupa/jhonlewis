<?php

namespace App\Http\Controllers;

use App\Repositories\ContentRepository;
use App\Repositories\ProductListRepository;
use Illuminate\Http\Request;

class ContentController extends Controller
{
    protected  $content,$productlists;

    public  function __construct(ContentRepository $content,ProductListRepository $productlists)
    {
        $this->content = $content;
        $this->productlists = $productlists;
    }

    public  function index(){}
    public  function create(){}
    public  function edit(){}
    public  function update(){}
    public  function show($slug){
        $content = $this->content->where('slug',$slug)->first();
        $sunglasses = $this->productlists->where('is_active','1')->where('type','sunglass')->orderBy('created_at','desc')->take(50)->get();
        $eyecares = $this->productlists->where('is_active','1')->where('type','eye-care')->orderBy('created_at','desc')->take(50)->get();
        $kidwears = $this->productlists->where('is_active','1')->where('type','kid-wear')->orderBy('created_at','desc')->take(50)->get();
        return view('content.show')->withContent($content)->withSunglasses($sunglasses)->withEyecares($eyecares)->withKidwears($kidwears);

    }
    public  function destroy(){}

}
