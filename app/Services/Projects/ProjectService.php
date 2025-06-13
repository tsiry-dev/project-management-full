<?php

namespace App\Services\Projects;

use App\Dtos\Projects\ProjectDataDTO;
use App\Repositories\ProjectRepository;

class ProjectService
{
    /**
     * Create a new class instance.
     */
    public function __construct(
        protected ProjectRepository $repository
    ){}

    public function store(ProjectDataDTO $data)
    {
        return $this->repository->store($data);
    }
}
