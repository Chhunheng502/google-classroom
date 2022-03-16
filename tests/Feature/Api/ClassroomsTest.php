<?php

namespace Tests\Feature\Api;

use App\Models\Classroom;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Support\Facades\Storage;
use Laravel\Sanctum\Sanctum;
use Tests\TestCase;

class ClassroomsTest extends TestCase
{
    use RefreshDatabase;

    private string $routePrefix = 'api.classrooms.';

    /** @test */
    public function can_get_all_classrooms()
    {
        $user = Sanctum::actingAs(
            User::factory()->create(),
            ['*']
        );

        $classroom = Classroom::factory()->for($user, 'admin')->create();

        $response = $this->getJson(route($this->routePrefix . 'index'));

        $response->assertOk();

        $response->assertJson([
            'data' => [
                [
                    'id' => $classroom->id,
                    'name' => $classroom->name,
                    'section' => $classroom->section,
                    'theme_path' => $classroom->theme_path,
                    'meeting_link' => $classroom->meeting_link
                ]
            ]
        ]);
    }

    /** @test */
    public function can_store_a_classroom()
    {
        Sanctum::actingAs(
            User::factory()->create(),
            ['*']
        );

        $newClassroom = collect(Classroom::factory()->raw())->except(['code']);

        $response = $this->postJson(
            route($this->routePrefix . 'store'),
            $newClassroom->toArray()
        );

        $response->assertCreated();

        $response->assertJson([
            'data' => [
                'name' => $newClassroom['name'],
                'section' => $newClassroom['section'],
                'theme_path' => $newClassroom['theme_path'],
            ]
        ]);

        $this->assertDatabaseHas('classrooms', $newClassroom->toArray());
    }

    /** @test */
    public function can_show_a_classroom()
    {
        $user = Sanctum::actingAs(
            User::factory()->create(),
            ['*']
        );

        $classroom = Classroom::factory()->for($user, 'admin')->create();

        $response = $this->getJson(route($this->routePrefix . 'show', $classroom->id));

        $response->assertOk();

        $response->assertJson([
            'data' =>   [
                'id' => $classroom->id,
                'name' => $classroom->name,
                'description' => $classroom->description,
                'section' => $classroom->section,
                'room' => $classroom->room,
                'subject' => $classroom->subject,
                'theme_path' => $classroom->theme_path,
                'meeting_link' => $classroom->meeting_link,
                'admin' => [
                    'id' => $user->id,
                    'name' => $user->name,
                    'email' => $user->email,
                    'photo_url' => $user->photo_url
                ]
            ]
        ]);
    }

    /** @test */
    public function can_update_a_classroom()
    {
        $user = Sanctum::actingAs(
            User::factory()->create(),
            ['*']
        );

        $existingClassroom = Classroom::factory()->for($user, 'admin')->create();
        $newClassroom = collect(Classroom::factory()->raw())->except(['code']);

        $response = $this->putJson(
            route($this->routePrefix . 'update', $existingClassroom),
            $newClassroom->toArray()
        );

        $response->assertJson([
            'data' => [
                'id' => $existingClassroom->id,
                'name' => $newClassroom['name'],
                'section' => $newClassroom['section'],
                'theme_path' => $newClassroom['theme_path']
            ]
        ]);

        $this->assertDatabaseHas(
            'classrooms',
            $newClassroom->toArray()
        );
    }

    /** @test */
    public function can_delete_a_classroom()
    {
        $user = Sanctum::actingAs(
            User::factory()->create(),
            ['*']
        );

        $existingClassroom = Classroom::factory()->for($user, 'admin')->create();

        $this->deleteJson(
            route($this->routePrefix . 'destroy', $existingClassroom)
        )->assertNoContent();

        Storage::disk('public')->assertMissing($existingClassroom->theme_path);

        $this->assertDatabaseMissing(
            'classrooms',
            $existingClassroom->toArray()
        );
    }
}
