<?php

namespace Tests\Unit\Tasks;

use App\Dtos\Tasks\TaskStoreDTO;
use App\Models\Task;
use PhpParser\Node\Expr\Cast\Object_;
use Tests\TestCase;

class TaskTest extends TestCase
{
   public function test_task_create_with_task_member_create_with_transaction()
   {
        // Simule les données du DTO
        $dto = new TaskStoreDTO('Tâche 1', 1, [2, 3]);

        // Mock de la création de la tâche
        Task::shouldReceive('create')
            ->once()
            ->with(['project_id' => 1, 'name' => 'Tâche 1', 'status' => Task::NOT_STARTED])
            ->andReturn((object)['id' => 10]);

    }
}
