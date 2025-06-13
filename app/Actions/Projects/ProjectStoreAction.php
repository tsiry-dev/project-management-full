<?php

namespace App\Actions\Projects;

use App\Dtos\Projects\ProjectDataDTO;
use App\Services\Projects\ProjectService;

class ProjectStoreAction
{
    /**
     * Create a new class instance.
     */
    public function __construct(
        protected ProjectService $service
    ) {}

    public function handle(ProjectDataDTO $data)
    {
        return $this->service->store($data);
    }
}
