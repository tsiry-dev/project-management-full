<?php

namespace App\Services\Auth;

use App\Contracts\UserRepositoryContract;
use App\Dtos\Auth\RegisterUserData;
use App\Models\User;

class RegisterService
{
    /**
     * Create a new class instance.
     */
    public function __construct(
        protected UserRepositoryContract $repository
    ){}

    public function register(RegisterUserData $data):User
    {
       return $this->repository->create($data);
    }
}
