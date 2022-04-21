<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Topic extends Model
{
    use HasFactory;

    protected $fillable = ['name'];

    public function contents()
    {
        return $this->hasMany(TopicContent::class)->orderBy('updated_at');
    }
}
