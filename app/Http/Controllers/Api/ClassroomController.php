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
        return new ClassroomCollection(Auth::user()->classrooms);
    }
 
    public function store(ClassroomRequest $request)
    {
        return new ClassroomResource(Auth::user()->classrooms()->create($request->all()));
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
        // FIXME [must change to cloud storage]
        File::delete(public_path('storage/') . $classroom->theme_path);
        
        $classroom->delete();
        
        return response([], 204);
    }
}
