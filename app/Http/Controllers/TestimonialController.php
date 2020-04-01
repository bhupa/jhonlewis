<?php

namespace App\Http\Controllers;

use App\Http\Requests\Frontend\Testimonial\TestimonialStoreRequest;
use App\Repositories\ServiceRespository;
use App\Repositories\TestimonialRepository;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class TestimonialController extends Controller
{
    protected $testimonial,$service;

    public function __construct(TestimonialRepository $testimonial,ServiceRespository $service)
    {
        $this->testimonial = $testimonial;
        $this->service = $service;
    }

    public function store(TestimonialStoreRequest $request){
        $service = $this->service->find($request->id);
        $data = $request->except('_token');

            $data['created_by'] =Auth::user()->id;
            $data['service_id'] = $service->id;

        if($this->testimonial->create($data)){

            return redirect()->to('/service/'.$service->slug)->with('success','Feedback register successfully');
        }
        return redirect()->back()->with('errors','Feedback cannot register successfully');
    }
}
