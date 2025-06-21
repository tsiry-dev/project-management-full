<?php

namespace App\Actions\Projects;

use App\Models\Project;
use App\Repositories\ProjectRepository;

class ProjectFindAction
{
    public function __construct(
        private ProjectRepository $projectRepository
    ){}

    public function handle(string $slug): ?Project
    {
        return $this->projectRepository->find($slug);
    }
}
