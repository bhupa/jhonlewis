<?php

namespace App\Http\Controllers;

use App\Repositories\ContentRepository;
use App\Repositories\ServiceRespository;
use Illuminate\Http\Request;

class ServiceController extends Controller
{
    protected $service, $content;

    public function __construct(ServiceRespository $service,ContentRepository $content)
    {
        $this->service= $service;
        $this->content = $content;
    }

    public  function index(){
        $services = $this->service->where('is_active','1')->orderBy('display_order','asc')->get();
        $content = $this->content->where('is_active','1')->where('slug','service')->first();

        return view('services.index')->withServices($services)->withContent($content);
    }
    public function show($slug){

        $service = $this->service->where('slug',$slug)->first();
        return view('services.lists')->withService($service);
    }
}
