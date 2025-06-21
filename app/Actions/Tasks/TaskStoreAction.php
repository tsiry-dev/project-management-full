<?php

namespace App\Actions\Tasks;

use App\Dtos\Tasks\TaskStoreDTO;
use App\Models\Task;
use App\Repositories\TaskRepository;

class TaskStoreAction
{
    /**
     * Create a new class instance.
     */
    public function __construct(
        protected TaskRepository $taskRepository
    ){}

    public function handle(TaskStoreDTO $data): Task
    {
       return $this->taskRepository->store($data);
    }
}
