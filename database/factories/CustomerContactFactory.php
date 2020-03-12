<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\CustomerContact;
use Faker\Generator as Faker;

$factory->define(CustomerContact::class, function (Faker $faker) {
    return [
        'name' => $faker->name,
        'email' => $faker->email,
        'phone' => $faker->phoneNumber,
        'jobtitle' => $faker->jobTitle,
    ];
});
