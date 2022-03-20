<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MCQ extends Model
{
    use HasFactory;

    protected $table = 'multiple_choices_questions';

    protected $fillable = ['classroom_id', 'options'];

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
