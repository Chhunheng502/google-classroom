<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Classroom extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'description', 'section', 'room', 'subject', 'code', 'theme_path'];

    public static function test($num)
    {
        return 'working';
    }
}
