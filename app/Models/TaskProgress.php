<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TaskProgress extends Model
{
    /** @use HasFactory<\Database\Factories\TaskProgressFactory> */
    use HasFactory;

    const NOT_PINNED = 0;
    const PINNED = 1;
}
