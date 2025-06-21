<?php

namespace App\Actions\Projects;

use App\Repositories\ProjectRepository;
use Illuminate\Pagination\LengthAwarePaginator;

class ProjectAllAction
{
    public function __construct(
        protected ProjectRepository $projectRepository
    ){}

    public function handle(?string $search = null): LengthAwarePaginator
    {
         return $this->projectRepository->getAllWithRelation($search);
    }
}
