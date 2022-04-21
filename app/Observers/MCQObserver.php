<?php

namespace App\Observers;

use App\Interfaces\TaskEloquent\TaskEloquentInterface;
use App\Models\MCQ;
use App\Traits\TaskObserver;
use Illuminate\Support\Facades\App;

class MCQObserver
{
    use TaskObserver;

    public function __construct()
    {
        App::bind(TaskEloquentInterface::class, MCQ::class);
    }
}
