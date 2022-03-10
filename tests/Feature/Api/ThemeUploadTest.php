<?php

namespace Tests\Feature\Api;

use App\Models\Classroom;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Storage;
use Laravel\Sanctum\Sanctum;
use Tests\TestCase;

class ThemeUploadTest extends TestCase
{
    use RefreshDatabase;

    private string $routePrefix = 'api.classrooms.theme';

    /** @test */
    public function can_upload_a_theme()
    {
        Sanctum::actingAs(
            User::factory()->create(),
            ['*']
        );

        Storage::fake('public');

        $existingClassroom = Classroom::factory()->create();

        $updatedField = [
            'theme_path' => $file = UploadedFile::fake()->image('test.jpg')
        ];

        $response = $this->putJson(
            route($this->routePrefix . '.update', $existingClassroom),
            $updatedField
        );

        Storage::disk('public')->assertExists('images/' . $file->hashName());

        $response->assertJson([
            'data' => [
                'id' => $existingClassroom->id,
                'theme_path' => 'images/' . $file->hashName()
            ]
        ]);
    }
}
