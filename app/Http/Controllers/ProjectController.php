<?php

namespace App\Http\Controllers;

use App\Actions\Projects\ProjectAllAction;
use App\Actions\Projects\ProjectFindAction;
use App\Actions\Projects\ProjectStoreAction;
use App\Actions\Projects\UpdateAction;
use App\Actions\TaskProgress\PinnedTaskProgressAction;
use App\Dtos\Projects\ProjectDataDTO;
use App\Dtos\Projects\UpdateDTO;
use App\Http\Requests\Projects\ProjectStoreRequest;
use App\Http\Requests\Projects\ProjectUpdateRequest;
use App\Models\Project;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;
use Symfony\Component\HttpFoundation\Response;

class ProjectController extends Controller
{

    public function index(Request $request, ProjectAllAction $action)
    {

        $search = $request->query('search');
        $projects = $action->handle($search);

        return response()->json([
            'message' => 'Les projets sont récupérés avec succès',
            'data' => $projects
        ],200);
    }

    public function show(ProjectFindAction $action, string $slug): JsonResponse
    {
        $project = $action->handle($slug);

        if (!$project) {
            return response()->json([
                'message' => 'Le projet que vous cherchez n\'existe pas.'
            ], 404);
        }

        return response()->json([
            'message' => 'Le projet a été récupéré avec succès',
            'project' => $project
        ], 200);
    }

    public function store(ProjectStoreRequest $request, ProjectStoreAction $action)
    {
          $project = $action->handle(ProjectDataDTO::fromArray($request->all()));

          return response()->json([
               'message' => 'Le projet a été créé avec succès',
               'project' => $project,
          ],201);
    }

    public function update(ProjectUpdateRequest $request, UpdateAction $action)
    {
        $project = $action->handle($request->id, UpdateDTO::fromArray($request->all()));

        return response()->json([
           'message' => 'Le projet a été mis à jour avec succès',
           'project' => $project
        ],201);
    }

    public function pinned(Request $request,PinnedTaskProgressAction $action)
    {
          $id = $request->id;
          $success = $action->handle($id);

          if(!$success) {
             return response()->json([
                'message' => 'Le projet n\'existe pas',
             ],Response::HTTP_NOT_FOUND);
          }

          return response()->json([
            'message' => 'La progression a été épinglé',
          ],201);
    }

    public function count()
    {
        return response()->json([
            'count' => Project::count()
        ],200);
    }
}
