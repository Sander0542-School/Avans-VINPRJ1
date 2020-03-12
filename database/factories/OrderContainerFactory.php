<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\OrderContainer;
use Faker\Generator as Faker;

$factory->define(OrderContainer::class, function (Faker $faker) {
    return [
        'containercode' => 'BAK'.$faker->unique()->numberBetween(0,50)
    ];
});
