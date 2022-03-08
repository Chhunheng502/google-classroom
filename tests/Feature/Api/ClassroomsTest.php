<?php

namespace Tests\Feature\Api;

use App\Models\Classroom;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Laravel\Sanctum\Sanctum;
use Tests\TestCase;

class ClassroomsTest extends TestCase
{
    use RefreshDatabase;

    private string $routePrefix = 'api.classrooms.';

    /** @test */
    public function can_get_all_classrooms()
    {
        Sanctum::actingAs(
            User::factory()->create(),
            ['*']
        );

        $classroom = Classroom::factory()->create();

        $response = $this->getJson(route($this->routePrefix . 'index'));

        $response->assertOk();

        $response->assertJson([
            'data' => [
                [
                    'id' => $classroom->id,
                    'name' => $classroom->name,
                    'description' => $classroom->description,
                    'section' => $classroom->section,
                    'room' => $classroom->room,
                    'subject' => $classroom->subject,
                    'code' => $classroom->code,
                    'theme_path' => $classroom->theme_path
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
                'description' => $newClassroom['description'],
                'section' => $newClassroom['section'],
                'room' => $newClassroom['room'],
                'subject' => $newClassroom['subject']
            ]
        ]);

        $this->assertDatabaseHas('classrooms', $newClassroom->toArray());
    }

    /** @test */
	public function can_update_a_classroom()
	{
        Sanctum::actingAs(
            User::factory()->create(),
            ['*']
        );

		$existingClassroom = Classroom::factory()->create();
		$newClassroom = Classroom::factory()->make();
		  
		$response = $this->putJson(
			route($this->routePrefix . 'update', $existingClassroom),
			$newClassroom->toArray()
		);
        
		$response->assertJson([
			'data' => [
				'id' => $existingClassroom->id,
				'name' => $newClassroom->name,
                'description' => $newClassroom->description,
                'section' => $newClassroom->section,
                'room' => $newClassroom->room,
                'subject' => $newClassroom->subject
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
        Sanctum::actingAs(
            User::factory()->create(),
            ['*']
        );
        
		$existingClassroom = Classroom::factory()->create();

		$this->deleteJson(
			route($this->routePrefix . 'destroy', $existingClassroom)
		)->assertNoContent(); 

		$this->assertDatabaseMissing(  
			'classrooms',  
			$existingClassroom->toArray()  
		);
	}
}
