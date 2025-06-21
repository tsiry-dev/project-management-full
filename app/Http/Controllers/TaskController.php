<?php

namespace App\Http\Controllers;

use App\Actions\Tasks\TaskStoreAction;
use App\Dtos\Tasks\TaskStoreDTO;
use App\Http\Requests\Tasks\TaskStoreRequest;
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
}
