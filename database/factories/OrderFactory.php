<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\User;
use App\Models\Car;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Order>
 */
class OrderFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $user_id = User::all()->random()->id;
        $car_id = Car::all()->random()->id;
        return [
            
            'price' => fake()->numberBetween(100000, 10000000),
            'location' => fake()->address(),
            'payment_method' => fake()->word(),
            'user_id' => $user_id, 
            'car_id' => $car_id,


        ];
    }
}
