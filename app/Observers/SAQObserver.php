<?php

namespace App\Observers;

use App\Interfaces\TaskEloquent\TaskEloquentInterface;
use App\Models\SAQ;
use App\Traits\TaskObserver;
use Illuminate\Support\Facades\App;

class SAQObserver
{
    use TaskObserver;

    public function __construct()
    {
        App::bind(TaskEloquentInterface::class, SAQ::class);
    }
}
