<?php

namespace App\Models;

use App\Models\Nulls\NullAdmin;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Classroom extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'description', 'section', 'room', 'subject', 'code', 'theme_path'];

    // NOTE [foreign key binding doesn't work]
    public function admin()
    {
        return $this->belongsTo(User::class, 'user_id', 'id')->withDefault(
            NullAdmin::make()->toArray()
        );
    }

    public function registrations()
    {
        return $this->hasMany(Registration::class);
    }

    public function topics()
    {
        return $this->hasMany(Topic::class);
    }

    public function materials()
    {
        return $this->hasMany(Material::class);
    }

    public function assignments()
    {
        return $this->hasMany(Assignment::class);
    }

    public function quizzes()
    {
        return $this->hasMany(Quiz::class);
    }

    public function saqs()
    {
        return $this->hasMany(SAQ::class);
    }

    public function mcqs()
    {
        return $this->hasMany(MCQ::class);
    }
}
