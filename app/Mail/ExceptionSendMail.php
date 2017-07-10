<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class ExceptionSendMail extends Mailable
{
    use Queueable, SerializesModels;

    public $error;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct(array $error)
    {
        //
        $this->error = $error;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        //dd($this->error);
        return $this->view('errors.500')->with($this->error);
    }
}
