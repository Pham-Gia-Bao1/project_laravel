<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Model>
 */
class CoffeShopFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public  function definition()
    {
        return [
            'name' => $this->faker->company,
            'address' => $this->faker->address,
            'phone_number' => $this->faker->phoneNumber,
            'opening_hours' => $this->faker->dateTimeBetween('-1 year', 'now'), // Random opening hours within the past year and now
            'created_at' => $this->faker->dateTimeBetween('-1 year', 'now'), // Random created_at date within the past year and now
            'updated_at' => $this->faker->dateTimeBetween('-1 year', 'now'), // Random updated_at date within the past year and now
        ];
    }
}
