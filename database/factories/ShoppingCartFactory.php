<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Model>
 */
class ShoppingCartFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'user_id' => $this->faker->numberBetween(1, 5),
            'product_id' => $this->faker->numberBetween(1, 5),
            'total' => $this->faker->randomFloat(2, 10, 100), // Random total between 10 and 100 with 2 decimal places
            'quantity' => $this->faker->numberBetween(1, 10), // Random quantity between 1 and 10
            'added_at' => $this->faker->dateTimeBetween('-1 month', 'now') // Random date added within the past month and now
        ];
    }
}
