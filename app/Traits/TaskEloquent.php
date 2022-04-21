<?php

namespace App\Traits;

use App\Models\StudentWork;
use App\Models\TaskDetail;

trait TaskEloquent
{
    public function taskDetail()
    {
        return $this->morphOne(TaskDetail::class, 'task');
    }

    public function studentWorks()
    {
        return $this->morphMany(StudentWork::class, 'task');
    }
}