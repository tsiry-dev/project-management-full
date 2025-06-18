<?php

namespace App\Http\Controllers;

use App\Actions\Projects\ProjectAllAction;
use App\Actions\Projects\ProjectStoreAction;
use App\Actions\Projects\UpdateAction;
use App\Dtos\Projects\ProjectDataDTO;
use App\Dtos\Projects\UpdateDTO;
use App\Http\Requests\Projects\ProjectStoreRequest;
use App\Http\Requests\Projects\ProjectUpdateRequest;
use App\Models\Project;
use Illuminate\Http\Request;

class ProjectController extends Controller
{

    public function index(ProjectAllAction $action)
    {
        $projects = $action->handle();

        return response()->json([
            'message' => 'Les projets sont récupérés avec succès',
            'data' => $projects
        ]);
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
        ]);
    }
}
