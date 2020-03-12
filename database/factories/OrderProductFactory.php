<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\Product;
use App\Models\OrderProduct;
use Faker\Generator as Faker;

$factory->define(OrderProduct::class, function (Faker $faker) {
    $product = Product::where('id', $faker->unique()->numberBetween(1, Product::count()))->first();

    $randomPrice = $product->price * 100;

    return [
        'product_id' => $product->id,
        'price' => $faker->numberBetween($randomPrice - 250, $randomPrice + 250) / 100,
        'quantity' => $faker->numberBetween(1,50)
    ];
});
