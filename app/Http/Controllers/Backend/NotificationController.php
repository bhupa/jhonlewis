<?php

namespace App\Http\Controllers\Backend;

use App\Models\Notification;
use App\Repositories\NotificationRepository;
use App\Repositories\OrderRepository;
use App\Repositories\SettingRepository;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use LRedis;

class NotificationController extends Controller
{
    protected $notification,$setting,$order;

    public function __construct(NotificationRepository $notification,SettingRepository $setting,OrderRepository $order)
    {
        $this->notification =$notification;
        $this->setting = $setting;
        $this->order = $order;
    }

    public function index(){

        $notifications = $this->notification->where('view', '0')->orderBy('created_at', 'desc')->take(5)->get();
        $totals = $this->notification->where('view', '0')->count();

//        return response()->json(['notification'=>$notification]);
        return view('backend.notification')->withNotifications($notifications)->withTotals($totals);


    }

    public function create(){

    }
    public function edit($id){

    }
    public function show($id){
        $order= $this->order->find($id);
        $notification = $this->notification->where('order_id',$order->id)->first();

        $data['view']= 1;
        $this->notification->update($notification->id,$data);
        $settings = $this->setting->orderBy('created_at','desc')->get();

        return view('backend.notification.show')->withOrder($order)->withSettings($settings);
    }
    public function store(Request $request){

    }
    public function update($id){

    }
    public function destroy($id){

    }
}
