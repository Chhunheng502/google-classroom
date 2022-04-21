<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\StudentWorkRequest;
use App\Http\Resources\StudentWorkCollection;
use App\Http\Resources\StudentWorkResource;
use App\Models\Classroom;
use App\Models\User;
use Illuminate\Http\Request;

// FIXME [need a policy to permit only for user with student role]
class StudentWorkController extends Controller
{
    public function index(Classroom $classroom)
    {
        return new StudentWorkCollection($classroom->studentWorks);
    }

    // NOTE [only users with student role can make the request]
    public function store(StudentWorkRequest $request, Classroom $classroom, User $user)
    {
        $registration = $classroom->registrations()->where('user_id', $user->id)->first();

        $student_work = $registration->works()->create($request->validated());

        return new StudentWorkResource($student_work);
    }

    public function show(Classroom $classroom, User $user)
    {
        $student = $classroom->registrations()->where('user_id', $user->id)->first()->user;

        return new StudentWorkCollection($student->works);
    }
}
