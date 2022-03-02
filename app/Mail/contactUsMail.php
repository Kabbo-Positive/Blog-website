<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class contactUsMail extends Mailable
{
    use Queueable, SerializesModels;

    public $contact_from_data;
    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($contact_from_data)
    {
        $this->contact_from_data = $contact_from_data;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->markdown('emails.contact');
    }
}
