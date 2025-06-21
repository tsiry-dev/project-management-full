<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasOne;

class TaskMember extends Model
{
    protected $guarded = [];

    public function member(): HasOne
    {
        return $this->hasOne(Member::class, 'id');
    }

}
