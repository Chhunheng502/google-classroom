<?php

namespace App\Observers;

use App\Models\Quiz;

class QuizObserver
{
    public function deleted(Quiz $quiz)
    {
        $quiz->classworkDetail()->delete();
        $quiz->taskDetail()->delete();
    }
}
