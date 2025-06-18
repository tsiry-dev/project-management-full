<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasOne;

class Project extends Model
{
    /** @use HasFactory<\Database\Factories\ProjectFactory> */
    use HasFactory;

    const NOT_STARTED = 0;
    const PENDING = 1;
    const COMPLETED = 2;


    protected $fillable = [
       'name',
       'slug',
       'status',
       'start_date',
       'end_date',
    ];

    public function task_progress(): HasOne
    {
        return $this->hasOne(TaskProgress::class, 'project_id');
    }
}
