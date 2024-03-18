<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

use Database\Factories\CardFactory;
class CardsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('cards')->insert([
            'user_id' => 1,
            'first_name' => 'John',
            'last_name' => 'Doe',
            'card_number' => '1234567890123456',
            'expiration_date' => '2023-01-01',
            'cvv' => '123',
            'phone_number' => '1234567890123456',
            'set_default_card' => false,
            'created_at' => now(),
            'updated_at' => now(),
        ]);


    }
}
