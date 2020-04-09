<?php

namespace App\Http\Controllers\Backend;

use App\Events\Order\NewOrder;
use App\Models\Notification;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use View;
use LRedis;
use Illuminate\Support\Facades\Redis;
class DashboardController extends Controller
{

    public function index(Request $request)
    {


//            Redis::publish('LARAVEL_APP', json_encode([
//                'event' => 'test-event',
//                'email' => auth()->user()->email,
//                'payload' => $data
//            ]));

//            return response()->json(['triggerd']);

//        }
        return view('backend.dashboard');
    }
    public function renderNotification($notification){
       $html = '';

       foreach($notification as $valye){


           $html .='<a href="#" class="dropdown-item">

                        <div class="media">

                          </div>
                 </a>
                 <div class="dropdown-divider"></div>';

       }
   return $html;
//
  }

}
