<?php

namespace App\Jobs;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Support\Facades\Mail;

class SendVerificationEmailJob implements ShouldQueue
{
    public $school;

    public function __construct($school)
    {
        $this->school = $school;
    }

    public function handle()
    {
        $url = route('tenant.verify', $this->school->verification_token);

        Mail::to($this->school->email)->send(
            new \App\Mail\VerifyEmailMail($this->school, $url)
        );
    }
}