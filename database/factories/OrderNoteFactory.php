<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\OrderNote;
use Faker\Generator as Faker;

$factory->define(OrderNote::class, function (Faker $faker) {
    return [
        'notes' => $faker->realText()
    ];
});
