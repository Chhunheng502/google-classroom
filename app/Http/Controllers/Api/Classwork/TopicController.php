<?php

namespace App\Http\Controllers\Api\Classwork;

use App\Http\Controllers\Controller;
use App\Http\Requests\TopicRequest;
use App\Http\Resources\TopicResource;
use App\Models\Classroom;
use Illuminate\Http\Request;

class TopicController extends Controller
{
    public function index(Classroom $classroom)
    {
        return response()->json([
            'data' => $classroom->topics
        ]);
    }

    public function store(TopicRequest $request, Classroom $classroom)
    {
        $topic = $classroom->topics()->create($request->validated());

        return new TopicResource($topic);
    }
}
