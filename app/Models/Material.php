<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Material extends Model
{
    use HasFactory;

    protected $fillable = ['classroom_id'];

    public function classworkDetail()
    {
        return $this->morphOne(ClassworkDetail::class, 'classwork');
    }

    // NOTE [maybe we can create has one through (to topic)???]
    public function topic()
    {
        return $this->morphOne(TopicContent::class, 'classwork');
    }
}
