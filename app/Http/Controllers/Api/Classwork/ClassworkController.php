<?php

namespace App\Http\Controllers\Api\Classwork;

use App\Http\Controllers\Controller;
use App\Http\Resources\TopicResource;
use App\Models\Classroom;
use Illuminate\Http\Request;

class ClassworkController extends Controller
{
    public function index(Classroom $classroom)
    {
        return TopicResource::collection(
            $classroom->topics
        );
    }

    public function show()
    {

    }
}
