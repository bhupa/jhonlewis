<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class ForgetPasswordLink extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    protected $token,$company;
    public function __construct($token,$company)
    {
        $this->token = $token;
        $this->company= $company;

    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->from($this->company['email'],$this->company['name'])->subject('Forget Password link')->view('backend.email.passwordlink')->withToken($this->token);

    }
}
