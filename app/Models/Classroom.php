<?php

namespace App\Models;

use App\Models\Nulls\NullTeacher;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Classroom extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'description', 'section', 'room', 'subject', 'code', 'theme_path'];

    // NOTE [foreign key binding doesn't work]
    public function teacher()
    {
        return $this->belongsTo(User::class, 'user_id', 'id')->withDefault(
            NullTeacher::make()->toArray()
        );
    }
}
