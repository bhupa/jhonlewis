<?php

namespace App\Http\ViewComposer\Backend;


use App\Models\SalesReport;
use App\Repositories\OrderRepository;
use App\Repositories\ProductRepository;
use App\Repositories\SalesResportRepository;
use App\Repositories\ServiceRespository;
use App\Repositories\UserRepository;
use Illuminate\View\View;


class DashboardComposer
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
    protected $order,$sells,$product,$users,$services;
    public function __construct(
        OrderRepository $order, SalesResportRepository $sells,
        ProductRepository $product,UserRepository $users,
        ServiceRespository $services
    )
    {
        $this->order= $order;
        $this->sells = $sells;
        $this->product = $product;
        $this->users = $users;
        $this->services = $services;
    }

    /**
     * Bind data to the view.
     *
     * @param  View  $view
     * @return void
     */
    public function compose(View $view)
    {
        $neworders = $this->order->where('received','0')->get()->count();
        $totalusers = $this->users->where('user_type_id',null)->get()->count();
        $totalsells = $this->sells->where('return','0')->get()->count();
        $totalproducts = $this->product->count();
        $totalservices = $this->services->where('is_active','1')->count();
        $totalordersamount =$this->order->where('received','0')->sum('total_amount');
        $totalreturns = $this->order->where('return','1')->get()->count();

        $previous_week = strtotime("-1 week +1 day");
        $start_week = strtotime("last sunday midnight",$previous_week);
        $end_week = strtotime("next saturday",$start_week);
        $start_week = date("Y-m-d",$start_week);
        $end_week = date("Y-m-d",$end_week);

        $weeklysells = SalesReport::where('dispatch','1')->whereBetween('created_at', [$start_week, $end_week])->count();
        $view->withNeworders($neworders)->withTotalusers($totalusers)
              ->withTotalproducts($totalproducts)->withTotalsells($totalsells)
        ->withTotalservices($totalservices)->withWeeklysells($weeklysells)
        ->withTotalordersamount($totalordersamount)->withTotalreturns( $totalreturns);
    }
}
