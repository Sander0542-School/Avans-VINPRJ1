<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\OrderProduct;
use App\Models\RobotQueue;
use Faker\Generator as Faker;

$factory->define(RobotQueue::class, function (Faker $faker) {
    $orderProduct = OrderProduct::where('id', $faker->unique()->numberBetween(1, OrderProduct::count()))->first();

    return [
        'order_product_id' => $orderProduct->id
    ];
});
