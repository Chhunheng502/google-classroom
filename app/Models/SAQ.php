<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SAQ extends Model
{
    use HasFactory;

    protected $table = 'short_answer_questions';

    protected $fillable = ['classroom_id', 'question'];

    public function classworkDetail()
    {
        return $this->morphOne(ClassworkDetail::class, 'classwork');
    }

    public function taskDetail()
    {
        return $this->morphOne(TaskDetail::class, 'task');
    }

    public function topic()
    {
        return $this->morphOne(TopicContent::class, 'classwork');
    }
}
