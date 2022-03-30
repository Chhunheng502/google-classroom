<?php

namespace App\Observers;

use App\Models\SAQ;

class SAQObserver
{
    public function deleted(SAQ $saq)
    {
        $saq->classworkDetail()->delete();
        $saq->taskDetail()->delete();
    }
}
