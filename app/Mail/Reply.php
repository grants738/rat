<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class Reply extends Mailable
{
    use Queueable, SerializesModels;

    public $name;
    public $reply;
    public $replier;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($name, $reply, $replier)
    {
        $this->name = $name;
        $this->reply = $reply;
        $this->replier = $replier;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->view('mail.reply')->subject("Contact Inquiry Reply");
    }
}
