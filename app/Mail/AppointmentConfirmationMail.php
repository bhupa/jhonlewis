<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class AppointmentConfirmationMail extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    protected $data,$company;
    public function __construct($data,$company)
    {
        $this->data=$data;
        $this->company= $company;

    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->from($this->company['email'],$this->company['name'])->subject('Appointment  Confirmation')->view('backend.email.appointmentConfirmation')->withData($this->data)->withCompany($this->company);

    }
}
