<?php

namespace App\Http\Controllers\Api\Classwork\Task;

use App\Http\Controllers\Controller;
use App\Http\Requests\AssignmentRequest;
use App\Http\Resources\TaskResource;
use App\Interfaces\TaskEloquent\TaskEloquentInterface;
use App\Models\Assignment;
use App\Models\Classroom;
use App\Repositories\TaskRepository;
use App\Traits\TaskControllerResources;
use Illuminate\Http\Request;

class AssignmentController extends Controller
{
    use TaskControllerResources;

    protected $taskEloquent;
    protected $taskRepository;

    public function __construct(TaskEloquentInterface $taskEloquent)
    {
        $this->taskEloquent = $taskEloquent;
        $this->taskRepository = new TaskRepository(new Assignment); // NOTE [is this style ok?]
    }

    // NOTE [you can't use $classroom_id otherwise policy used in route won't work]
    public function store(AssignmentRequest $request, Classroom $classroom)
    {
        return new TaskResource(
            $this->taskRepository->create($request, $classroom->id)
        );
    }

    public function update(AssignmentRequest $request, Classroom $classroom, $task_id)
    {
        return new TaskResource(
            $this->taskRepository->update($request, $classroom->id, $task_id)
        );
    }
}
