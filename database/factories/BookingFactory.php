<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Booking>
 */
class BookingFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'restaurant_id' => fake()->numberBetween(0, 9),
            'user_id' => fake()->numberBetween(0,9),
            'dishe_id' => fake()->numberBetween(0,9),
            'statut_id' => fake()->numberBetween(0,2),
            'name' => fake()->name(),
            'nb_places' => fake()->randomNumber(2),
            'date' => fake()->date(),
        ];
    }
}
