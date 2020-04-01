<?php

namespace App\Http\ViewComposer\Backend;

use App\Repositories\BannerRepository;
use App\Repositories\BlogRepository;
use App\Repositories\ContentRepository;
use App\Repositories\DiscountRespository;
use App\Repositories\DoctorRepository;
use App\Repositories\FrameCategoryRepository;
use App\Repositories\FrameRepository;
use App\Repositories\GlassesRepository;
use App\Repositories\LensesRepository;
use App\Repositories\PackageRepository;
use App\Repositories\ServiceRespository;
use App\Repositories\SettingRepository;
use App\Repositories\SunglassesRepository;
use App\Repositories\TestimonialRepository;
use Illuminate\View\View;


class ProductComposer
{
    /**
     * The user repository implementation.
     *
     * @var UserRepositorya
     */

    /**
     * Create a new profile Composer.
     *
     * @param  UserRepository  $users
     * @return void
     */
    protected $frame,$frameCategory,$discount,$lenses,$glasses,$sunglasses;
    public function __construct(
        FrameCategoryRepository $frameCategory,
        DiscountRespository $discount,
        LensesRepository $lenses,
        GlassesRepository $glasses,
        SunglassesRepository $sunglasses,
        FrameRepository $frame
    )
    {
        $this->frameCategory = $frameCategory;
        $this->lenses = $lenses;
        $this->glasses = $glasses;
        $this->sunglasses = $sunglasses;
        $this->discount = $discount;
        $this->frame =$frame;

    }

    /**
     * Bind data to the view.
     *
     * @param  View  $view
     * @return void
     */
    public function compose(View $view)
    {
        $framecategories = $this->frameCategory->where('is_active','1')->orderBy('name')->get();
        $frames= $this->frame->where('is_active','1')->orderBy('name')->get();
        $lenses = $this->lenses->where('is_active','1')->orderBy('name')->get();
        $glasses = $this->glasses->where('is_active','1')->orderBy('name')->get();
        $sunglasses = $this->sunglasses->where('is_active','1')->orderBy('name')->get();
        $discounts = $this->discount->where('is_active','1')->orderBy('title')->get();
        $view->withFramecategories($framecategories)
        ->withLenses($lenses)->withGlasses($glasses)
            ->withFrames($frames)
        ->withSunglasses($sunglasses)->withDiscounts($discounts);
    }
}
