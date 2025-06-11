<?php

namespace App\Actions\Auth;

use App\Dtos\Auth\RegisterUserData;
use App\Models\User;
use App\Repositories\UserRepository;
use App\Services\Auth\RegisterService;


class VerifyEmail
{

    public function __construct(
        protected UserRepository $repository
    )
    {}
    public function handle(string $token): bool
    {
        return $this->repository->verifyEmail($token);
    }

}
