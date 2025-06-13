<?php

namespace App\Http\Controllers;

use App\Actions\Projects\ProjectStoreAction;
use App\Dtos\Projects\ProjectDataDTO;
use App\Http\Requests\Projects\ProjectStoreRequest;
use App\Models\Project;
use Illuminate\Http\Request;

class ProjectController extends Controller
{
    public function store(ProjectStoreRequest $request, ProjectStoreAction $action)
    {
          $project = $action->handle(ProjectDataDTO::fromArray($request->all()));

          return response()->json([
               'message' => 'Le projet a été créé avec succès',
               'project' => $project,
          ],201);
    }
}
