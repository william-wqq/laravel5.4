<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class SendMail extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * 收件者的用户名
     *
     * @var
     */
    public $receiveName;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($receiveName)
    {
        //
        $this->receiveName = $receiveName;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->view('emails.email')
            ->subject('Laravel')
            ->with('username', $this->receiveName);
    }
}
