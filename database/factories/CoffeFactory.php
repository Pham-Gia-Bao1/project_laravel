<?php

namespace Database\factories;

class CoffeFactory
{

    public function definition()
    {
        $faker = \Faker\Factory::create(); // Add this line to create an instance of Faker
        $floatPart = $faker->randomFloat(2, 1, 10);
        $integerPart = $faker->numberBetween(100, 999);
        

        //        create random data
        return [
            'name' => 'Coffe ' . $faker->word,
            'size' => $faker->randomElement(['Small', 'Medium', 'Large']),
            'weight' => $faker->numberBetween(100, 500) . 'g',
            'price' => $faker->randomFloat(3, 100, 500),
            'images' => json_encode(['item-' . $faker->numberBetween(1, 5) . '.png', 'item-' . $faker->numberBetween(1, 5) . '.png', 'item-' . $faker->numberBetween(1, 5) . '.png', 'item-' . $faker->numberBetween(1, 5) . '.png', 'item-' . $faker->numberBetween(1, 5) . '.png']),
            'reviews' => $faker->sentence,
            'rating' => $faker->randomFloat(1, 1, 5),
            'quantity' => $faker->randomNumber(2), // Assuming quantity is a number
            'coffe_shop_id' => $faker->numberBetween(1, 10),
            'created_at' => now(),
            'updated_at' => now(),
        ];
    }
}
