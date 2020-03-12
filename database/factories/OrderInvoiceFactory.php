<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\OrderInvoice;
use Faker\Generator as Faker;

$factory->define(OrderInvoice::class, function (Faker $faker) {
    return [
        'paid' => $faker->boolean
    ];
});
