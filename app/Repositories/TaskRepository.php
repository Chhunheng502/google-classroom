<?php

namespace App\Repositories;

use Illuminate\Database\Eloquent\Model;

class TaskRepository
{
    protected $model;

    public function __construct(Model $model)
    {
        $this->model = $model;
    }
    
    public function create($request)
    {
        $task = $this->model->create($request->validated());
        
        $task->classworkDetail()->create($request->validated());
        $task->taskDetail()->create($request->validated());

        if ($request->topic_id) {
            $task->topic()->create([
                'topic_id' => $request->topic_id
            ]);
        }

        return $task;
    }
}