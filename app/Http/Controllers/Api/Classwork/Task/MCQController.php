<?php

namespace App\Http\Controllers\Api\Classwork\Task;

use App\Http\Controllers\Controller;
use App\Http\Requests\MCQRequest;
use App\Http\Resources\TaskResource;
use App\Models\MCQ;
use App\Repositories\TaskRepository;
use Illuminate\Http\Request;

class MCQController extends Controller
{
    protected $taskRepository;

    public function __construct(MCQ $mcq)
    {
        $this->taskRepository = new TaskRepository($mcq);
    }
    
    public function store(MCQRequest $request)
    {
        return new TaskResource(
            $this->taskRepository->create($request)
        );
    }
}
