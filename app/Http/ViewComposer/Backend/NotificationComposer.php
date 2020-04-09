<?php

namespace App\Http\ViewComposer\Backend;


use App\Repositories\NotificationRepository;
use Illuminate\View\View;


class NotificationComposer
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
    protected $notification;
    public function __construct(
        NotificationRepository $notification
    )
    {
        $this->notification = $notification;

    }

    /**
     * Bind data to the view.
     *
     * @param  View  $view
     * @return void
     */
    public function compose(View $view)
    {
        $totals = $this->notification->where('view',0)->get()->count();
        $notifications = $this->notification->where('view',0)->orderBy('created_at','desc')->take(4)->get();
        $view->withTotals($totals)->withNotifications($notifications);
    }
}
