<?php

namespace App\Repositories;

use App\Contracts\ProjectRepositoryContract;
use App\Dtos\Projects\ProjectDataDTO;
use App\Dtos\Projects\UpdateDTO;
use App\Helper\StrHelper;
use App\Models\Project;
use App\Models\TaskProgress;
use Illuminate\Pagination\LengthAwarePaginator;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class ProjectRepository implements ProjectRepositoryContract
{

    public function store(ProjectDataDTO $data): Project
    {

        return DB::transaction(function () use ($data) {

            $project = Project::create([
                'name' => $data->name,
                'slug' => StrHelper::slug($data->name),
                'status' => Project::NOT_STARTED,
                'start_date' => $data->start_date,
                'end_date' => $data->end_date,
            ]);

            TaskProgress::create([
                'project_id' => $project->id,
                'pinned' => TaskProgress::NOT_PINNED,
                'progress' => (int) TaskProgress::PURCENT_PROGRESS,
            ]);

            return $project;
        });
    }

    public function getAllWithRelation(?string $search = null): LengthAwarePaginator
    {
         $query = Project::with(['task_progress']);

         if($search) {
            $query->where('name', 'like', '%'.$search.'%');
         }
         return $query->paginate(5);
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
