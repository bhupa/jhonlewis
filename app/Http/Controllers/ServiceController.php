<?php

namespace App\Http\Controllers;

use App\Repositories\ServiceRespository;
use Illuminate\Http\Request;

class ServiceController extends Controller
{
    protected $service;

    public function __construct(ServiceRespository $service)
    {
        $this->service= $service;
    }

    public  function index(){
        $services = $this->service->where('is_active','1')->orderBy('created_at','desc')->paginate(6);
        return view('services.index')->withServices($services);
    }
    public function show($slug){
        $service = $this->service->where('slug',$slug)->first();
        return view('services.show')->withService($service);
    }
}
