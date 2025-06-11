<?php

namespace Tests\Unit\Listeners;

use App\Events\NewUserCreated;
use App\Mail\VerifyUserEmail;
use App\Models\User;
use Illuminate\Support\Facades\Mail;
use PHPUnit\Framework\TestCase;

class SendEmailVerification extends TestCase
{
    public function test_email_is_sent_after_user_creation()
    {
        Mail::fake(); // Ne bloque pas le code, il surveille les envois

        $user = User::factory()->create();

        // Simule l'événement
        event(new NewUserCreated($user));

        Mail::assertSent(VerifyUserEmail::class, function ($mail) use ($user) {
            return $mail->hasTo($user->email);
        });
    }
}
