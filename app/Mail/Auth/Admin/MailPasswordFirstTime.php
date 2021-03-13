<?php

namespace App\Mail\Auth\Admin;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class MailPasswordFirstTime extends Mailable
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
     * @return MailPasswordFirstTime
     */
    public function build()
    {
        $data = $this->data;
        return $this->from(config('mail_setting.mail_username'), config('mail_setting.mail_subject'))
            ->subject('健やかショップ運営用管理画面ログイン情報')
            ->view('emails.admin.password_first_time', compact('data'));
    }
}
