<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Contact>
 */
class ContactFactory extends Factory
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
            'first_name' => fake()->firstName,
            'last_name' => fake()->lastName,
            'email' => fake()->safeEmail(),
            'message' => fake()->sentence(),
            'status' => $this->faker->randomElement(['Responsed', 'Have not responsed'])
        ];
    }
}
