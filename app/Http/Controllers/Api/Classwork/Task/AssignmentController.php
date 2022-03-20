<?php

namespace App\Http\Controllers\Api\Classwork\Task;

use App\Http\Controllers\Controller;
use App\Http\Requests\AssignmentRequest;
use App\Http\Resources\TaskResource;
use App\Models\Assignment;
use App\Repositories\TaskRepository;
use Illuminate\Http\Request;

class AssignmentController extends Controller
{
    protected $taskRepository;

    public function __construct(Assignment $assignment)
    {
        $this->taskRepository = new TaskRepository($assignment);
    }
    
    public function store(AssignmentRequest $request)
    {
        return new TaskResource(
            $this->taskRepository->create($request)
        );
    }
}
