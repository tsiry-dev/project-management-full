<?php

namespace App\Contracts;

use App\Dtos\Projects\ProjectDataDTO;
use App\Dtos\Projects\UpdateDTO;
use App\Models\Project;

interface ProjectRepositoryContract
{
    public function store(ProjectDataDTO $data): Project;
}
