<?php

namespace App\Dtos\Tasks;

class TaskStoreDTO
{
    /**
     * Create a new class instance.
     */
    public function __construct(
        public readonly string $name,
        public readonly int $project_id,
        public readonly array $member_ids,

    ){}

    public static function fromArray(array $data): self
    {
        return new self(
           $data['name'],
           $data['project_id'],
           $data['member_ids'],
        );
    }
}
