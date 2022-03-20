<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TopicContent extends Model
{
    use HasFactory;

    protected $fillable = ['topic_id'];

    public function classwork()
    {
        return $this->morphTo();
    }
}
