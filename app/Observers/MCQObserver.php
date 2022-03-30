<?php

namespace App\Observers;

use App\Models\MCQ;

class MCQObserver
{
    public function deleted(MCQ $mcq)
    {
        $mcq->classworkDetail()->delete();
        $mcq->taskDetail()->delete();
    }
}
