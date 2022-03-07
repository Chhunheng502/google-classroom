<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\ClassroomRequest;
use App\Models\Classroom;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Str;

class ClassroomController extends Controller
{
    public function index() : JsonResponse
    {
        return response()->json([
            'data' => Classroom::all()
        ]);
    }

    public function store(ClassroomRequest $request) : JsonResponse
    {
        return response()->json([
			'data' => Classroom::create(
                $request->merge(['code' => Str::random(7)])->all()
            )
		], 201); 
    }

    public function update(ClassroomRequest $request, Classroom $classroom) : JsonResponse
    {
        return response()->json([
			'data' => tap($classroom)->update($request->all())
		], 201); 
    }

    public function destroy(Classroom $classroom) : Response
    {
        $classroom->delete();

        return response([], 204);
    }
}
