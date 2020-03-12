<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\Robot;
use App\Models\RobotQueue;
use Faker\Generator as Faker;

$factory->define(Robot::class, function (Faker $faker) {
    return [
        'corridor' => $faker->unique()->randomElement(['A', 'B', 'C', 'D', 'E', 'F'])
    ];
});

$factory->afterCreating(Robot::class, function (Robot $robot, Faker $faker) {
    $faker->unique(true);
    factory(RobotQueue::class, $faker->numberBetween(10,25))->create([
        'robot_id' => $robot->id
    ]);
});
