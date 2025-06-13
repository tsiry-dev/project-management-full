<?php

namespace App\Dtos\Projects;

class ProjectDataDTO
{
    /**
     * Create a new class instance.
     */
    public function __construct(
        public readonly string $name,
        public readonly string $status,
        public readonly string $start_date,
        public readonly string $end_date,
    ){}

    public static function fromArray(array $data): self
    {
        return new self(
            $data['name'],
            $data['status'],
            $data['start_date'],
            $data['end_date'],
        );
    }
}
