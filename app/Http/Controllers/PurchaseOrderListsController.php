<?php

namespace App\Http\Controllers;

use App\Repositories\OrderRepository;
use App\Repositories\SalesResportRepository;
use Illuminate\Http\Request;

class PurchaseOrderListsController extends Controller
{
    protected $sales,$orders;

    public function __construct(SalesResportRepository $sales,OrderRepository $orders)
    {
        $this->sales = $sales;
        $this->orders = $orders;
    }

    public function index(){
        $orders = $this->orders->orderBy('created_at','desc')->paginate('8');
        return view('orderlists.index')->withOrders($orders);
    }
    public function show($serialNumber){

        $orders = $this->orders->find($serialNumber);
       $sales = $this->sales->where('order_id',$serialNumber)->orderBy('created_at','asc')->get();

        return view('orderlists.show')->withOrders($orders)->withSales($sales);
    }
}
