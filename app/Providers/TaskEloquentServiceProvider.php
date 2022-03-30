<?php

namespace App\Providers;

use App\Http\Controllers\Api\Classwork\Task\AssignmentController;
use App\Http\Controllers\Api\Classwork\Task\MCQController;
use App\Http\Controllers\Api\Classwork\Task\QuizController;
use App\Http\Controllers\Api\Classwork\Task\SAQController;
use App\Interfaces\TaskEloquent\TaskEloquentInterface;
use App\Models\Assignment;
use App\Models\MCQ;
use App\Models\Quiz;
use App\Models\SAQ;
use Illuminate\Support\ServiceProvider;

class TaskEloquentServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->when(AssignmentController::class)
                    ->needs(TaskEloquentInterface::class)
                    ->give(function () {
                        return $this->app->make(Assignment::class);
                    });

        $this->app->when(QuizController::class)
                    ->needs(TaskEloquentInterface::class)
                    ->give(function () {
                        return $this->app->make(Quiz::class);
                    });

        $this->app->when(SAQController::class)
                    ->needs(TaskEloquentInterface::class)
                    ->give(function () {
                        return $this->app->make(SAQ::class);
                    });

        $this->app->when(MCQController::class)
                    ->needs(TaskEloquentInterface::class)
                    ->give(function () {
                        return $this->app->make(MCQ::class);
                    });
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }
}
