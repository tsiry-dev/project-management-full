<?php

namespace App\Repositories;

use App\Dtos\Tasks\TaskStoreDTO;
use App\Models\Task;
use App\Models\TaskMember;
use Illuminate\Support\Facades\DB;

class TaskRepository
{
    public function store(TaskStoreDTO $data): Task
    {
         return DB::transaction(function() use ($data) {
            $task = Task::create([
                    'project_id' => $data->project_id,
                    'name' => $data->name,
                    'status' => Task::NOT_STARTED,
            ]);

            //Une seule requette au lieu de foreach
            $members = collect($data->member_ids)->map(function ($memberId) use ($data, $task) {
                return [
                    'project_id' => $data->project_id,
                    'task_id' => $task->id,
                    'member_id' => $memberId,
                    'created_at' => now(),
                    'updated_at' => now(),
                ];
            })->toArray();

            TaskMember::insert($members);

            return $task;
         });
    }
}
