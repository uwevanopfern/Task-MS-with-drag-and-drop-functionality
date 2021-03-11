<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Project extends Model
{
    protected $guarded = [];

    /**
     * This relationship means that each project will have many tasks
     */
    public function tasks()
    {
        return $this->hasMany(Task::class);
    }
}
