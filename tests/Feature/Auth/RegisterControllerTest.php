<?php

namespace Tests\Feature\Auth;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Support\Facades\Mail;
use Tests\TestCase;

class RegisterControllerTest extends TestCase
{
    use RefreshDatabase;

    public function test_register_response_contains_success_message()
    {

        Mail::fake();
        $response = $this->postJson(route('register'), [
            'name' => 'John Doe',
            'email' => 'john@example.com',
            'password' => 'password',
            'password_confirmation' => 'password',
        ]);


        $response->assertStatus(201)
                ->assertJson([
                    'message' => 'Votre compte a été créé avec succès,un email de vérification vous a été envoyé',
                ]);
    }
}
