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
        return TaskResource::collection(
            $classroom->{__('task-eloquent.' . get_classwork_name(get_class($this->taskEloquent)))}
        );
    }

    public function show(Classroom $classroom, $task_id)
    {
        // FIXME [handle exception when record is not found]
        return new TaskResource(
            $classroom->{__('task-eloquent.' . get_classwork_name(get_class($this->taskEloquent)))}
                    ->find($task_id)
        );
    }

    // FIXME [its foreign child records should be deleted too]
    public function destroy(Classroom $classroom, $task_id)
    {
        $classroom->{__('task-eloquent.' . get_classwork_name(get_class($this->taskEloquent)))}
                ->find($task_id)
                ->delete();
        
        return response([], Response::HTTP_NO_CONTENT);
    }
}