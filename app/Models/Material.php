<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Material extends Model
{
    use HasFactory;

    // NOTE use details instead of task_details in here

    public function attachments()
    {
        return $this->morphToMany(Attachment::class, 'classwork');
    }
}
