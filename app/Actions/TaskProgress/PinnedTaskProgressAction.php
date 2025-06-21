<?php

namespace App\Actions\TaskProgress;

use App\Repositories\TaskProgressRepository;

class PinnedTaskProgressAction
{
    public function __construct(
        protected TaskProgressRepository $taskProgressRepository
    ){}

    public function handle(int $id): bool
    {
        return $this->taskProgressRepository->pin($id);
    }
}
