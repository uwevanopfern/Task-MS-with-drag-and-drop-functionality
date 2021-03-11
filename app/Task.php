<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Task extends Model
{
    protected $guarded = [];

    /**
     * This relationship means that each task will have project it belongs in
     */
    public function project()
    {
        return $this->belongsTo(Project::class);
    }
}
