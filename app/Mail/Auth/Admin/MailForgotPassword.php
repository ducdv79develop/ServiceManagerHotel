<?php

namespace App\Mail\Auth\Admin;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class MailForgotPassword extends Mailable
{
    use Queueable, SerializesModels;

    protected $data;

    /**
     * Create a new message instance.
     *
     * @param $data
     */
    public function __construct($data)
    {
        $this->data = $data;
    }

    /**
     * Build the message.
     *
     * @return MailForgotPassword
     */
    public function build()
    {
        $data = $this->data;
        return $this->from(getenv('MAIL_USERNAME'), getenv('MAIL_SUBJECT'))
            ->subject(getenv('MAIL_SUBJECT'))
            ->view('emails.admin.forgot_password', compact('data'));
    }
}
