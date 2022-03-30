<?php

namespace App\Policies;

use App\Models\Classroom;
use App\Models\Registration;
use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;

// NOTE [Need improvement]
class ClassroomPolicy
{
    use HandlesAuthorization;

    public function viewAnyClasswork(User $user, Classroom $classroom)
    {
        return Registration::where('user_id', $user->id)
                            ->where('classroom_id', $classroom->id)
                            ->exists();
    }

    public function view(User $user, Classroom $classroom)
    {
        return Registration::where('user_id', $user->id)
                            ->where('classroom_id', $classroom->id)
                            ->exists();
    }

    public function update(User $user, Classroom $classroom)
    {
        return $user->id === $classroom->admin->id;
    }

    public function delete(User $user, Classroom $classroom)
    {
        return $user->id === $classroom->admin->id;
    }
}
