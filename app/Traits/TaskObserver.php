<?php

namespace App\Traits;

use App\Interfaces\TaskEloquent\TaskEloquentInterface;

trait TaskObserver
{
    public function created(TaskEloquentInterface $task)
    {
        // SUGGESTION [better not use else condition]
        if (request()->topic_id) {
            $task->topic()->create([
                'topic_id' => request()->topic_id
            ]);
        } else {
            $task->noTopic()->create([
                'classroom_id' => request()->classroom->id
            ]);
        }
    }

    // NOTE [this event might not be triggered due to some issue - database connection , ect.]
    public function deleted(TaskEloquentInterface $task)
    {
        $task->classworkDetail()->delete();
        $task->taskDetail()->delete();

        $task->topic()->delete();
        $task->noTopic()->delete();
    }
}