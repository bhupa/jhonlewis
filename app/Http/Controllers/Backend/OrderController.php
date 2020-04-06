<?php

namespace App\Http\Controllers\Backend;

use App\Repositories\OrderRepository;
use App\Repositories\SalesResportRepository;
use App\Repositories\SettingRepository;
use App\Repositories\ShippingRepository;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class OrderController extends Controller
{
    protected  $order,$setting,$sales,$shipping ;

    public function __construct(OrderRepository $order,SettingRepository $setting,SalesResportRepository $sales, ShippingRepository $shipping)
    {
        $this->order = $order;
        $this->setting = $setting;
        $this->sales = $sales;
        $this->shipping = $shipping;
    }

    public function index(){
        $orders = $this->order->orderBy('created_at','desc')->paginate('1000');

        return view('backend.order.index')->withOrders($orders);
    }


    public function changeStatus(Request $request)
    {

        $order = $this->order->find($request->get('id'));
        if ($order->received == 0) {
            $status = '1';
            $message = 'order with serial number "' . $order->serial_number . '" is dispatch.';
        } else {
            $status = '0';
            $message = 'order with serial number "' . $order->serial_number . '" is not dispatch.';
        }

        $this->order->changeStatus( $order->id, $status);
        $this->order->update($order->id, array('received' => $status));
        $updated = $this->order->find($request->get('id'));
        return response()->json(['status' => 'ok', 'message' => $message, 'orders' => $updated], 200);
    }
    public function getReturn(Request $request)
    {

        $order = $this->order->find($request->get('id'));
        if ($order->return == 0) {
            $status = '1';
            $message = 'order with serial number "' . $order->serial_number . '" is return.';
        } else {
            $status = '0';
            $message = 'order with serial number "' . $order->serial_number . '" is not retutn.';
        }

        $this->order->changeStatus( $order->id, $status);
        $this->order->update($order->id, array('return' => $status));
        $updated = $this->order->find($request->get('id'));
        return response()->json(['status' => 'ok', 'message' => $message, 'orders' => $updated], 200);
    }

    public  function show($id){
        $order= $this->order->find($id);
        $settings = $this->setting->orderBy('created_at','desc')->get();

        return view('backend.order.show')->withOrder($order)->withSettings($settings);
    }
    public function destroy(Request $request)
    {
        $order = $this->order->find($request->id);
        $this->sales->where('order_id',$order->id)->delete();
        $this->shipping->where('order_id',$order->id)->delete();
        if($this->order->destroy($order->id)){

            $message = 'Order delete successfully';
            return response()->json(['status'=>'ok','message'=>$message],200);

        }
        return response()->json(['status'=>'ok','message'=>'Order cannot be delete'],422);
    }
}
