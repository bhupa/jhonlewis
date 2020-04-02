<?php

namespace App\Http\Controllers;

use App\Repositories\GlassesRepository;
use App\Repositories\ProductRepository;
use Illuminate\Http\Request;

class GlassController extends Controller
{
    protected $glasses,$products;
    public function __construct(GlassesRepository $glasses,ProductRepository $products)
    {
        $this->glasses = $glasses;
        $this->products = $products;
    }

    public function show($slug){
        $glass = $this->glasses->where('slug',$slug)->first();

        $products = $this->products->where('glass_id',$glass->id)->where('is_active','1')->orderBy('created_at','1')->paginate(12);

        return  view('glass.index')->withGlass($glass )->withProducts($products);
    }
}
