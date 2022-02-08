<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Supplier;
use Faker\Generator as Faker;

$factory->define(Supplier::class, function (Faker $faker) {
    return [
        'name' => $faker->name(),
        'email' => $faker->email(),
        'phone' => $faker->phoneNumber(),
        'address' => $faker->address(),
    ];
});
