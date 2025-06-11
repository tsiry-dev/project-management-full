<?php

namespace Tests\Unit\Actions\Auth;

use App\Actions\Auth\RegisterAction;
use App\Dtos\Auth\RegisterUserData;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Support\Facades\Hash;
// use PHPUnit\Framework\TestCase;
use Tests\TestCase;


class RegisterActionTest extends TestCase
{
    use RefreshDatabase;

    public function test_handle_create_user_with_hashed_password_and_remember_token_is_create()
    {
        $data = new RegisterUserData('Alice', 'alice@example.com', 'secret123');
        $action = app(RegisterAction::class);
        //alternative
        // $repository = new UserRepository();
        // $service = new UserService($repository);
        // $action = new RegisterAction($service);


        $user = $action->handle($data);

        $this->assertInstanceOf(User::class, $user);
        $this->assertEquals('alice@example.com', $user->email);
        $this->assertTrue(Hash::check('secret123', $user->password));

    }

}
