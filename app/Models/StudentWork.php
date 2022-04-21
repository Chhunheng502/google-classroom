<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class StudentWork extends Model
{
    use HasFactory;

    protected $fillable = ['registration_id', 'task_id', 'task_type', 'answers', 'mark'];

    public function taskType(): Attribute
    {
        return Attribute::make(
            get: fn ($value) => get_classwork_name($value),
            set: fn ($value) => revert_classwork_name($value),
        );
    }

    public function task()
    {
        return $this->morphTo();
    }

    public function registration()
    {
        return $this->belongsTo(Registration::class, 'registration_id');
    }
}
