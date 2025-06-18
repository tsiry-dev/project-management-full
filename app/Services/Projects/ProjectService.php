<?php

namespace App\Services\Projects;

use App\Contracts\ProjectRepositoryContract;
use App\Dtos\Projects\ProjectDataDTO;
use App\Dtos\Projects\UpdateDTO;
use App\Repositories\ProjectRepository;

class ProjectService
{
    /**
     * Create a new class instance.
     */
    public function __construct(
        protected ProjectRepositoryContract $repository,
        protected ProjectRepository $projectRepository
    ){}

    public function store(ProjectDataDTO $data)
    {
        return $this->repository->store($data);
    }

}
