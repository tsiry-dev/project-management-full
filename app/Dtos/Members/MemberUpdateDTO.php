<?php

namespace App\Dtos\Members;

class MemberUpdateDTO
{
    public function __construct(
        public readonly ?int $id,
        public readonly ?string $name,
        public readonly ?string $email,
    ){}

    public static function fromArray(array $data): self
    {
        return new self(
            $data['id'],
            $data['name'],
            $data['email'],
        );
    }

}
