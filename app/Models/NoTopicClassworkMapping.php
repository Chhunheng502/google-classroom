<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class NoTopicClassworkMapping extends Model
{
    use HasFactory;

    protected $fillable = ['classroom_id'];
    
    public function classwork()
    {
        return $this->morphTo();
    }
}
