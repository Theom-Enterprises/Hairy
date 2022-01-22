<?php

namespace App\Jobs;

use App\Mail\UpdateTerminEmail;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Facades\Mail;

class SendEmailJob implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    protected $data;
    protected $user_mail;

    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct($data, $user_mail)
    {
        $this->data = $data;
        $this->user_mail = $user_mail;
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
        $email = new UpdateTerminEmail($this->data);
        Mail::to($this->user_mail)->send($email);
    }
}
