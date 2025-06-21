<?php

namespace App\Http\Controllers;

use App\Actions\Tasks\TaskStoreAction;
use App\Actions\Tasks\TaskUpdateStatuAction;
use App\Actions\Tasks\TaskUpdateStatuToCompletedAction;
use App\Actions\Tasks\TaskUpdateStatuToNotStartedAction;
use App\Actions\Tasks\TaskUpdateStatuToPendingAction;
use App\Dtos\Tasks\TaskStoreDTO;
use App\Http\Requests\Tasks\TaskStoreRequest;
use App\Http\Requests\Tasks\TaskUpdateStatusRequest;
use App\Models\Task;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class TaskController extends Controller
{
    public function store(TaskStoreRequest $request, TaskStoreAction $action): JsonResponse
    {
        $task = $action->handle(TaskStoreDTO::fromArray($request->all()));

        return response()->json([
            'message' => 'La tâche a été créé avec succès',
            'task' => $task,
        ],201);
    }

    public function updateStatuToNotStarted(TaskUpdateStatusRequest $request, TaskUpdateStatuAction $action): JsonResponse
    {

        $task = $action->handle($request->id, Task::NOT_STARTED);

        return response()->json([
            'message' => 'Tâche déplacée vers "non commencée"',
            'task' => $task,
        ]);
    }

    public function updateStatuToPending(TaskUpdateStatusRequest $request, TaskUpdateStatuAction $action): JsonResponse
    {
        $task = $action->handle($request->id, Task::PENDING);

        return response()->json([
            'message' => 'Tâche déplacée vers "en cours"',
            'task' => $task,
        ]);
    }

    public function updateStatuToCompleted(TaskUpdateStatusRequest $request, TaskUpdateStatuAction $action): JsonResponse
    {
        $task = $action->handle($request->id, Task::COMPLETED);

        return response()->json([
            'message' => 'Tâche déplacée vers "terminée"',
            'task' => $task,
        ]);
    }

}
