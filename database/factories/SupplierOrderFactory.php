<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\Product;
use App\Models\SupplierOrder;
use Faker\Generator as Faker;

$factory->define(SupplierOrder::class, function (Faker $faker) {
    $product = Product::where('id', $faker->unique()->numberBetween(1, Product::count()))->first();

    $randomPrice = $product->price * 100;

    return [
        'product_id' => $product->id,
        'amount' => $faker->numberBetween(20,500),
        'price' => $faker->numberBetween($randomPrice - 500, $randomPrice + 500) / 100,
        'date' => $faker->dateTimeBetween('2020-01-01'),
    ];
});
