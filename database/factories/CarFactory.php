<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Car>
 */
class CarFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            
             'name' => fake()->name(),
             'brand' => fake()->word(),
             'n_of_pieces' => fake()->numberBetween(0, 100),
             'fuel_type' => fake()->word(),
             'buy' => fake()->numberBetween(0, 100),
             'price' => fake()->numberBetween(100000, 10000000),
             'year' => fake()->year(),
             'country' => fake()->country(),
             'color' => fake()->safeColorName(),
             'filename' => $this->faker->randomElement(['1.jpeg','2.jpg','3.jpg','4.jpg','5.jpg','6.jpg','7.jpg','8.jpg','9.jpg','10.jpg',]),


        ];
    }
}
