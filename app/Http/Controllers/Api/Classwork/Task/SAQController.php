<?php

namespace App\Http\Controllers\Api\Classwork\Task;

use App\Http\Controllers\Controller;
use App\Http\Requests\SAQRequest;
use App\Http\Resources\TaskResource;
use App\Interfaces\TaskEloquent\TaskEloquentInterface;
use App\Models\Classroom;
use App\Models\SAQ;
use App\Repositories\TaskRepository;
use App\Traits\TaskControllerResources;
use Illuminate\Http\Request;

class SAQController extends Controller
{
    use TaskControllerResources;
    
    protected $taskEloquent;
    protected $taskRepository;

    public function __construct(TaskEloquentInterface $taskEloquent)
    {
        $this->taskEloquent = $taskEloquent;
        $this->taskRepository = new TaskRepository(new SAQ);
    }
    
    public function store(SAQRequest $request, Classroom $classroom)
    {
        return new TaskResource(
            $this->taskRepository->create($request, $classroom->id)
        );
    }

    public function update(SAQRequest $request, Classroom $classroom, $task_id)
    {
        return new TaskResource(
            $this->taskRepository->update($request, $classroom->id, $task_id)
        );
    }
}
