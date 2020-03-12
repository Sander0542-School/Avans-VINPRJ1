<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\SupplierContact;
use Faker\Generator as Faker;

$factory->define(SupplierContact::class, function (Faker $faker) {
    return [
        'name' => $faker->name,
        'email' => $faker->email,
        'phone' => $faker->phoneNumber,
        'jobtitle' => $faker->jobTitle,
    ];
});
