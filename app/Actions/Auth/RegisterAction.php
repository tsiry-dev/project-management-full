<?php

namespace App\Actions\Auth;

use App\Dtos\Auth\RegisterUserData;
use App\Models\User;
use App\Services\Auth\RegisterService;


class RegisterAction
{

    public function __construct(
        protected RegisterService $service
    )
    {}
    public function handle(RegisterUserData $data): User
    {
        return $this->service->register($data);
    }

}
