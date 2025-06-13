<?php

namespace Tests\Unit\Actions\Auth;

use App\Actions\Auth\LoginAction;
use App\Dtos\Auth\LoginUserDataDTO;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Support\Facades\Hash;
use Tests\TestCase;

class LoginActionTest extends TestCase
{
      use RefreshDatabase;

      public function test_login_success_with_verified_email()
      {
          $user = User::factory()->create([
             'email' => 'john@example.com',
             'password' => bcrypt('password'),
             'is_valid_email' => true
          ]);

          $dto = new LoginUserDataDTO(
             'john@example.com',
             'password'
          );


      }
}
