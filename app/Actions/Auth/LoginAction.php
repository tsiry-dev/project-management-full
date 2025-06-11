<?php

namespace App\Actions\Auth;

use App\Dtos\Auth\LoginUserDataDTO;
use App\Dtos\Auth\RegisterUserData;
use App\Events\NewUserCreated;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\ValidationException;

class LoginAction
{

    public function handle(LoginUserDataDTO $data): array
    {

        $user = User::where('email', $data->email)->first();

        if (!$user || !Hash::check($data->password, $user->password)) {
            throw ValidationException::withMessages([
                'email' => ['Identifiants incorrects.'],
            ]);
        }

        if (!$user->is_valid_email) {
            NewUserCreated::dispatch($user);

            throw ValidationException::withMessages([
                'message' => 'Votre compte n\'est pas validé, vérifiez votre email'
            ]);
        }

        Auth::login($user);

        return [
            'user' => $user,
            'token' => $user->createToken('auth_token')->plainTextToken,
        ];
    }

}
