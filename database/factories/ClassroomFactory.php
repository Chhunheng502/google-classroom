<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Classroom>
 */
class ClassroomFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'name' => $this->faker->sentence(),
            'description' => $this->faker->sentences(3, true),
            'section' => Str::random($this->faker->numberBetween(3, 5)),
            'room' => Str::random($this->faker->numberBetween(3, 5)),
            'subject' => $this->faker->words(3, true),
            'code' => Str::random(7),
            'theme_path' => 'images/img_breakfast.jpg'
        ];
    }
}
