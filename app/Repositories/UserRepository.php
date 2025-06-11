<?php

namespace App\Repositories;

use App\Contracts\UserRepositoryContract;
use App\Dtos\Auth\RegisterUserData;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class UserRepository implements UserRepositoryContract
{
    /**
     * Create a new class instance.
     */
    public function create(RegisterUserData $data): User
    {
        return User::create([
            'name' => $data->name,
            'email' => $data->email,
            'password' => Hash::make($data->password),
            'is_valid_email' => User::IS_INVALID_EMAIL,
            'remember_token' => Str::random(30),
        ]);
    }

    public function verifyEmail(string $token): bool
    {
       return User::where('remember_token', $token)
                ->update([
                    'is_valid_email' => User::IS_VALID_EMAIL,
                    'email_verified_at' => now()
                ]);
    }
}
