<?php

use Illuminate\Database\Seeder;

class ProductsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('products')->insert([
            'user_id' => 1,
            'name' => 'Трактор',
            'description' => 'Супер большой трактор, то что вам надо',
            'Category' => 'Техника',
            'Region' => 'Москва',
            'price_for_one' => 15000,
            'cashback' => 5,
            'manufacturer' => 'Россия',
            'image' => asset('img/no-photo'),
            'measure' => 'шт',

        ]);
    }
}
