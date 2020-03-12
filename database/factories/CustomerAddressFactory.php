<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\CustomerAddress;
use Faker\Generator as Faker;

$factory->define(CustomerAddress::class, function (Faker $faker) {
    return [
        'street' => $faker->streetName,
        'number' => $faker->numberBetween(1,500),
        'city' => $faker->city,
        'state' => $faker->state,
        'country' => $faker->country,
        'zipcode' => $faker->postcode,
    ];
});
