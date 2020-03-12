<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\Product;
use Faker\Generator as Faker;

$factory->define(Product::class, function (Faker $faker) {
    return [
        'name' => $faker->word(),
        'ordercode' => $faker->numberBetween(),
        'price' => $faker->numberBetween(100, 50000) / 100,
        'short_description' => $faker->realText(200),
        'long_description' => $faker->realText(500),
        'active_substances' => $faker->words(3, true),
        'location' => $faker->randomElement(['A', 'B', 'C', 'D', 'E', 'F']).$faker->numberBetween(1, 50),
        'stock' => $faker->numberBetween(0, 200),
        'minimum_stock' => $faker->numberBetween(25, 150),
        'order_quantity' => $faker->numberBetween(1, 25),
        'packaging_length' => $faker->numberBetween(500, 8000) / 100,
        'packaging_width' => $faker->numberBetween(500, 8000) / 100,
        'packaging_heigth' => $faker->numberBetween(500, 8000) / 100,
        'consumer_packages' => $faker->numberBetween(1, 10),
        'packaging_type' => $faker->randomElement(['Doos', 'Fles', 'Tube', 'Spray']),
    ];
});
