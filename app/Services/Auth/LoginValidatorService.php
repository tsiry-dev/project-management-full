<?php

namespace App\Services\Auth;

use App\Events\NewUserCreated;
use App\Models\User;
use Illuminate\Validation\ValidationException;

class LoginValidatorService
{
    public function __construct(
        protected PasswordHasherService $hasher
    ){}

    public function validate(?User $user, string $password): void
    {
        if (!$user || !$this->hasher->verify($password, $user->password)) {
            throw ValidationException::withMessages([
                'email' => ['Identifiants incorrects.'],
            ]);
        }

        if (!$user->is_valid_email) {
            NewUserCreated::dispatch($user);

            throw ValidationException::withMessages([
                'message' => ['Votre compte n\'est pas validé, vérifiez votre email']
            ]);
        }
    }
}
