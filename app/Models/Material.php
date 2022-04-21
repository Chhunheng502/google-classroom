<?php

namespace App\Models;

use App\Traits\ClassworkEloquent;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Material extends Model
{
    use HasFactory, ClassworkEloquent;

    protected $fillable = ['classroom_id'];
}
