<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TaskProgress extends Model
{
    /** @use HasFactory<\Database\Factories\TaskProgressFactory> */
    use HasFactory;

    protected $fillable = [
        'project_id',
        'pinned',
        'progress',
    ];

    const NOT_PINNED = 0;
    const PINNED = 1;

    const PURCENT_PROGRESS = 0;
}
