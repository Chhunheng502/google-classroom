<?php

namespace App\Http\Controllers\Api\Classwork\Task;

use App\Http\Controllers\Controller;
use App\Http\Requests\SAQRequest;
use App\Http\Resources\TaskResource;
use App\Models\SAQ;
use App\Repositories\TaskRepository;
use Illuminate\Http\Request;

class SAQController extends Controller
{
    protected $taskRepository;

    public function __construct(SAQ $saq)
    {
        $this->taskRepository = new TaskRepository($saq);
    }
    
    public function store(SAQRequest $request)
    {
        return new TaskResource(
            $this->taskRepository->create($request)
        );
    }
}
