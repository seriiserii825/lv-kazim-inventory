<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Product;
use Faker\Generator as Faker;

$factory->define(Product::class, function (Faker $faker) {
    return [
        'title' => $faker->word,
        'code' => $faker->numberBetween(100000, 999999),
        'category_id' => $faker->numberBetween(1, 3),
        'supplier_id' => $faker->numberBetween(1, 3),
        'buying_date' => $faker->dateTimeBetween('-1 years', 'now'),
        'product_quantity' => $faker->numberBetween(1, 10),
    ];
});
