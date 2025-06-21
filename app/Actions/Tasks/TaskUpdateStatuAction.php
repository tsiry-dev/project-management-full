<?php

namespace App\Actions\Tasks;

use App\Models\Task;
use App\Repositories\TaskRepository;

class TaskUpdateStatuAction
{
    public function __construct(protected TaskRepository $repository) {}

    public function handle(int $taskId, int $status)
    {
        return $this->repository->updateStatus($taskId, $status);
    }
}
