<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Model>
 */
class CardFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'user_id' => \App\Models\User::factory()->create()->id,
            'first_name' => $this->faker->firstName,
            'last_name' => $this->faker->lastName,
            'card_number' => $this->faker->creditCardNumber,
            'expiration_date' => $this->faker->date,
            'cvv' => $this->faker->randomNumber(3),
            'phone_number' => $this->faker->randomNumber(8, true) * 10,
            'set_default_card' => $this->faker->boolean,
        ];
    }
}
