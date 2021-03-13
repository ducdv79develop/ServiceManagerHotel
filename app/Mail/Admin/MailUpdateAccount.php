<?php

namespace App\Mail\Admin;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class MailUpdateAccount extends Mailable
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
     * @return MailUpdateAccount
     */
    public function build()
    {
        $data = $this->data;
        return $this->from(config('mail_setting.mail_username'), config('mail_setting.mail_subject'))
            ->subject('健やかショップ運営用管理画面アカウント情報更新通知')
            ->view('emails.admin.update_account', compact('data'));
    }
}
