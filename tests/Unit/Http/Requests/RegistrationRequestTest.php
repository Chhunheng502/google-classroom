<?php

namespace Tests\Unit\Http\Requests;

use App\Models\Registration;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Laravel\Sanctum\Sanctum;
use Tests\TestCase;

class RegistrationRequestTest extends TestCase
{
    use RefreshDatabase;

    private string $routePrefix = 'api.registrations.';

    /** @test */
    public function role_is_required()
    {
        $this->assertValidationError('role', null);
    }

    /** @test */
    public function role_is_either_student_or_teacher()
    {
        $this->assertValidationError('role', 'admin');
    }

    /** @test */
    public function classroom_id_is_required()
    {
        $this->assertValidationError('classroom_id', null);
    }
    
    /** @test */
    public function classroom_id_must_be_integer()
    {
        $this->assertValidationError('classroom_id', 'not integer');
    }

    public function assertValidationError(string $validatedField, ?string $brokenRule)
    {
        Sanctum::actingAs(
            User::factory()->create(),
            ['*']
        );

        $registration = Registration::factory()->make([
            $validatedField => $brokenRule
        ]);

        $this->postJson(
            route($this->routePrefix . 'store'),
            $registration->toArray()
        )->assertJsonValidationErrors($validatedField);
    }
}
