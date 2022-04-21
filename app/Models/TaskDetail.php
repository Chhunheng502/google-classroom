<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TaskDetail extends Model
{
    use HasFactory;

    protected $fillable = ['points', 'due_date'];

    protected function dueDate(): Attribute
    {
        return Attribute::make(
            set: fn ($value) => $value == '' ? null : date('Y-m-d H:i:s' , strtotime($value)),
        );
    }

    public function task()
    {
        return $this->morphTo();
    }
}
