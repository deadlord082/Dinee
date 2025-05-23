<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Review>
 */
class ReviewFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'stars' => fake()->numberBetween(1,5),
            'comment' => fake()->realText(50),
            'restaurant_id' => fake()->numberBetween(1,10),
            'user_id' => fake()->numberBetween(1,10),
        ];
    }
}
