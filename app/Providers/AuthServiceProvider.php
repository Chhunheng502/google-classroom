<?php

namespace App\Providers;

use App\Models\Classroom;
use App\Models\User;
use App\Policies\ClassroomPolicy;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Gate;
use Laravel\Sanctum\PersonalAccessToken;

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

        // NOTE [you don't need to customer Auth user by your own, you can
        // use Auth::user() right after you include bearer token in your request]
        // => delete it in the new version
        
        // Auth::viaRequest('custom-token', function (Request $request) {
            
        //     return PersonalAccessToken::findToken($request->token)->tokenable;
        // });

        Gate::define('isAdmin', function (User $user, Classroom $classroom) {
            return $user->id === $classroom->user_id;
        });
    }
}
