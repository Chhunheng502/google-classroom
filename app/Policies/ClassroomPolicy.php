<?php

namespace App\Policies;

use App\Models\Classroom;
use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class ClassroomPolicy
{
    use HandlesAuthorization;

    public function update(User $user, Classroom $classroom)
    {
        return $user->id === $classroom->admin->id;
    }

    public function delete(User $user, Classroom $classroom)
    {
        return $user->id === $classroom->admin->id;
    }
}
