<?php

namespace App\Traits;

use App\Http\Resources\TaskResource;
use App\Models\Classroom;
use Illuminate\Http\Response;

trait TaskControllerResources
{
    // NOTE [this function might not be required]
    public function index(Classroom $classroom)
    {
        $tasks = $classroom->{__('task-eloquent.' . get_classwork_name(get_class($this->taskEloquent)))};

        return TaskResource::collection($tasks);
    }

    public function show(Classroom $classroom, $task_id)
    {
        $tasks = $classroom->{__('task-eloquent.' . get_classwork_name(get_class($this->taskEloquent)))};                    

        // FIXME [handle exception when record is not found]
        return new TaskResource($tasks->find($task_id));
    }

    public function destroy(Classroom $classroom, $task_id)
    {
        $tasks = $classroom->{__('task-eloquent.' . get_classwork_name(get_class($this->taskEloquent)))};

        $tasks->find($task_id)->delete();
        
        return response([], Response::HTTP_NO_CONTENT);
    }
}