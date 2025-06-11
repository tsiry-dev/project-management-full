<?php

namespace Tests\Feature\Email;

use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class EmailTest extends TestCase
{
    public function test_email_is_verified_when_token_is_valid()
    {
         $user = User::factory()->create([
             'is_valid_email' => false,
             'email_verified_at' => null,
             'remember_token' => 'token-123-wwww'
         ]);

         $response = $this->get('/verify/token-123-wwww');
         $response->assertRedirect('/login');

         //Recharge la base
         $user->refresh();

         $this->assertEquals(User::IS_VALID_EMAIL, $user->is_valid_email);
         $this->assertNotNull($user->email_verified_at);
    }
}
