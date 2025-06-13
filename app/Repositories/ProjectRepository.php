<?php

namespace App\Repositories;

use App\Dtos\Projects\ProjectDataDTO;
use App\Models\Project;
use Illuminate\Support\Str;

class ProjectRepository
{
    /**
     * Create a new class instance.
     */
    public function __construct()
    {
        //
    }

    public function store(ProjectDataDTO $data)
    {
        return Project::create([
           'name' => $data->name,
           'slug' => Str::slug($data->name) . '-'. Str::random(10),
           'status' => Project::NOT_STARTED,
           'start_date' => $data->start_date,
           'end_date' => $data->end_date,
        ]);
    }
}
