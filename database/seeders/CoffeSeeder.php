<?php
// run seededr to add data into database
// php artisan db:seed --class=CoffeSeeder
namespace Database\Seeders;

use Database\Factories\CoffeFactory;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CoffeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     * php artisan db:seed --class=CoffeSeeder
     *
     * @return void
     */
    public function run()
    {
        //
//        insert data in table
        $coffees = [
            [
                'name' => 'Americano',
                'size' => 'Medium',
                'weight' => '250g',
                'price' => 100.000,
                'images' => json_encode(['item-1.png', 'item-2.png', 'item-3.png', 'item-4.png', 'item-5.png']),
                'reviews' => 'Good coffee, nice flavor',
                'rating' => '4.5',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            // Add more sample data as needed
        ];

        // Use the factory to create 10 sample records
        
    }
}
