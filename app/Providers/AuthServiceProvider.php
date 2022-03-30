<?php

namespace App\Providers;

use App\Models\Classroom;
use App\Models\Registration;
use App\Models\User;
use App\Policies\ClassroomPolicy;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * The policy mappings for the application.
     *
     * @var array<class-string, class-string>
     */
    protected $policies = [
        Classroom::class => ClassroomPolicy::class
    ];

    /**
     * Register any authentication / authorization services.
     *
     * @return void
     */
    public function boot()
    {
        $this->registerPolicies();

        Gate::define('isAdminOrTeacher', function (User $user, Classroom $classroom) {
            return Registration::where('user_id', $user->id)
                            ->where('classroom_id', $classroom->id)
                            ->where('role', 'admin')
                            ->orWhere('role', 'teacher')
                            ->exists();
        });
    }
}
