<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\Supplier;
use App\Models\SupplierContact;
use App\Models\SupplierOrder;
use App\Models\SupplierProduct;
use Faker\Generator as Faker;

$factory->define(Supplier::class, function (Faker $faker) {
    return [
        'name' => $faker->company,
        'street' => $faker->streetName,
        'number' => $faker->numberBetween(1,500),
        'city' => $faker->city,
        'state' => $faker->state,
        'country' => $faker->country,
        'zipcode' => $faker->postcode,
        'website' => $faker->url,
    ];
});

$factory->afterCreating(Supplier::class, function (Supplier $supplier, Faker $faker) {
    factory(SupplierContact::class, $faker->numberBetween(10,25))->create([
        'supplier_id' => $supplier->id
    ]);

    $faker->unique(true);
    factory(SupplierOrder::class, $faker->numberBetween(1,5))->create([
        'supplier_id' => $supplier->id
    ]);

    $faker->unique(true);
    factory(SupplierProduct::class, $faker->numberBetween(3,10))->create([
        'supplier_id' => $supplier->id
    ]);
});
