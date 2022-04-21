<?php

namespace App\Traits;

use App\Models\ClassworkDetail;
use App\Models\NoTopicClassworkMapping;
use App\Models\TopicContent;

trait ClassworkEloquent
{
    public function classworkDetail()
    {
        return $this->morphOne(ClassworkDetail::class, 'classwork');
    }

    public function topic()
    {
        return $this->morphOne(TopicContent::class, 'classwork');
    }

    public function noTopic()
    {
        return $this->morphOne(NoTopicClassworkMapping::class, 'classwork');
    }
}