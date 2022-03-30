<?php

namespace App\Http\Controllers\Api\Classwork\Task;

use App\Http\Controllers\Controller;
use App\Http\Requests\MCQRequest;
use App\Http\Resources\TaskResource;
use App\Interfaces\TaskEloquent\TaskEloquentInterface;
use App\Models\Classroom;
use App\Models\MCQ;
use App\Repositories\TaskRepository;
use App\Traits\TaskControllerResources;
use Illuminate\Http\Request;

class MCQController extends Controller
{
    use TaskControllerResources;

    protected $taskEloquent;
    protected $taskRepository;

    public function __construct(TaskEloquentInterface $taskEloquent)
    {
        $this->taskEloquent = $taskEloquent;
        $this->taskRepository = new TaskRepository(new MCQ);
    }
    
    public function store(MCQRequest $request, Classroom $classroom)
    {
        return new TaskResource(
            $this->taskRepository->create($request, $classroom->id)
        );
    }

    public function update(MCQRequest $request, Classroom $classroom, $task_id)
    {
        return new TaskResource(
            $this->taskRepository->update($request, $classroom->id, $task_id)
        );
    }
}
