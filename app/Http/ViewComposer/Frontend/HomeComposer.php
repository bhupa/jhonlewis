<?php

namespace App\Http\ViewComposer\Frontend;

use App\Repositories\BannerRepository;
use App\Repositories\BlogRepository;
use App\Repositories\BrandRepository;
use App\Repositories\ContentRepository;
use App\Repositories\DoctorRepository;
use App\Repositories\FrameCategoryRepository;
use App\Repositories\FrameRepository;
use App\Repositories\GlassesRepository;
use App\Repositories\LensesRepository;
use App\Repositories\PackageRepository;
use App\Repositories\ProductRepository;
use App\Repositories\ServiceRespository;
use App\Repositories\SettingRepository;
use App\Repositories\SunglassesRepository;
use App\Repositories\TestimonialRepository;
use Illuminate\View\View;
use Session;


class HomeComposer
{
    /**
     * The user repository implementation.
     *
     * @var UserRepositorya
     */
    protected  $content,$blogs,
                $banner,$service,
                $packages,$doctor,
                $setting,$testimonial,
                $glasses,$lens,$brand,$frames,$frameCategory, $products;

    /**
     * Create a new profile Composer.
     *
     * @param  UserRepository  $users
     * @return void
     */
    public function __construct(
                                ContentRepository $content, BlogRepository $blogs,
                                BannerRepository $banner, ServiceRespository $service,
                                PackageRepository $packages,DoctorRepository $doctor,
                                SettingRepository $setting, TestimonialRepository $testimonial,
                                 ProductRepository $products, GlassesRepository $glasses,
                                LensesRepository $lens, BrandRepository $brand,
                                FrameRepository $frames, FrameCategoryRepository $frameCategory
    )
    {
        $this->content = $content;
        $this->blogs = $blogs;
        $this->banner = $banner;
        $this->service = $service;
        $this->packages = $packages;
        $this->doctor = $doctor;
        $this->setting = $setting;
        $this->testimonial = $testimonial;
        $this->products = $products;
        $this->glasses= $glasses;
        $this->lens = $lens;
        $this->brand = $brand;
        $this->frames = $frames;
        $this->frameCategory =$frameCategory;

    }

    /**
     * Bind data to the view.
     *
     * @param  View  $view
     * @return void
     */
    public function compose(View $view)
    {
        $header = $this->content->where('is_active','1')->where('menu','header')->orderBy('title')->get();
        $footer = $this->content->where('is_active','1')->where('menu','footer')->orderBy('title')->get();


        $banners = $this->banner->where('is_active','1')->orderBy('created_at','desc')->take(4)->get();
        $about = $this->content->where('is_active','1')->where('slug','about-us')->first();
        $eyecare = $this->content->where('is_active','1')->where('slug','eye-care')->first();
        $contactlens = $this->content->where('is_active','1')->where('slug','contact-lens')->first();

        $frame = $this->content->where('is_active','1')->where('slug','frame-brand')->first();
        $home = $this->content->where('is_active','1')->where('slug','home')->first();

        $services  = $this->service->where('is_active','1')->orderBy('created_at','desc')->take(6)->get();
        $packages  = $this->packages->where('is_active','1')->orderBy('created_at','desc')->take(6)->get();
        $doctors  = $this->doctor->where('is_active','1')->orderBy('created_at','desc')->get();
        $blogs = $this->blogs->where('is_active','1')->orderBy('created_at','desc')->take(4)->get();
        $settings = $this->setting->where('is_active','1')->get();
        $testimonials = $this->testimonial->where('is_active','1')->orderBy('created_at','desc')->get();
        $products = $this->products->where('is_active','1')->orderBy('created_at','desc')->take(10)->get();
        $carts = Session::get('cart');
        $glasses = $this->glasses->where('is_active','1')->orderBy('name')->get();
        $lenses = $this->lens->where('is_active','1')->orderBy('name')->get();
        $brands = $this->brand->where('is_active','1')->orderBy('name')->get();
        $frames = $this->frames->where('is_active','1')->orderBy('name')->get();
        $view->withBanners($banners)
            ->withEyecare($eyecare)
            ->withHome($home )
            ->withContactlens($contactlens )
            ->withFrame($frame)
        ->withAbout($about)
            ->withPackages($packages)
             ->withServices($services)
            ->withDoctors($doctors)
            ->withSettings($settings)
            ->withTestimonials($testimonials)
            ->withProducts($products)
            ->withCarts($carts)
            ->withBlogs($blogs)
            ->withLenses($lenses)
            ->withBrands($brands)
            ->withBrands($brands)
            ->withFrames($frames)
            ->withGlasses($glasses)
        ->withHeader($header)
        ->withFooter($footer);
    }
}
