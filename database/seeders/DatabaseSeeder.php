<?php

namespace Database\Seeders;

use Database\Factories\BannerFactory;
use Database\Factories\CoffeShopFactory;
use Illuminate\Support\Facades\DB;
use Database\Factories\CardFactory;
use Database\Factories\CoffeFactory;
use Database\Factories\ShoppingCartFactory;
use Database\Factories\FavoriteFactory;
use Database\Factories\OrderFactory;
use Database\Factories\CategoryFactory;




// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

use Database\Factories\UserFactory;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // \App\Models\User::factory(10)->create();

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);

        // run database seedder 'php artisan db:seed'
        $cardfactory = new CardFactory();
        $userFactory = new UserFactory();
        $coffeShopFactory = new CoffeShopFactory();
        $coffeFactory = new CoffeFactory();
        $shoppingCartFactory = new ShoppingCartFactory();
        $favoritesFactory = new FavoriteFactory();
        $ordersFactory = new OrderFactory();
        $categoryFactory = new CategoryFactory();
        $bannerFactory = new BannerFactory();

        for ($i = 0; $i < 10; ++$i) {
            DB::table('users')->insert($userFactory->definition());
            DB::table('cards')->insert($cardfactory->definition());
            DB::table('coffe')->insert($coffeFactory->definition());
            DB::table('favorites')->insert($favoritesFactory->definition());
            DB::table('shopping_cart')->insert($shoppingCartFactory->definition());
            DB::table('coffee_shops')->insert($coffeShopFactory->definition());
            DB::table('orders')->insert($ordersFactory->definition());
            DB::table('categories')->insert($categoryFactory->definition());
            
        }
        for($i = 0; $i < 7; ++$i){
            DB::table('banners')->insert($bannerFactory->definition());
        }
    }
}
