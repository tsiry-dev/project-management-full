<?php

namespace App\Repositories;

use App\Contracts\ProjectRepositoryContract;
use App\Dtos\Projects\ProjectDataDTO;
use App\Dtos\Projects\UpdateDTO;
use App\Helper\StrHelper;
use App\Models\Project;
use Illuminate\Pagination\LengthAwarePaginator;
use Illuminate\Support\Str;

class ProjectRepository implements ProjectRepositoryContract
{

    public function store(ProjectDataDTO $data): Project
    {
        return Project::create([
           'name' => $data->name,
           'slug' => StrHelper::slug($data->name),
           'status' => Project::NOT_STARTED,
           'start_date' => $data->start_date,
           'end_date' => $data->end_date,
        ]);
    }

    public function getAllWithRelation(): LengthAwarePaginator
    {
        return Project::with(['task_progress'])->paginate(10);
    }

    public function update(int $id, UpdateDTO $data): ?Project
    {
        $project = Project::findOrFail($id);

        $project->update([
            'name' => $data->name,
            'slug' => StrHelper::slug($data->name),
            'status' => $data->status ?? $project->status,
            'start_date' => $data->start_date,
            'end_date' => $data->end_date,
        ]);

        return $project;
    }
}
