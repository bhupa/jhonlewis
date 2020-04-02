<?php

namespace App\Http\Controllers;

use App\Repositories\frameCategoryesRepository;
use App\Repositories\FrameCategoryRepository;
use App\Repositories\ProductRepository;
use Illuminate\Http\Request;

class FrameCategoryController extends Controller
{
    protected $frameCategory,$products;

    public function __construct(FrameCategoryRepository $frameCategory,ProductRepository $products)
    {
        $this->frameCategory = $frameCategory;
        $this->products = $products;
    }

    public function show($slug){
        $frameCategory = $this->frameCategory->where('slug',$slug)->first();
        $products = $this->products->where('frame_category_id',$frameCategory->id)->where('is_active','1')->orderBy('created_at','1')->paginate(12);

        return  view('frameCategory.index')->withframeCategory($frameCategory)->withProducts($products);
    }
}
