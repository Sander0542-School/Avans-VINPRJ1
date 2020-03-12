<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\CustomerDiscount;
use Faker\Generator as Faker;

$factory->define(CustomerDiscount::class, function (Faker $faker) {
    return [
        'discount' => $faker->randomElement([5,10,15]),
    ];
});
