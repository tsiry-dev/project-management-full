<?php

namespace App\Dtos\Auth;


class LoginUserDataDTO
{
    public function __construct(
       public string $email,
       public string $password
    ){}

    public static function fromArray(array $data): self
    {
        return new self(
           $data['email'],
           $data['password']
        );
    }
}
