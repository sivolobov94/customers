<?php

use App\Product;
use Faker\Generator as Faker;

$factory->define(App\Product::class, function (Faker $faker) {
        for($i=0;$i<=30;$i++) {
            $product = new Product(
                [
                    'name' => $faker->name,
                    'description' => $faker->description,
                    'price' => $faker->price,
                    'image' => $faker->immage
                ]
            );
            $product->save();
        }
});
