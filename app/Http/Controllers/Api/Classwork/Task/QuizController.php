<?php

namespace App\Http\Controllers\Api\Classwork\Task;

use App\Http\Controllers\Controller;
use App\Http\Requests\QuizRequest;
use App\Http\Resources\TaskResource;
use App\Models\Quiz;
use App\Repositories\TaskRepository;
use Illuminate\Http\Request;

class QuizController extends Controller
{
    protected $taskRepository;

    public function __construct(Quiz $quiz)
    {
        $this->taskRepository = new TaskRepository($quiz);
    }
    
    public function store(QuizRequest $request)
    {
        return new TaskResource(
            $this->taskRepository->create($request)
        );
    }
}
