<?php

namespace Tests\Feature\Api;

use App\Models\Registration;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Laravel\Sanctum\Sanctum;
use Tests\TestCase;

class RegistrationsTest extends TestCase
{
    use RefreshDatabase;

    private string $routePrefix = 'api.registrations.';

    /** @test */
    public function can_get_all_registrations()
    {
        $user = Sanctum::actingAs(
            User::factory()->create(),
            ['*']
        );

        $registration = Registration::factory()->for($user)->create();

        $response = $this->getJson(route($this->routePrefix . 'index'));

        $response->assertOk();

        $response->assertJson([
            'data' => [
                [
                    'role' => $registration->role,
                    'classroom' => [
                        'id' => $registration->classroom->id,
                        'name' => $registration->classroom->name,
                        'section' => $registration->classroom->section,
                        'theme_path' => $registration->classroom->theme_path,
                        'meeting_link' => $registration->classroom->meeting_link,
                    ],
                    'admin' => [
                        'id' => $registration->classroom->admin->id,
                        'name' => 'Admin Not Found',
                        'photo_url' => $registration->classroom->admin->photo_url
                    ]
                ]
            ]
        ]);
    }

    /** @test */
    public function can_store_a_registration()
    {
        $user = Sanctum::actingAs(
            User::factory()->create(),
            ['*']
        );

        $newRegistration = Registration::factory()->for($user)->make();

        $response = $this->postJson(route($this->routePrefix . 'store'), $newRegistration->toArray());

        $response->assertCreated();

        $response->assertJson([
            'data' => [
                'role' => $newRegistration->role,
                'classroom' => [
                    'id' => $newRegistration->classroom->id,
                    'name' => $newRegistration->classroom->name,
                    'section' => $newRegistration->classroom->section,
                    'theme_path' => $newRegistration->classroom->theme_path,
                    'meeting_link' => $newRegistration->classroom->meeting_link,
                ],
                'admin' => [
                    'id' => $newRegistration->classroom->admin->id,
                    'name' => $newRegistration->classroom->admin->name,
                    'photo_url' => $newRegistration->classroom->admin->photo_url
                ]
            ]
        ]);

        $this->assertDatabaseHas('registrations', [
            'role' => $newRegistration->role,
            'user_id' => $user->id,
            'classroom_id' => $newRegistration->classroom_id
        ]);
    }
}
