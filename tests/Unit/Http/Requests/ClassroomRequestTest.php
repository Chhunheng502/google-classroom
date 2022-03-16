<?php

namespace Tests\Unit\Http\Requests;

use App\Models\Classroom;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Support\Str;
use Laravel\Sanctum\Sanctum;
use Tests\TestCase;

class ClassroomRequestTest extends TestCase
{
    use RefreshDatabase;

    private string $routePrefix = 'api.classrooms.';

    /** @test */
    public function name_is_required()
    {
        $this->assertValidationError('name', null);
    }

    /** @test */
    public function name_must_not_exceed_255_characters()
    {
        $this->assertValidationError('name', str::random(256));
    }

    /** @test */
    public function code_is_not_required()
    {
        Sanctum::actingAs(
            User::factory()->create(),
            ['*']
        );

        // code is already included
        $classroom = Classroom::factory()->make();

        $this->postJson(
            route($this->routePrefix . 'store'),
            $classroom->toArray()
        )->assertJsonMissingExact([
            'data' => [
                'code' => $classroom->code
            ]
        ]);
    }

    /** @test */
    public function section_must_not_exceed_255_characters()
    {
        $this->assertValidationError('section', str::random(256));
    }

    /** @test */
    public function room_must_not_exceed_255_characters()
    {
        $this->assertValidationError('room', str::random(256));
    }
    
    /** @test */
    public function subject_must_not_exceed_255_characters()
    {
        $this->assertValidationError('section', str::random(256));   
    }

    public function assertValidationError(string $validatedField, ?string $brokenRule)
    {
        $user = Sanctum::actingAs(
            User::factory()->create(),
            ['*']
        );

        $classroom = Classroom::factory()->make([
            $validatedField => $brokenRule
        ]);

        $this->postJson(
            route($this->routePrefix . 'store'),
            $classroom->toArray()
        )->assertJsonValidationErrors($validatedField);

        // Update assertion
        $existingClassroom = Classroom::factory()->for($user, 'admin')->create();
        $newClassroom = Classroom::factory()->make([
            $validatedField => $brokenRule
        ]);

        $this->putJson(
            route($this->routePrefix . 'update', $existingClassroom),
            $newClassroom->toArray()
        )->assertJsonValidationErrors($validatedField);
    }
}
