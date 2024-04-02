<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Model>
 */
class CategoryFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        $faker = \Faker\Factory::create(); // Add this line to create an instance of Faker
        $categories = ['Patch Roast','Costa Coffee','Dunkin','Nescafe','LavAzza','Classico','Starbucks'];
        $index = array_rand($categories); // Chọn một index ngẫu nhiên trong mảng categories
        return [
            'name' => $categories[$index] // Lấy tên từ mảng categories
        ];
    }
}
