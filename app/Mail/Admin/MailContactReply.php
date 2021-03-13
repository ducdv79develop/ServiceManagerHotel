<?php

namespace App\Mail\Admin;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class MailContactReply extends Mailable
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
        return $this->from(config('mail_setting.from'), config('mail_setting.contact_reply_test.subject'))
            ->subject(config('mail_setting.contact_reply_test.subject'))
            ->view('emails.admin.contact_reply',compact('data'));
    }
}
