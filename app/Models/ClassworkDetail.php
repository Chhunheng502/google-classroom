<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ClassworkDetail extends Model
{
    use HasFactory;

    protected $fillable = ['title', 'description', 'attachments', 'topic_id'];

    public function classwork()
    {
        return $this->morphTo();
    }
}
