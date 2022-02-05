<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Employee;
use Faker\Generator as Faker;

$factory->define(Employee::class, function (Faker $faker) {
    return [
        'name' => $faker->name,
        'email' => $faker->email,
        'phone' => $faker->phoneNumber,
        'address' => $faker->address,
        'salary' => $faker->numberBetween(1000, 10000),
        'join_date' => $faker->dateTimeBetween($startDate = '-10 years', $endDate = 'now', $timezone = null)
    ];
});
