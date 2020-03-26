<?php

namespace App\Http\Controllers;

use App\Repositories\PackageRepository;
use Illuminate\Http\Request;

class PackageController extends Controller
{
    protected  $package;

    public function __construct(PackageRepository $package)
    {
        $this->package = $package;
    }

    public function index(){
        $packages = $this->package->where('is_active','1')->orderBy('created_at','desc')->paginate('3');
        return view('package.index')->withPackages($packages);
    }

    public function show($slug){
        $package = $this->package->where('slug',$slug)->first();
        return view('package.show')->withPackage($package);
    }
}
