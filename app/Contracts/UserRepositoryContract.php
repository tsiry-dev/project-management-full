<?php

namespace App\Contracts;

use App\Dtos\Auth\RegisterUserData;
use App\Models\User;

interface UserRepositoryContract
{
    public function create(RegisterUserData $data): User;

    public function findByEmail(string $email): ?User;

    public function save(User $user): void;
}
