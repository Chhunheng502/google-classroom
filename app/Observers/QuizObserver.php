<?php

namespace App\Observers;

use App\Interfaces\TaskEloquent\TaskEloquentInterface;
use App\Models\Quiz;
use App\Traits\TaskObserver;
use Illuminate\Support\Facades\App;

class QuizObserver
{
    use TaskObserver;

    public function __construct()
    {
        App::bind(TaskEloquentInterface::class, Quiz::class);
    }
}
