<?php

namespace Tests\Unit\Http\Requests;

use App\Models\Classroom;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Storage;
use Tests\TestCase;

class ThemeUploadRequestTest extends TestCase
{
    use RefreshDatabase;

    private string $routePrefix = 'api.classrooms.theme.';

    /** @test */
    public function theme_must_be_a_file()
    {
        $validatedField = 'theme_path';
        $brokenRule = 'not-file';

        $classroom = Classroom::factory()->create();

        $updatedField = [
            $validatedField => $brokenRule
        ];

        $this->putJson(
            route($this->routePrefix . 'update', $classroom),
            $updatedField
        )->assertJsonValidationErrors($validatedField);
    }

    /** @test */
    public function theme_must_have_specified_image_extensions()
    {
        Storage::fake('public');

        $validatedField = 'theme_path';
        $brokenRule = UploadedFile::fake()->image('test.pdf');

        $classroom = Classroom::factory()->create();

        $updatedField = [
            $validatedField => $brokenRule
        ];

        $this->putJson(
            route($this->routePrefix . 'update', $classroom),
            $updatedField
        )->assertJsonValidationErrors($validatedField);
    }
}
