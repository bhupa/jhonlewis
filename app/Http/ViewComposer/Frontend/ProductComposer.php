<?php

namespace App\Http\ViewComposer\Frontend;

use App\Repositories\BannerRepository;
use App\Repositories\BlogRepository;
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


class ProductComposer
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
        LensesRepository $lens, SunglassesRepository $brand,
        FrameRepository $frames, FrameCategoryRepository $frameCategory
    )
    {
        $this->content = $content;
        $this->setting = $setting;
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

        $contents = $this->content->where('is_active','1')->get();
        $settings = $this->setting->where('is_active','1')->get();
        $products = $this->products->where('is_active','1')->orderBy('created_at','desc')->take(10)->get();
        $glasses = $this->glasses->where('is_active','1')->orderBy('name')->get();
        $lenses = $this->lens->where('is_active','1')->orderBy('name')->get();
        $brands = $this->brand->where('is_active','1')->orderBy('name')->get();
        $frames = $this->frames->where('is_active','1')->orderBy('name')->get();
        $productlists = $this->products->where('is_active','1')->orderBy('created_at','desc')->take(6)->get();

        $view
            ->withSettings($settings)
            ->withProducts($products)
            ->withLenses($lenses)
            ->withBrands($brands)
            ->withBrands($brands)
            ->withFrames($frames)
            ->withGlasses($glasses)
        ->withProductlists($productlists);
    }
}
