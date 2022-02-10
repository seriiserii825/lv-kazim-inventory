<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Salary;
use Faker\Generator as Faker;

$factory->define(Salary::class, function (Faker $faker) {
    return [
        'employee_id' => $faker->numberBetween(1, 3),
        'amount' => $faker->numberBetween(10, 30),
        'date' => $faker->numberBetween(1, 31),
        'month' => $faker->numberBetween(1, 12),
        'year' => $faker->numberBetween(2014, 2022),
    ];
});