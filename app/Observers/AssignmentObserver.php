<?php

namespace App\Observers;

use App\Models\Assignment;

class AssignmentObserver
{
    // NOTE [this event might not be triggered due to some issue - database connection , ect.]
    public function deleted(Assignment $assignment)
    {
        $assignment->classworkDetail()->delete();
        $assignment->taskDetail()->delete();
    }
}
