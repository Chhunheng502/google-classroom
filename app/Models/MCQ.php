<?php

namespace App\Models;

use App\Interfaces\TaskEloquent\TaskEloquentInterface;
use App\Traits\ClassworkEloquent;
use App\Traits\TaskEloquent;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MCQ extends Model implements TaskEloquentInterface
{
    use HasFactory, ClassworkEloquent, TaskEloquent;

    protected $table = 'multiple_choices_questions';

    protected $fillable = ['classroom_id', 'options'];
}
