<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\ClassroomRequest;
use App\Http\Resources\ClassroomCollection;
use App\Http\Resources\ClassroomResource;
use App\Models\Classroom;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;

class ClassroomController extends Controller
{
    public function index()
    {
        // NOTE [do we even need index?]
        return new ClassroomCollection(Auth::user()->classrooms);
    }
 
    public function store(ClassroomRequest $request)
    {
        $classroom = Auth::user()->classrooms()->create($request->all());

        Auth::user()->registrations()->create([
            'role' => 'admin',
            'classroom_id' => $classroom->id,
        ]);

        return new ClassroomResource($classroom);
    }

    public function show(Classroom $classroom)
    {
        return response()->json([
            'data' => $classroom->load('admin')
        ]);
    }

    public function update(ClassroomRequest $request, Classroom $classroom)
    {
        return new ClassroomResource(
            tap($classroom->withoutRelations())
                ->update($request->validated())
        );
    }

    public function destroy(Classroom $classroom): Response
    {
        // FIXME [must change to cloud storage and change theme_path to theme_url]
        File::delete(public_path('storage/') . $classroom->theme_path);
        
        $classroom->delete();
        
        return response([], Response::HTTP_NO_CONTENT);
    }
}
