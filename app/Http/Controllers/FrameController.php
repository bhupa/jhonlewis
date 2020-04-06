<?php

namespace App\Http\Controllers;

use App\Repositories\FrameRepository;
use App\Repositories\ProductRepository;
use App\Repositories\SunglassesRepository;
use Illuminate\Http\Request;

class FrameController extends Controller
{
    protected $frame,$products;

    public function __construct(FrameRepository $frame,ProductRepository $products)
    {
        $this->frame = $frame;
        $this->products = $products;
    }

    public function show($slug){
        $frame = $this->frame->where('slug',$slug)->first();
        $products = $this->products->where('frame_id',$frame->id)->where('is_active','1')->orderBy('created_at','1')->paginate(12);

        return  view('frame.index')->withframe($frame )->withProducts($products);
    }
}
