<?php

namespace App\Http\ViewComposer\Frontend;

use App\Repositories\BannerRepository;
use App\Repositories\BlogRepository;
use App\Repositories\ContentRepository;
use App\Repositories\DoctorRepository;
use App\Repositories\PackageRepository;
use App\Repositories\ServiceRespository;
use Illuminate\View\View;


class HomeComposer
{
    /**
     * The user repository implementation.
     *
     * @var UserRepositorya
     */
    protected  $content,$blogs,$banner,$service,$packages,$doctor;

    /**
     * Create a new profile Composer.
     *
     * @param  UserRepository  $users
     * @return void
     */
    public function __construct(
                                ContentRepository $content, BlogRepository $blogs,
                                BannerRepository $banner, ServiceRespository $service,
                                PackageRepository $packages,DoctorRepository $doctor
    )
    {
        $this->content = $content;
        $this->blogs = $blogs;
        $this->banner = $banner;
        $this->service = $service;
        $this->packages = $packages;
        $this->doctor = $doctor;

    }

    /**
     * Bind data to the view.
     *
     * @param  View  $view
     * @return void
     */
    public function compose(View $view)
    {

        $banners = $this->banner->where('is_active','1')->orderBy('created_at','desc')->take(4)->get();
        $contents = $this->content->where('is_active','1')->get();
        $services  = $this->service->where('is_active','1')->orderBy('created_at','desc')->take(6)->get();
        $packages  = $this->packages->where('is_active','1')->orderBy('created_at','desc')->take(6)->get();
        $doctors  = $this->doctor->where('is_active','1')->orderBy('created_at','desc')->get();
        $blogs = $this->blogs->where('is_active','1')->orderBy('created_at','desc')->take(4)->get();
        $view->withBanners($banners)
             ->withContents($contents)
            ->withPackages($packages)
             ->withServices($services)
            ->withDoctors($doctors)
            ->withBlogs($blogs);
    }
}
