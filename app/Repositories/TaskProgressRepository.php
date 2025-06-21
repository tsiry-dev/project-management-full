<?php

namespace App\Repositories;

use App\Models\TaskProgress;

class TaskProgressRepository
{
    public function pin(int $id): bool
    {
        // On vérifie s’il existe au moins une ligne à mettre à jour
        $updated = TaskProgress::where('project_id', $id)
            ->update([
                'pinned' => TaskProgress::PINNED,
            ]);

        return $updated > 0;
    }
}
