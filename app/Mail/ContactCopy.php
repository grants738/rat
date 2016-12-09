<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class ContactCopy extends Mailable
{
    use Queueable, SerializesModels;

    public $reply;
    public $name;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($name, $reply)
    {
        $this->name = $name;
        $this->reply = $reply;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->view('mail.contactCopy');
    }
}
