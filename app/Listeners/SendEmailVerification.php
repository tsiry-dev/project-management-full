<?php

namespace App\Listeners;

use App\Events\NewUserCreated;
use App\Mail\VerifyUserEmail;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Support\Facades\Mail;

// class SendEmailVerification implements ShouldQueue
class SendEmailVerification
{
    /**
     * Create the event listener.
     */
    public function __construct()
    {
        //
    }

    /**
     * Handle the event.
     */
    public function handle(NewUserCreated $event): void
    {
        // sleep(5);
        Mail::to($event->user->email)
            ->send(new VerifyUserEmail($event->user));
    }
}
