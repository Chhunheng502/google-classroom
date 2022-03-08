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
        Sanctum::actingAs(
            User::factory()->create(),
            ['*']
        );

        $validatedField = 'name';
        $brokenRule = null;
        
        $classroom = Classroom::factory()->make([
            $validatedField => $brokenRule
        ]);
   
        $this->postJson(
            route($this->routePrefix . 'store'),
            $classroom->toArray()
        )->assertJsonValidationErrors($validatedField);

        // Update assertion
        $existingClassroom = Classroom::factory()->create(); 
        $newClassroom = Classroom::factory()->make([ 
            $validatedField => $brokenRule 
        ]); 

        $this->putJson(
            route($this->routePrefix . 'update', $existingClassroom),
            $newClassroom->toArray()
        )->assertJsonValidationErrors($validatedField);
    }

    /** @test */
    public function name_must_not_exceed_255_characters()  
    {
        Sanctum::actingAs(
            User::factory()->create(),
            ['*']
        );

        $validatedField = 'name';  
        $brokenRule = str::random(256);  
        
        $classroom = Classroom::factory()->make([  
            $validatedField => $brokenRule  
        ]);  

        $this->postJson(  
            route($this->routePrefix . 'store'),  
            $classroom->toArray()  
        )->assertJsonValidationErrors($validatedField);  
    }

    /** @test */
    public function section_must_not_exceed_255_characters()  
    {
        Sanctum::actingAs(
            User::factory()->create(),
            ['*']
        );

        $validatedField = 'section';  
        $brokenRule = str::random(256);  
        
        $classroom = Classroom::factory()->make([  
            $validatedField => $brokenRule  
        ]);  

        $this->postJson(  
            route($this->routePrefix . 'store'),  
            $classroom->toArray()  
        )->assertJsonValidationErrors($validatedField);  
    }

    /** @test */
    public function room_must_not_exceed_255_characters()
    {
        Sanctum::actingAs(
            User::factory()->create(),
            ['*']
        );

        $validatedField = 'room';
        $brokenRule = str::random(256);
        
        $classroom = Classroom::factory()->make([
            $validatedField => $brokenRule
        ]);

        $this->postJson(
            route($this->routePrefix . 'store'),
            $classroom->toArray()
        )->assertJsonValidationErrors($validatedField);
    }

    /** @test */
    public function subject_must_not_exceed_255_characters()
    {
        Sanctum::actingAs(
            User::factory()->create(),
            ['*']
        );

        $validatedField = 'subject';
        $brokenRule = str::random(256);
        
        $classroom = Classroom::factory()->make([
            $validatedField => $brokenRule
        ]);
    
        $this->postJson(
            route($this->routePrefix . 'store'),
            $classroom->toArray()
        )->assertJsonValidationErrors($validatedField);
    }
}
