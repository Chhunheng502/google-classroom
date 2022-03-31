<?php

namespace App\Traits;

use App\Factories\TaskFactory;
use App\Http\Resources\TaskResource;
use App\Models\Classroom;
use Illuminate\Http\Response;

trait TaskControllerResources
{
    // NOTE [this function might not be required]
    public function index(Classroom $classroom)
    {
        $tasks = (new TaskFactory)->create($this->taskEloquent)->for($classroom);

        return TaskResource::collection($tasks);
    }

    public function show(Classroom $classroom, $task_id)
    {
        $tasks = (new TaskFactory)->create($this->taskEloquent)
                                ->for($classroom)
                                ->find($task_id);

        // FIXME [handle exception when record is not found]
        return new TaskResource($tasks);
    }

    public function destroy(Classroom $classroom, $task_id)
    {
        // (new TaskFactory)->create($classroom)
        //                 ->find($task_id)
        //                 ->delete();
        
        return response([], Response::HTTP_NO_CONTENT);
    }
}