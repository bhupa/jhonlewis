<?php

namespace App\Mail\Order;

use App\Mail\ForgetPasswordLink;
use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class OrderMail extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    protected $order,$company,$shipping;
    public function __construct($order,$company,$shipping)
    {
        $this->order = $order;
        $this->company= $company;
        $this->shipping =$shipping;

    }

    /**
     * Build the message.
     *
     * @return
     */
    public function build()
    {
        return $this->from($this->company['email'],$this->company['name'])->subject('Product Order Lists')->view('backend.email.order')->withShipping($this->shipping)->withOrder($this->order);

    }
}
