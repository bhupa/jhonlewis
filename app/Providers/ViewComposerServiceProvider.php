<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

class ViewComposerServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        view()->composer(
            [
                'frontend.home','frontend.app','frontend.about'
                ,
            ],
            'App\Http\ViewComposer\Frontend\HomeComposer'
        );
        view()->composer(
            [
                'backend.product.create','backend.product.edit'
                ,
            ],
            'App\Http\ViewComposer\Backend\ProductComposer'
        );
        view()->composer(
            [
                'product.lists'
                ,
            ],
            'App\Http\ViewComposer\Frontend\ProductComposer'
        );
        view()->composer(
            [
                'profile.index'
                ,
            ],
            'App\Http\ViewComposer\Frontend\AuthUserComposer'
        );
    }
}
