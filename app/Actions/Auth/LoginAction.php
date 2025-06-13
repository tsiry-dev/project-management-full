<?php

namespace App\Actions\Auth;

use App\Contracts\UserRepositoryContract;
use App\Dtos\Auth\LoginUserDataDTO;
use App\Dtos\Auth\RegisterUserData;
use App\Events\NewUserCreated;
use App\Models\User;
use App\Services\Auth\LoginValidatorService;
use App\Services\Auth\PasswordHasherService;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\ValidationException;

class LoginAction
{
    public function __construct(
        protected UserRepositoryContract $user,
        protected LoginValidatorService $loginValidatorService
    ){}

    public function handle(LoginUserDataDTO $data): array
    {

        $user = $this->user->findByEmail($data->email);

        $this->loginValidatorService->validate( $user, $data->password);

        Auth::login($user);

        return [
            'user' => $user,
            'token' => $user->createToken('auth_token')->plainTextToken,
        ];
    }

}
