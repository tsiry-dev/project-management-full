<?php

namespace App\Actions\Auth;

use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class RegisterAction
{
    public function handle(array $data): User
    {
        return User::create([
            'name' => $data['name'],
            'email' => $data['email'],
            'password' => Hash::make($data['password']),
            'is_valid_email' => User::IS_INVALID_EMAIL,
            'remember_token' => $this->generateRememberToken()
         ]);
    }

    private function generateRememberToken(): string
    {
        return Str::random(30) . time();
    }
}
