<?php

namespace App\Http\ViewComposer\Frontend;

use App\Repositories\AppointmentRepository;

use App\Repositories\OrderRepository;
use App\Repositories\SalesResportRepository;
use Illuminate\View\View;
use Session;
use Auth;


class AuthUserComposer
{
    /**
     * The user repository implementation.
     *
     * @var UserRepositorya
     */
    protected  $appointment,$orders,$sales;

    /**
     * Create a new profile Composer.
     *
     * @param  UserRepository  $users
     * @return void
     */
    public function __construct(
        AppointmentRepository $appointment,SalesResportRepository $sales,OrderRepository $orders
    )
    {
        $this->appointment = $appointment;
        $this->sales = $sales;
        $this->orders = $orders;

    }

    /**
     * Bind data to the view.
     *
     * @param  View  $view
     * @return void
     */
    public function compose(View $view)
    {
        $latest = $this->appointment->where('user_id',Auth::user()->id)->orderBy('date','desc')->first();
        $order = $this->orders->where('buyer_id',Auth::user()->id)->orderBy('created_at','desc')->first();
        $received = $this->orders->where('buyer_id',Auth::user()->id)->where('received','1')->get();
        $notreceived = $this->orders->where('buyer_id',Auth::user()->id)->where('received','0')->get();
        $total = $this->orders->where('buyer_id',Auth::user()->id)->get();

        $view->withLatest($latest)->withOrder($order)->withReceived($received)->withNotreceived($notreceived)->withTotal($total);
    }
}
