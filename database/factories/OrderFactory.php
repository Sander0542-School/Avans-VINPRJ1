<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\Order;
use App\Models\OrderContainer;
use App\Models\OrderInvoice;
use App\Models\OrderNote;
use App\Models\OrderProduct;
use Faker\Generator as Faker;

$factory->define(Order::class, function (Faker $faker) {
    return [
        'date' => $faker->dateTimeBetween('2020-01-01'),
        'status' => $faker->randomElement(['shipped', 'to_be_shipped', 'processing'])
    ];
});

$factory->afterCreating(Order::class, function (Order $order, Faker $faker) {
    $faker->unique(true);
    factory(OrderContainer::class, $faker->numberBetween(0,5))->create([
        'order_id' => $order->id
    ]);

    factory(OrderInvoice::class)->create([
        'order_id' => $order->id
    ]);

    factory(OrderNote::class, $faker->numberBetween(5,10))->create([
        'order_id' => $order->id
    ]);

    $faker->unique(true);
    factory(OrderProduct::class, $faker->numberBetween(10,25))->create([
        'order_id' => $order->id
    ]);
});
