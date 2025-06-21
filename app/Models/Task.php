<?php

namespace App\Models;

use COM;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Task extends Model
{
    /** @use HasFactory<\Database\Factories\TaskFactory> */
    use HasFactory;

    const NOT_STARTED = 0;
    const PENDING = 1;
    const COMPLETED = 2;

    protected $guarded = [];


    public function members(): BelongsToMany
    {
        return $this->belongsToMany(Member::class, 'task_members');
    }
}
