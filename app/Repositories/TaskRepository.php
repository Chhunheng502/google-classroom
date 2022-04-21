<?php

namespace App\Repositories;

use App\Events\ClassworkUpdated;
use Illuminate\Database\Eloquent\Model;

class TaskRepository
{
    protected $model;

    public function __construct(Model $model)
    {
        $this->model = $model;
    }
    
    public function create($request, $classroom_id)
    {
        // NOTE [need improvement - request is coupling with create functions]
        $task = $this->model->create(
            $request->merge(['classroom_id' => $classroom_id])->all()
        );
        
        $task->classworkDetail()->create($request->validated());
        $task->taskDetail()->create($request->validated());

        return $task;
    }

    public function update($request, $classroom_id, $task_id)
    {
        $task = $this->model->find($task_id);
        
        $task->update(
            $request->merge(['classroom_id' => $classroom_id])->all()
        );

        $task->classworkDetail->update($request->validated());
        $task->taskDetail->update($request->validated());
        
        ClassworkUpdated::dispatch($task);
        
        return $task;
    }
}