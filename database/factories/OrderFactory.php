<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Model>
 */
class OrderFactory extends Factory
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
            'product_ids' => json_encode([$this->faker->numberBetween(1, 5),$this->faker->numberBetween(1, 5)]),
            'total_amount' => $this->faker->randomFloat(2, 10, 1000), // Random total amount between 10 and 1000
            'status' => $this->faker->randomElement(['pending', 'processing', 'canceled', 'delivered']),
            'order_date' => $this->faker->dateTimeBetween('-1 year', 'now'), // Random order date within the past year and now
            'created_at' => $this->faker->dateTimeBetween('-1 year', 'now'), // Random created_at date within the past year and now
            'updated_at' => $this->faker->dateTimeBetween('-1 year', 'now'), // Random updated_at date within the past year and now
        ];
    }
}
