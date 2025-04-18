<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Facades\Hash;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Restaurant>
 */
class RestaurantFactory extends Factory
{
    protected static ?string $password;

    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'name' => fake()->company(),
            'localisation' => fake()->numberBetween(100000,9999999999),
            'nb_places' => fake()->numberBetween(1,20),
            'type_id' => fake()->numberBetween(1,3),
            'user_id' => fake()->numberBetween(1,10),
        ];
    }
}
