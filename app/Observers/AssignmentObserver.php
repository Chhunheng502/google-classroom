<?php

namespace App\Observers;

use App\Interfaces\TaskEloquent\TaskEloquentInterface;
use App\Models\Assignment;
use App\Traits\TaskObserver;
use Illuminate\Support\Facades\App;

class AssignmentObserver
{
    use TaskObserver;

    public function __construct()
    {
        App::bind(TaskEloquentInterface::class, Assignment::class);
    }
}
