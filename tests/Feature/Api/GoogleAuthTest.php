<?php

namespace Tests\Feature\Api;

use App\Models\Classroom;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Laravel\Socialite\Contracts\Factory as SocialiteFactory;
use Laravel\Socialite\Facades\Socialite;
use Laravel\Socialite\One\User as SocialiteUser;
use Laravel\Socialite\Two\GoogleProvider;
use Mockery;
use Mockery\MockInterface;
use Tests\TestCase;

class GoogleAuthTest extends TestCase
{
    use RefreshDatabase;

    private string $routePrefix = 'api.google.';

    /** @test */
    public function it_can_redirect_to_google()
    {
        $response = $this->call('GET', route($this->routePrefix . 'login'));

        $this->assertStringContainsString('accounts.google.com/o/oauth2/auth', $response->getTargetUrl());
    }

    /** @test */
    public function it_retrieves_google_request_and_creates_a_new_user()
    {
        $this->mockSocialiteFacade();

        $this->call('GET', route($this->routePrefix . 'callback'))
            ->assertJson(['success' => true]);

        $this->assertDatabaseHas('users', [
            'name' => 'test',
            'email' => 'test@gmail.com',
        ]);
    }

    /**
     * Mock the Socialite Factory, so we can hijack the OAuth Request.
     * @param  string  $email
     * @param  string  $token
     * @param  int $id
     * @return void
     */
    public function mockSocialiteFacade()
    {
        $socialiteUser = $this->createMock(SocialiteUser::class);
        $socialiteUser->id = 1;
        $socialiteUser->name = 'test';
        $socialiteUser->email = 'test@gmail.com';
        $socialiteUser->token = 'test token';

        $provider = Mockery::mock(
            GoogleProvider::class,
            function(MockInterface $mock) use ($socialiteUser) {
                $mock->shouldReceive('user')
                    ->andReturn($socialiteUser);
            }
        );

        //problem here [cannont create an instance of Socialite]
        $stub = Socialite::shouldReceive('drive')->with('google')->andReturn($provider);

        // $stub = Mockery::mock(
        //     SocialiteFactory::class,
        //     function(MockInterface $mock) use ($provider) {
        //         $mock->shouldReceive('drive')
        //             ->with('google')
        //             ->andReturn($provider);
        //     }
        // );

        $this->instance(Socialite::class, $stub);
    }
}
