<?php

namespace App\Mail\Auth\User;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class MailRegister extends Mailable
{
    use Queueable, SerializesModels;

    protected  $data;

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
     * @return $this
     */
    public function build()
    {
        $data = $this->data;
        return $this->from(config('mail_setting.mail_username'), config('mail_setting.mail_subject'))
            ->subject(config('mail_setting.mail_subject'))
            ->view('emails.user.register',compact('data'));
    }
}
