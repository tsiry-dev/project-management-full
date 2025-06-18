<?php

namespace App\Dtos\Projects;

use App\Models\Project;

class UpdateDTO
{
    /**
     * Create a new class instance.
     */
    public function __construct(
        public readonly string $name,
        public readonly string $start_date,
        public readonly string $end_date,
        public readonly ?int $status,
        public readonly ?int $id,
    ){}

    public static function fromArray(array $data): self
    {
        return new self(
            $data['name'],
            $data['start_date'],
            $data['end_date'],
            $data['status'] ?? Project::NOT_STARTED,
            $data['id'],
        );
    }


}
