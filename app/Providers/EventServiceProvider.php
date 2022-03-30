<?php

namespace App\Providers;

use App\Models\Assignment;
use App\Models\Material;
use App\Models\MCQ;
use App\Models\Quiz;
use App\Models\SAQ;
use App\Observers\AssignmentObserver;
use App\Observers\MaterialObserver;
use App\Observers\MCQObserver;
use App\Observers\QuizObserver;
use App\Observers\SAQObserver;
use Illuminate\Auth\Events\Registered;
use Illuminate\Auth\Listeners\SendEmailVerificationNotification;
use Illuminate\Foundation\Support\Providers\EventServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Event;
use SocialiteProviders\Google\GoogleExtendSocialite;
use SocialiteProviders\Manager\SocialiteWasCalled;

class EventServiceProvider extends ServiceProvider
{
    /**
     * The event listener mappings for the application.
     *
     * @var array<class-string, array<int, class-string>>
     */
    protected $listen = [
        Registered::class => [
            SendEmailVerificationNotification::class,
        ],
        SocialiteWasCalled::class => [
            GoogleExtendSocialite::class.'@handle',
        ],
    ];

    /**
     * Register any events for your application.
     *
     * @return void
     */
    public function boot()
    {
        Material::observe(MaterialObserver::class);
        Assignment::observe(AssignmentObserver::class);
        Quiz::observe(QuizObserver::class);
        SAQ::observe(SAQObserver::class);
        MCQ::observe(MCQObserver::class);
    }

    /**
     * Determine if events and listeners should be automatically discovered.
     *
     * @return bool
     */
    public function shouldDiscoverEvents()
    {
        return false;
    }
}
