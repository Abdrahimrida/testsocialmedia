<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Thread>
 */
class ThreadFactory extends Factory
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
            'profile_id' => function () {
                return \App\Models\Profile::factory()->create()->id;
            },
            'title' => $this->faker->sentence,
            'content' => $this->faker->paragraph,
            'likes_count' => $this->faker->numberBetween(0, 1000),
        ];
    }
}