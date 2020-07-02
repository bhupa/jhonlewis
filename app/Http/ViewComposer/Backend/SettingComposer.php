<?php

namespace App\Http\ViewComposer\Backend;


use App\Repositories\NotificationRepository;
use App\Repositories\SettingRepository;
use Illuminate\View\View;


class SettingComposer
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
    protected $setting;
    public function __construct(
        SettingRepository $setting
    )
    {
       $this->setting = $setting;

    }

    /**
     * Bind data to the view.
     *
     * @param  View  $view
     * @return void
     */
    public function compose(View $view)
    {
        $settings = $this->setting->where('is_active','1')->get();
        $view->withSettings($settings);
    }
}
