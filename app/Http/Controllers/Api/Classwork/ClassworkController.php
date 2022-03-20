<?php

namespace App\Http\Controllers\Api\Classwork;

use App\Http\Controllers\Controller;
use App\Http\Resources\TopicResource;
use App\Models\Topic;
use Illuminate\Http\Request;

class ClassworkController extends Controller
{
    public function index($classroom_id)
    {
        return TopicResource::collection(
            Topic::with('contents.classwork.classworkDetail')
                ->where('classroom_id', $classroom_id)
                ->get()
        );
    }

    public function show()
    {

    }
}
