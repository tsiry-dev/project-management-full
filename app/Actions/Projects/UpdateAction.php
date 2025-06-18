<?php

namespace App\Actions\Projects;

use App\Dtos\Projects\UpdateDTO;
use App\Repositories\ProjectRepository;
use App\Services\Projects\ProjectService;

class UpdateAction
{
    /**
     * Create a new class instance.
     */
    public function __construct(
        protected ProjectRepository $projectRepository
    )
    {}

    public function handle(int $id, UpdateDTO $data)
    {
        return $this->projectRepository->update($id, $data);
    }
}
