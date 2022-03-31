<?php

namespace App\Factories;

use App\Interfaces\TaskEloquent\TaskEloquentInterface;
use App\Models\Classroom;

// NOTE [might misuse]
class TaskFactory
{
    protected $model;

    public function __construct(TaskEloquentInterface $model = null)
    {
        $this->model = $model;
    }

    public function create(TaskEloquentInterface $taskEloquent)
    {
        // FIXME [create an exception here]

        return new TaskFactory($taskEloquent);
    }

    public function for(Classroom $classroom)
    {
        return $classroom->{__('task-eloquent.' . get_classwork_name(get_class($this->model)))};
    }
}