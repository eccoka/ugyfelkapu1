<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class SendMailable extends Mailable
{
    use Queueable, SerializesModels;
    public $name;

    public function __construct()
    {
        $this->name = $name;
    }

    public function build()
    {
        return $this->view('emails.name');
    }
}
