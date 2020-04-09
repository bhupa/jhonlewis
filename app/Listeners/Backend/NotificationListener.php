<?php

namespace App\Listeners\Backend;

use App\Events\Frontend\Notification\NotificationEvent;
use App\Events\Order\NewOrder;
use App\Models\Notification;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Support\Facades\Auth;

class NotificationListener
{
    /**
     * Create the event listener.
     *
     * @return void
     */

    public function createNotification($event){

        Notification::create([
            'sender_id'=>Auth::user()->id,
            'order_id'=>$event->object['id'],
            'link'=>route('notifications.show',[$event->object['id']]),
            'message'=>'New Order has been places',
            'view'=> 0,
        ]);

    }
    /**
     * Handle the event.
     *
     * @param  object  $event
     * @return void
     */
    public function subscribe($event)
    {

        $event->listen(
            NotificationEvent::class,
            'App\Listeners\Backend\NotificationListener@createNotification'

        );
    }
}
