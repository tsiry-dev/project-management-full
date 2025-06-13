<?php

namespace App\Services\Auth;

use Illuminate\Support\Facades\Hash;

class PasswordHasherService
{
    public function verify(string $password, string $hash): bool
    {
        return Hash::check($password, $hash);
    }
}
