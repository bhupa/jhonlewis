<?php

namespace App\Http\Controllers;

use App\Repositories\LensesRepository;
use App\Repositories\ProductRepository;
use App\Repositories\SunglassesRepository;
use Illuminate\Http\Request;

class LensController extends Controller
{
    protected $lens,$products;

    public function __construct(LensesRepository $lens,ProductRepository $products)
    {
        $this->lens = $lens;
        $this->products = $products;
    }

    public function show($slug){
        $lens = $this->lens->where('slug',$slug)->first();
        $products = $this->products->where('lens_id',$lens->id)->where('is_active','1')->orderBy('created_at','1')->paginate(12);

        return  view('lens.index')->withlens($lens)->withProducts($products);
    }
}
