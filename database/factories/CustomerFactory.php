<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\Customer;
use App\Models\CustomerAddress;
use App\Models\CustomerContact;
use App\Models\CustomerDiscount;
use App\Models\Order;
use Faker\Generator as Faker;

$factory->define(Customer::class, function (Faker $faker) {
    return [
        'name' => $faker->company
    ];
});

$factory->afterCreating(Customer::class, function (Customer $customer, Faker $faker) {
    factory(Order::class, $faker->numberBetween(10,25))->create([
        'customer_id' => $customer->id
    ]);

    factory(CustomerAddress::class, $faker->numberBetween(1,5))->create([
        'customer_id' => $customer->id
    ]);

    factory(CustomerContact::class, $faker->numberBetween(3,10))->create([
        'customer_id' => $customer->id
    ]);

    for ($year = 2000; $year < 2020; $year++) {
        factory(CustomerDiscount::class)->create([
            'customer_id' => $customer->id,
            'year' => $year
        ]);
    }
});
