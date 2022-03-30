<?php

namespace App\Models;

use App\Interfaces\TaskEloquent\TaskEloquentInterface;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Assignment extends Model implements TaskEloquentInterface
{
    use HasFactory;

    protected $fillable = ['classroom_id'];

    // FIXME [use trait to generalize this]
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
