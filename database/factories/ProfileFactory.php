<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Profile>
 */
class ProfileFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'user_id' => function () {
                return \App\Models\User::factory()->create()->id;
            },
            'followers_count' => $this->faker->numberBetween(0, 1000),
            'language' => $this->faker->languageCode,
            'city' => $this->faker->optional()->city,
            'country' => $this->faker->optional()->country,
            'age' => $this->faker->optional()->numberBetween(18, 80),
        ];
    }
}