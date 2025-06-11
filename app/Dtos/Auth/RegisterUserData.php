<?php

namespace App\Dtos\Auth;


/**
 * Cette classe est un Data Transfer Object pour la création d'un utilisateur.
 * Elle encapsule les données à transmettre de façon immuable.
 */
class RegisterUserData
{
    /**
     * Create a new class instance.
     */
    public function __construct(
        public readonly string $name,
        public readonly string $email,
        public readonly string $password,
    )
    {}

    public static function fromArray(array $data): self
    {
        return new self(
            $data['name'],
            $data['email'],
            $data['password'],
        );
    }
}




















