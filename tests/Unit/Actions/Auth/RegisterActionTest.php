<?php

namespace Tests\Unit\Actions\Auth;

use App\Actions\Auth\RegisterAction;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Support\Facades\Hash;
// use PHPUnit\Framework\TestCase;
use Tests\TestCase;


class RegisterActionTest extends TestCase
{
    use RefreshDatabase;

    private RegisterAction $action;

    protected function setUp(): void
    {
        parent::setUp();
        $this->action = new RegisterAction();
    }

    public function test_handle_create_user_with_hashed_password_and_remember_token_is_create()
    {
            $data = [
                'name' => 'John Doe',
                'email' => 'john.doe@example.com',
                'password' => 'password',
            ];

            $user = $this->action->handle($data);

            $this->assertTrue(Hash::check('password', $user->password));

            $this->assertNotEmpty($user->remember_token);

            // Vérifie que l'utilisateur est bien en base
            $this->assertDatabaseHas('users', [
                'email' => 'john.doe@example.com',
                'name' => 'John Doe',
            ]);
    }

}
