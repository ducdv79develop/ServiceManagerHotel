<?php

namespace App\Jobs\Admin;

use App\Mail\Admin\MailContact;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Support\Facades\Mail;

class SendEmailContact implements ShouldQueue
{

    protected $data;

    /**
     * Create a new job instance.
     *
     * @param $data
     */
    public function __construct($data)
    {
        $this->data = $data;
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
        $email = new MailContact($this->data);
        $mail_to = config('mail_setting.to');
        if (config('mail_setting.cc')) {
            $email_cc = array();
            foreach (config('mail_setting.cc') as $cc) {
                $email_cc[] = $cc;
            }
            Mail::to($mail_to)
            ->cc($email_cc)
            ->send($email);
        } else {
            Mail::to($mail_to)->send($email);
        }
    }
}
