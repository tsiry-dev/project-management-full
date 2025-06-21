<?php

namespace App\Dtos\Members;

class StoreDTO
{
    /**
     * Create a new class instance.
     */
    public function __construct(
        public readonly string $name,
        public readonly string $email,
    )
    {}

    public static function fromArray(array $data): self
    {
        return new self(
           $data['name'],
           $data['email']
        );
    }
}
